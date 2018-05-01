<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	array('label'=>'Create Order','url'=>array('create')),
	array('label'=>'Update Order','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Order','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Order " '. $model->id.' "'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => $model->user->username,
                ),
		'package_id' => array(
                    'name' => 'package_id',
                    'value' => $model->package->title,
                ),
                'status_id' => array(
                    'name' => 'status_id',
                    'value' => $model->status->title,
                ),
		'price',
		'order_date',
		'points',
		
	),
)); ?>
