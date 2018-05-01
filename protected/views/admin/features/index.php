<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Features','url'=>array('index')),
	array('label'=>'Create Features','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('features-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Features';?>


<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'features-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'title',
		'description',
		'color',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
