<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'website-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
        
        <div class="control-group ">
            <?php echo $form->labelEx($model, 'user_id', array('class' => 'control-label')) ?>
            <?php
            $this->widget('Select2', array(
                'model' => $model,
                'attribute' => 'user_id',
                'data' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                'htmlOptions' => array('class' => "span4"),
            ));
            ?>
        </div>

	<?php echo $form->textFieldRow($model,'limit_points',array('class'=>'span5','maxlength'=>10,'append'=>'Daily')); ?>

	<?php echo $form->textFieldRow($model,'today_points',array('class'=>'span5','maxlength'=>10)); ?>
        
        <?php echo $form->fileFieldRow($model,'fav_icon');
            echo " <div class=\"control-group \"> <div class=\"controls\">";
            echo CHtml::image(Yii::app()->request->baseUrl.'/media/website/'.$model->fav_icon,'',array('width'=>200));
            echo "</div></div>";
        ?>
        
        <?php echo $form->checkBoxRow($model,'hide_referrals'); ?>

	<?php echo $form->checkBoxRow($model,'active'); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
