<?php
$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BlogCategory','url'=>array('index')),
	array('label'=>'Create BlogCategory','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('blog-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Blog Categories';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'blog-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'title',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
