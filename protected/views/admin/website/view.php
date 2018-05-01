<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Website','url'=>array('index')),
	array('label'=>'Create Website','url'=>array('create')),
	array('label'=>'Update Website','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Website','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Website #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => $model->user->username,
                ),
		'limit_points',
                'today_points',
		'hide_referrals'  => array(
                    'name' => 'hide_referrals',
                    'value' => ($model->hide_referrals == 1)? "Hide" : "Not Hide",
                ),
		'active' => array(
                    'name' => 'active',
                    'value' => ($model->active == 1)? "Active" : "Not Active",
                ),
                array(
                    'name'=>'fav_icon',
                    'type'=>'raw',
                    'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/website/'.$model->fav_icon,'',array('width'=>250)),
                ),
	),
)); ?>
