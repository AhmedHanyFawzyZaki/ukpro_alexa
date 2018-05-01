<?php
$this->breadcrumbs=array(
	'User Points'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserPoints','url'=>array('index')),
	array('label'=>'Create UserPoints','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-points-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage User Points';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'user-points-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => '$data->user->username',
                    'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                ),
		'used',
		'gained',
		'date_time',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
