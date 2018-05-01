<?php
$this->breadcrumbs=array(
	'Packages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Package','url'=>array('index')),
	array('label'=>'Create Package','url'=>array('create')),
	array('label'=>'Update Package','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Package','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Package " '. $model->title.' "'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'points',
		'price',
	),
)); ?>
