<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-cogs"></i></div>
                <h5>Settings</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">


                <div class="row">

                    <div class="col-md-3 col-sm-4">

                        <ul id="myTab" class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="#profile-tab" data-toggle="tab">
                                    <i class="fa fa-user"></i> 
                                    Profile Settings
                                </a>
                            </li>
                            <li class="">
                                <a href="#password-tab" data-toggle="tab">
                                    <i class="fa fa-lock"></i> 
                                    Change Password
                                </a>
                            </li>
                            <li class="">
                                <a href="#close-tab" data-toggle="tab">
                                    <i class="fa fa-sign-out"></i> 
                                    Close Account
                                </a>
                            </li>				        
                        </ul>

                    </div> <!-- /.col -->

                    <div class="col-md-9 col-sm-8">
                        <?php
                            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id' => 'user-form',
                            'enableAjaxValidation' => true,
                            'type' => 'horizontal',
                            'htmlOptions' => array('enctype' => 'multipart/form-data')
                                ));
                        ?>

                        <div class="tab-content stacked-content">
                            <div class="tab-pane fade active in" id="profile-tab">

                                <h3 class="mini-title">Edit Profile Settings</h3>
                                
                                <?php
                                    if(Yii::app()->user->hasFlash('Passchange'))
                                    {
                                        echo '<div class="alert alert-success">'.Yii::app()->user->getFlash('Passchange').'</div>';
                                    }
                                ?>

                                    <div class="form-group">

                                        <label class="col-md-3">First Name</label>

                                        <div class="col-md-7">
                                            <?php echo $form->textField($model, 'fname', array('class' => 'form-control', 'maxlength' => 255)); ?>
                                            <?php echo $form->error($model, 'fname');?>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->

                                    <div class="form-group">

                                        <label class="col-md-3">Last Name</label>

                                        <div class="col-md-7">
                                            <?php echo $form->textField($model, 'lname', array('class' => 'form-control', 'maxlength' => 255)); ?>
                                            <?php echo $form->error($model, 'lname');?>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->

                                    <div class="form-group">

                                        <label class="col-md-3">Email Address</label>

                                        <div class="col-md-7">
                                            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'readonly'=>'readonly','maxlength' => 255)); ?>
                                            <?php echo $form->error($model, 'email');?>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->					

                                    <br>

                                    <div class="form-group">

                                        <div class="col-md-7 col-md-push-3">
                                            <button type="submit" class="btn btn-danger pull-right">Save changes</button>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->					

                            </div>
                            <div class="tab-pane fade" id="password-tab">

                                <h3 class="mini-title">Change Your Password</h3>

                                    <div class="form-group">

                                        <label class="col-md-3">Old Password</label>

                                        <div class="col-md-7">
                                            <?php echo CHtml::passwordField('User[oldpassword]','',array('class'=>'form-control')); ?>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->


                                    <hr>


                                    <div class="form-group">

                                        <label class="col-md-3">New Password</label>

                                        <div class="col-md-7">
                                            <?php echo CHtml::passwordField('User[newpassword]','',array('class'=>'form-control')); ?>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->

                                    <div class="form-group">

                                        <label class="col-md-3">New Password Confirm</label>

                                        <div class="col-md-7">
                                            <?php echo CHtml::passwordField('User[newpassword_repeat]','',array('class'=>'form-control')); ?>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->

                                    <br>

                                    <div class="form-group">

                                        <div class="col-md-7 col-md-push-3">
                                            <button type="submit" name="update_password" class="btn btn-primary">Update password</button>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->	          

                            </div>
                            <div class="tab-pane fade" id="close-tab">

                                <h3 class="mini-title">Close Your Account</h3>

                                    <div class="checkbox">
                                        <label>
                                            <?php echo CHtml::checkbox('User[active]','',array('value'=>0))?>  I agree
                                        </label>
                                        <span class="help-block">By closing your account, you agree to forfeit any and all remaining points on your account, and by closing your account you may no longer login to Alexa Boostup, and you will NOT be able to reinstate account.</span>
                                    </div>


                                    <div class="form-group">

                                        <div class="col-md-7 col-md-push-3">
                                            <button type="submit" name="close_account" class="btn btn-primary">Confirm</button>
                                        </div> <!-- /.col -->

                                    </div> <!-- /.form-group -->
          

                            </div>

                            
                        </div>
                    <?php $this->endWidget(); ?>
                    </div> <!-- /.col -->

                </div>

            </div>
        </div>


        <!-- InstanceEndEditable -->

    </div>
</section>
