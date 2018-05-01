<?php
$this->breadcrumbs=array(
	'Subscribe Packages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SubscribePackage','url'=>array('index')),
	array('label'=>'Create SubscribePackage','url'=>array('create')),
	array('label'=>'Update SubscribePackage','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete SubscribePackage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View SubscribePackage "'. $model->title.'"'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'traffic_ratio',
		'points',
		'num_of_sites',
		'price',
	),
)); ?>
