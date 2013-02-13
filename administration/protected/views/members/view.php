<?php
$this->pagetitle = $model->user_name;
$this->breadcrumbs = array(
    'Members' => array('index'),
    $model->id,
);
//
//$this->menu = array(
//    array('label' => 'List Members', 'url' => array('index')),
//    array('label' => 'Create Members', 'url' => array('create')),
//    array('label' => 'Update Members', 'url' => array('update', 'id' => $model->id)),
//    array('label' => 'Delete Members', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
//    array('label' => 'Manage Members', 'url' => array('admin')),
//);
?>
<h3><?php echo $model->user_name; ?></h3>

<div class="container-fluid">
    <div class="row-fluid">


        <div class="span2" >
            <div id="employee-something">
                <!--Sidebar content-->
                <div class="thumbnail">
                 <?php echo CHtml::image(Yii::app()->params["uploadDir"] . '/members/thumbnails/' . $model->image, '', array("width" => "", "height" => "300")); ?>
                    <div style="text-align: center;"> 
                <b><?php echo $model->user_name ?></b>
            </div></div></div>
            <?php
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type' => 'list',
                'items' => array(
                    array('label' => 'Members', 'itemOptions' => array('class' => 'nav-header')),
                    array('label' => 'List Members', 'url' => array('index')),
                    array('label' => 'Create Members', 'url' => array('create')),
                    array('label' => 'Update Members', 'url' => array('update', 'id' => $model->id)),
                    array('label' => 'Delete Members', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
                    array('label' => 'Manage Members', 'url' => array('admin')),
                )
            ));
            ?>
        </div>
        <div class="span10">
            <!--Body content-->
            <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'brand' => 'Members Details',
                'fixed' => TRUE,
            ));
            ?>

            <table class="table" >
                <tbody >
                    <tr>
                        <th>User Type</th>
                        <td><?php echo Lookup::item('UserType', $model->user_type); ?></td>
                    </tr>
                    <tr>
                        <th>User name</th>
                        <td><?php echo $model->user_name; ?></td>
                    </tr>
                    <tr ><th >First Name</th>
                        <td><?php echo $model->first_name; ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $model->last_name; ?></td>
                    </tr>
                    <tr>
                        <th>Skills</th>
                        <td><?php echo $model->skills; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table">
                <tbody>
                    <tr><th>Gender</th>
                        <td><?php echo Lookup::item('gender', $model->gender); ?></td>
                    </tr>
                    <tr><th>Email</th>
                        <td><?php echo $model->email; ?></td>
                    </tr>
                    <tr><th>Paypal Email</th>
                        <td><?php echo $model->paypal_email; ?></td>
                    </tr>
                    <tr><th>Phone #</th>
                        <td><?php echo $model->phone; ?></td>
                    </tr>
                    <tr><th>Mobile #</th>
                        <td><?php echo $model->mobile; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table">
                <tbody>
                    <tr><th>Birth date</th>
                        <td><?php echo $model->birth_date; ?></td>
                    </tr>
                    <tr><th>Address</th>
                        <td><?php echo $model->address; ?></td>
                    </tr>
                    <tr><th>Nationality</th>
                        <td><?php echo $model->country; ?></td>
                    </tr>
                    <tr><th>City</th>
                        <td><?php echo $model->city; ?></td>
                    </tr>
                    <tr><th>State</th>
                        <td><?php echo $model->state; ?></td>
                    </tr>
                    <tr><th>Zip</th>
                        <td><?php echo $model->zip; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>

            <table class="table">
                <tbody>
                    <tr><th>Facebook Account</th>
                        <td><?php echo $model->facebook; ?></td>
                    </tr>
                    <tr><th>Twitter Account</th>
                        <td><?php echo $model->twitter; ?></td>
                    </tr>
                    <tr><th>Personal Websites</th>
                        <td><?php echo $model->website; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>

            <table class="table">
                <tbody>
                    <tr><th>Is Subscribed</th>
                        <td><?php echo Lookup::item('YesNo', $model->is_subscribed); ?></td>
                    </tr>
                    <tr><th>Is Blocked</th>
                        <td><?php echo Lookup::item('YesNo', $model->is_blocked); ?></td>
                    </tr>
                    <tr><th>Is Confirmed</th>
                        <td><?php echo Lookup::item('YesNo', $model->is_confirmed); ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table">
                <tbody>
                    <tr><th>Timestamp</th>
                        <td><?php echo $model->timestamp; ?></td>
                        <th>Last Modified</th> 
                        <td><?php echo $model->update_time; ?></td></tr>

                    <tr><th>Active Key</th>
                        <td><?php echo $model->active_key; ?></td>
                        <th>Salt</th> 
                        <td><?php echo $model->salt; ?></td>
                    </tr>
                    <tr><th>Last login</th>
                        <td><?php echo $model->last_login; ?></td>
                        <th>Views</th> 
                        <td><?php echo $model->views; ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>

            <blockquote>
                <h3>Bio</h3>
                <?php echo $model->bio; ?>
            </blockquote>

        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="span8">
        <?php
//                $this->widget('bootstrap.widgets.TbDetailView', array(
//                    'data' => $model,
//                    'attributes' => array(
//                        'id',
//                        //'user_type',
//                        array(
//                            'name' => 'user_type',
//                            'value' => Lookup::item('UserType', $model->user_type),
//                        ),
//                        'first_name',
//                        'last_name',
//                        'user_name',
//                        'email',
//                        'paypal_email',
//                        'password',
//                        'image',
//                        array(
//                            'name' => 'gender',
//                            'value' => Lookup::item('gender', $model->gender),
//                        ),
//                        'birth_date',
//                        'address',
//                        'city',
//                        'country',
//                        'state',
//                        'zip',
//                        'phone',
//                        'mobile',
//                        'facebook',
//                        'twitter',
//                        'website',
//                        'github',
//                        'yii_profile',
//                        'bio',
//                        'skills',
//                        array(
//                            'name' => 'is_subscribed',
//                            'value' => Lookup::item('YesNo', $model->is_subscribed),
//                        ),
//                        array(
//                            'name' => 'is_blocked',
//                            'value' => Lookup::item('YesNo', $model->is_blocked),
//                        ),
//                        array(
//                            'name' => 'is_confirmed',
//                            'value' => Lookup::item('YesNo', $model->is_confirmed),
//                        ),
//                        'active_key',
//                        'salt',
//                        'last_login',
//                        'views',
//                        'timestamp',
//                        'update_time',
//                    ),
//                ));
        ?>
    </div>
    
</div>