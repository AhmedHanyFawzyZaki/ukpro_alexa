<?php
$this->breadcrumbs=array(
	'Faqs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Faq','url'=>array('index')),
	array('label'=>'Create Faq','url'=>array('create')),
	array('label'=>'Update Faq','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Faq','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Faq "'. $model->question.' "'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'question',
		'answer',
		array(
			'name'=>'active',
			'type'=>'raw',
			 'value'=>($model->active==1)?'Active': 'Not active',
				),
	),
)); ?>
