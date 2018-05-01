<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'support-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'subject',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>
        
        
        <div class="control-group">
            <?php echo $form->labelEx($model,'attachment', array('class'=>'control-label'))?>
            <div class="controls">
                <input id="Support_attachment" class="form-control" type="file" name="Support[attachment][]" multiple="multiple">
                <?php //echo $form->fileFieldRow($model, 'attachment');

                if(!$model->isNewRecord)
                {
                    if($model->attachment){
                        $attachments = explode(',', $model->attachment);
                        for($i=0; $i<count($attachments); $i++){
                            echo " <div class=\"control-group \"> ";
                            echo CHtml::link($attachments[$i], Yii::app()->request->baseUrl.'/media/attachments/'.$attachments[$i], array('class' => 'hello'));
                            echo "</div>";
                        } 
                    }
                }
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
