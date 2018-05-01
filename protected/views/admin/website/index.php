<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Website','url'=>array('index')),
	array('label'=>'Create Website','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('website-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Websites';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'website-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'title',
		//'fav_icon',
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => '$data->user->username',
                    'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                ),
		'limit_points',
		'hide_referrals'  => array(
                    'name' => 'hide_referrals',
                    'value' => '($data->hide_referrals == 1)? "Hide" : "Not Hide"',
                    'filter' => array('0' => 'Not Hide', '1' => 'Hide'),
                ),
		'active' => array(
                    'name' => 'active',
                    'value' => '($data->active == 1)? "Active" : "Not Active"',
                    'filter' => array('0' => 'Not Active', '1' => 'Active'),
                ),
		'today_points',
		//'sort',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
