<?php
$this->breadcrumbs=array(
	'User Points'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserPoints','url'=>array('index')),
	array('label'=>'Create UserPoints','url'=>array('create')),
	array('label'=>'Update UserPoints','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete UserPoints','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View UserPoints #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => $model->user->username,
                ),
		'used',
		'gained',
		'date_time',
	),
)); ?>
