<?php
$this->breadcrumbs=array(
	'Supports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Support','url'=>array('index')),
	array('label'=>'Create Support','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('support-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Supports';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'support-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'subject',
		'email',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
