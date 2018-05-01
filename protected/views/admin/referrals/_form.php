<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'referrals-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
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
        
        <div class="control-group ">
            <?php echo $form->labelEx($model, 'referral_id', array('class' => 'control-label')) ?>
            <?php
            $this->widget('Select2', array(
                'model' => $model,
                'attribute' => 'referral_id',
                'data' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                'htmlOptions' => array('class' => "span4"),
            ));
            ?>
        </div>


	<?php echo $form->checkBoxRow($model,'active'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
