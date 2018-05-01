<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
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
            <?php echo $form->labelEx($model, 'package_id', array('class' => 'control-label')) ?>
            <?php
            $this->widget('Select2', array(
                'model' => $model,
                'attribute' => 'package_id',
                'data' => CHtml::listData(Package::model()->findAll(), 'id', 'title'),
                'htmlOptions' => array('class' => "span4"),
            ));
            ?>
        </div>
        
        <div class="control-group ">
            <?php echo $form->labelEx($model, 'status_id', array('class' => 'control-label')) ?>
            <?php
            $this->widget('Select2', array(
                'model' => $model,
                'attribute' => 'status_id',
                'data' => CHtml::listData(OrderStatus::model()->findAll(), 'id', 'title'),
                'htmlOptions' => array('class' => "span4"),
            ));
            ?>
        </div>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'points',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
