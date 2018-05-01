<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'blog-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'post',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
        
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
            <?php echo $form->labelEx($model, 'cat_id', array('class' => 'control-label')) ?>
            <?php
            $this->widget('Select2', array(
                'model' => $model,
                'attribute' => 'cat_id',
                'data' => CHtml::listData(BlogCategory::model()->findAll(), 'id', 'title'),
                'htmlOptions' => array('class' => "span4"),
            ));
            ?>
        </div>

        <?php echo $form->fileFieldRow($model,'image');
            echo " <div class=\"control-group \"> <div class=\"controls\">";
            echo CHtml::image(Yii::app()->request->baseUrl.'/media/blog/'.$model->image,'',array('width'=>200));
            echo "</div></div>";
        ?>

	<?php echo $form->checkBoxRow($model,'publish'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
