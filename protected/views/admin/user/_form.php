<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<script>

    $(document).ready(function() {
        $('.pw').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $collapse = $this.closest('.collapse-group').find('.collapse');
            $collapse.collapse('toggle');
        });

    });
</script>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php
echo $form->errorSummary($model);

if (Yii::app()->user->hasFlash('Passchange')) {
    echo '<div class="alert alert-danger">'.Yii::app()->user->getFlash('Passchange').'</div>';
}
?>
<div class="control-group ">
    <?php echo $form->labelEx($model, 'groups_id', array('class' => 'control-label')) ?>
    <?php
    $this->widget('Select2', array(
        'model' => $model,
        'attribute' => 'groups_id',
        'data' => Groups::model()->getGroups(),
        'htmlOptions' => array('class' => "span4"),
    ));
    ?>
</div>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
if ($model->id > 0) {
    ?>
    <div class="control-group">
        <div class="collapse-group controls">
            <p><a class="btn pw" href="#">Change password</a></p>
            <p class="collapse">
                <label class="control-label"> Old Password :</lable>
                    <span class="controls"> 
    <?php echo CHtml::passwordField('User[oldpassword]'); ?>
                    </span>
                    <label class="control-label"> New Password:</label>
                    <span class="controls">
    <?php echo CHtml::passwordField('User[newpassword]'); ?>
                    </span>
                    <label class="control-label">New Password repeat: </label>
                    <span class="controls">
    <?php echo CHtml::passwordField('User[newpassword_repeat]'); ?>
                    </span>
            </p>
        </div>
    </div> 
    <?php
} else {
    echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 90));
    echo $form->passwordFieldRow($model, 'password_repeat', array('class' => 'span5', 'maxlength' => 90));
}
?>
<?php echo $form->textFieldRow($model, 'fname', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'lname', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 255));

if ($model->isNewRecord != '1' and $model->image != '') {
    ?>
    <div class="control-group ">
        <div class="controls">
            <p id='image-cont'> <?php echo Chtml::image(Yii::app()->request->getBaseUrl(true) . '/media/members/' . $model->image, '', array('width' => 200)); ?></p>
            <?php
            /*echo CHtml::ajaxLink(
                    'Delete Image', array('/admin/pages/deleteimage/id/' . $model->id), array(
                'success' => 'function(data){
                        //var obj = jQuery.parseJSON(data);
                        if(data =="done"){
                           document.getElementById("image-cont").innerHTML=" Image Deleted";
                       }
                    }'
                    ), array('class' => 'left0px')
            );*/
            ?>
        </div>
    </div>
    <?php
}
?>
<?php
/* echo " <div class=\"control-group \"> ". $form->labelEx($model,'image',array('class'=>'control-label'))."<div class=\"controls\">";
  $this->widget('ext.Euploader.Euploader',
  array(
  'name'=>'image',
  'config'=>array(
  'action'=>Yii::app()->createUrl('admin/user/upload'),
  'allowedExtensions'=>array("jpg,png,jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
  'onComplete'=>"js:function(responseJSON){ alert(responseJSON); }",
  )
  ));
  echo "</div></div>"; */
?>

<?php echo $form->textFieldRow($model, 'points', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textAreaRow($model, 'details', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->checkboxRow($model, 'active'); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

