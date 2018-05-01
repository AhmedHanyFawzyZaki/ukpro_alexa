<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'how-work-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
        'htmlOptions' => array(	'enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php // echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>255)); ?>
         <?php echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>255));
        if($model->isNewRecord != '1')
        {
           echo " <div class=\"control-group \"> <div class=\"controls\">";

          echo CHtml::image(Yii::app()->request->baseUrl.'/media/how_work/'.$model->image,'',array('width'=>200));
          echo "</div></div>";
        }
        ?>

	<?php // echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
