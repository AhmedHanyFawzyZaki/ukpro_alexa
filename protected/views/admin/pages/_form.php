<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'pages-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model, 'intro', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>



        <div class="control-group ">
            <div class="control-label required">
                <label> Details</label>
            </div>
            <div class="controls">
                            <?php
                    $this->widget('application.extensions.eckeditor.ECKEditor', array(
                                'model'=>$model,
                                'attribute'=>'details',
                    ));
                ?>
            </div>
        </div>

<?php
echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 255));

if ($model->isNewRecord != '1' and $model->image != '') {
    ?>
    <div class="control-group ">
        <label class="control-label" for="Pages_intro">Image</label>
        <div class="controls">
            <p id='image-cont'> <?php echo Chtml::image(Yii::app()->request->getBaseUrl(true) . '/media/pages/' . $model->image, '', array('width' => 200)); ?></p>
            <?php
            echo CHtml::ajaxLink(
                    'Delete Image', array('/admin/pages/deleteimage/id/' . $model->id), array(
                'success' => 'function(data){
                        //var obj = jQuery.parseJSON(data);
                        if(data =="done"){
                           document.getElementById("image-cont").innerHTML=" Image Deleted";
                       }
                    }'
                    ), array('class' => 'left0px')
            );
            ?>
        </div>
    </div>
<?php
}
?>

<?php echo $form->textFieldRow($model, 'video', array('class' => 'span15', 'maxlength' => 255, 'prepend' => 'http')); ?>

<?php echo $form->radioButtonListRow($model,'layout',array(1 => 'one colom page ', 2 => 'two colom page ', 3 => 'three colom page ')); ?>

<?php echo $form->checkboxRow($model, 'publish'); ?>

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
