<?php
$this->breadcrumbs = array(
    'Plans',
);
?>
<div class="row">
    <div class="container">
        <div class="photo-page">
            <div class="row">

                <div class="span10"><img alt="Payment Methods" src="<?php echo '../media/satisfactionBanner.jpg' ; ?>"></div>
            </div>
            <div class="" >
                <table class="table table-bordered">
                    <colgroup></colgroup>
                    <colgroup class="litecol"></colgroup>
                    <colgroup class="pgcol"></colgroup>
                    <colgroup class="procol"></colgroup>
                    <thead>
                        <tr>
                            <th width="56%">Not Ready Yet? It’s only $15.00!  Take a look at all the Features:</th>
                            <th id="lite">Free</th>
                            <th id="pg">Plus</th>
                            <th width="16%" id="pro">Premium</th>
                        </tr>
                    </thead>

                  <style>
    .feature a{
        text-decoration: none;
    }
    td{
        padding-left: 22px !important;
        text-align: justify;
    }
    </style>

  <tbody class="odd">
                <tr class="odd">
                    <td class="feature">
                        <p title="">Register</p>
                        </td>
                    <td class="lite checked  icon-ok-sign"></td>
                    <td class="pg checked icon-ok-sign"></td>
                    <td class="pro checked icon-ok-sign"></td>
                </tr>
                <tr class="odd">
                    <td class="feature">
                        <p title="">Add Domain</p>
                        </td>
                    <td class="lite checked  icon-ok-sign"> + 1</td>
                    <td class="pg checked icon-ok-sign"> + 5</td>
                    <td class="pro checked icon-ok-sign"> + 25</td>
                </tr>
                <tr class="odd">
                    <td class="feature">
                        <p title="">Sell Domain</p>
                        </td>
                    <td class="lite checked  icon-remove-sign"></td>
                    <td class="pg checked icon-ok-sign"> + 50</td>
                    <td class="pro checked icon-ok-sign"> Unlimited</td>
                </tr>
                <tr class="odd">
                    <td class="feature">
                        <p title="">Private Messages</p>
                        </td>
                    <td class="lite checked  icon-remove-sign"></td>
                    <td class="pg checked icon-ok-sign"></td>
                    <td class="pro checked icon-ok-sign"></td>
                </tr>
                <tr class="odd">
                    <td class="feature">
                        <p title="">Email Notification</p>
                        </td>
                    <td class="lite checked  icon-remove-sign"></td>
                    <td class="pg checked icon-ok-sign"></td>
                    <td class="pro checked icon-ok-sign"></td>
                </tr>
                <tr class="odd">
                    <td class="feature">
                        <p title="">Business Profile</p>
                        </td>
                    <td class="lite checked  icon-remove-sign"></td>
                    <td class="pg checked icon-ok-sign"></td>
                    <td class="pro checked icon-ok-sign"></td>
                </tr>
                
  </tbody>
 


                    <tfoot id="submit">
                        <tr>
                            <td class="feature"></td>
                            <td class="price">Free</td>
                            <td class="price">$15</td>
                            <td class="pro price">$120</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
<td>
                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">  

                                    <!--                                     Identify your business so that you can collect the payments.   -->
                                    <input type="hidden" name="business" value="s_amjd_1356428071_biz@uexel.com"/>


                                    <!-- Specify a Subscribe button. -->  
                                    <input type="hidden" name="cmd" value="_xclick-subscriptions">  
                                    
                                    <!-- Identify the subscription. -->  
                                    <input type="hidden" value="http://uexel.us/clients/dps/www/payment/ipn-listener.php" name="notify_url">
                                    <input type="hidden" value="http://uexel.us/clients/dps/www/site/cancel" name="cancel_return">
                                    <input type="hidden" value="http://uexel.us/clients/dps/www/dashboard" name="return">
                                    <input type="hidden" name="item_name" value="DPS Plus Membership">


                                    <!-- Set the terms of the 1st trial period. -->  


                                    <!-- Set the terms of the regular subscription. -->  
                                    <input type="hidden" name="a3" value="15.00">  
                                    <input type="hidden" name="p3" value="1">  
                                    <input type="hidden" name="t3" value="M">  

                                    <!-- Set recurring payments until canceled. -->  
                                    <input type="hidden" name="src" value="1">  

                                    <!-- Display the payment button. -->  
                                    <input type="hidden" name="custom" value="<?php echo Yii::app()->user->id; ?>">
                                    <input type="image" name="submit" border="0"  
                                           src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif"  
                                           alt="PayPal - The safer, easier way to pay online">  
                                    <img alt="" border="0" width="1" height="1"  
                                         src="https://www.paypal.com/en_US/i/scr/pixel.gif" >  
                                </form>

                            </td>
                            <td>					

                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">  

                                    <!-- Identify your business so that you can collect the payments. -->  
                                    <input type="hidden" name="business" value="s_amjd_1356428071_biz@uexel.com"/>

                                    <!-- Specify a Subscribe button. -->  
                                    <input type="hidden" name="cmd" value="_xclick-subscriptions">  

                                    <!-- Identify the subscription. -->  
                                    <input type="hidden" value="http://uexel.us/clients/dps/www/payment/ipn-listener.php" name="notify_url">
                                    <input type="hidden" value="http://uexel.us/clients/dps/www/site/cancel" name="cancel_return">
                                    <input type="hidden" value="http://uexel.us/clients/dps/www/site/dashboard" name="return">
                                    <input type="hidden" name="item_name" value="DPS Premium Membership">


                                    <!-- Set the terms of the 1st trial period. -->  


                                    <!-- Set the terms of the regular subscription. -->  
                                    <input type="hidden" name="a3" value="120.00">  
                                    <input type="hidden" name="p3" value="1">  
                                    <input type="hidden" name="t3" value="Y">  

                                    <!-- Set recurring payments until canceled. -->  
                                    <input type="hidden" name="src" value="1">  

                                    <!-- Display the payment button. -->  
                                    <input type="hidden" name="custom" value="<?php echo Yii::app()->user->id; ?>">
                                    <input type="image" name="submit" border="0"  
                                           src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif"  
                                           alt="PayPal - The safer, easier way to pay online">  
                                    <img alt="" border="0" width="1" height="1"  
                                         src="https://www.paypal.com/en_US/i/scr/pixel.gif" >  
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="end"></td>
                               <td class="end"><img alt="Payment Methods" src="<?php echo '../media/cc_icons.gif' ; ?>"></td>

                        </tr>        
                    </tfoot>
                </table>

            </div> </div>
    </div></div>

