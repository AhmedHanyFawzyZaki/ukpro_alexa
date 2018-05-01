<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-points-form',
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

	<?php echo $form->textFieldRow($model,'used',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'gained',array('class'=>'span5','maxlength'=>10)); ?>

        <div class="control-group ">
            <?php echo $form->labelEx($model, 'date_time', array('class' => 'control-label')) ?>
            <div class="controls">
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'date_time', //attribute name
                    'language' => '',
                    'mode' => 'date', //use "time","date" or "datetime" (default)
                    'options' => array(
                        "dateFormat" => Yii::app()->params['dateFormat'],
                        'changeMonth' => 'true',
                        'changeYear' => 'true',
                        'showOtherMonths' => true, // Show Other month in jquery
                    ), // jquery plugin options
                    'htmlOptions' => array(
                        'style' => 'height:20px;',
                        'class' => 'span5',
                    ),
                ));
                ?>
            </div>
        </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
