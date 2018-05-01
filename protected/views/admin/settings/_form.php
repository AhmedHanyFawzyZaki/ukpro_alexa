<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
        'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'facebook',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->textFieldRow($model,'google',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->textFieldRow($model,'youtube',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'twitter',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>
        
        <hr>
        
        <?php echo $form->textFieldRow($model,'business_hours',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->textFieldRow($model,'support_email',array('class'=>'span5','maxlength'=>255)); ?>
        
        
	<?php /*echo $form->textFieldRow($model,'paypal_email',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'api_username',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'api_password',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'signature',array('class'=>'span5','maxlength'=>255)); ?>
        
	<?php echo $form->checkBoxRow($model,'paypal_live');*/ ?>
        
        <hr>
        
        <?php echo $form->textFieldRow($model,'auto_surfing_points',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'surfing_period',array('class'=>'span5','append'=>'seconds')); ?>
        
        <hr>
        
        <?php echo $form->textFieldRow($model,'referral_points',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'user_intial_points',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'default_site_num',array('class'=>'span5')); ?>
        
        <hr>
        
        <?php echo $form->textFieldRow($model,'cost_of_5k_points',array('class'=>'span5','append'=>'$')); ?>
        
        <?php echo $form->textFieldRow($model,'slider_min_points',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'slider_max_points',array('class'=>'span5')); ?>
        
        <hr>
        
        <?php echo $form->textFieldRow($model,'how_work_video',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'alexa_ranking',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'alexa_features',array('class'=>'span5')); ?>
        
        <?php echo $form->textFieldRow($model,'alexa_take_tour',array('class'=>'span5')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
