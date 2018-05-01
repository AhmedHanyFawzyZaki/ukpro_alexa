<?php
$this->breadcrumbs=array(
	'Supports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Support','url'=>array('index')),
	array('label'=>'Create Support','url'=>array('create')),
	array('label'=>'Update Support','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Support','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Support " '. $model->subject.' "'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'subject',
		'content',
		'email',
                array(
                    'name'=>'attachment',
                    'type'=>'raw',
                    'value'=>CHtml::link($model->attachment, Yii::app()->request->baseUrl.'/media/attachments/'.$model->attachment, array('class' => 'hello'))
                    ),
	),
)); ?>
