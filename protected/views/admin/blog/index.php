<?php
$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Blog','url'=>array('index')),
	array('label'=>'Create Blog','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('blog-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Blogs';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'blog-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'title',
		'create_date',
                'user_id' => array(
                    'name' => 'user_id',
                    'value' => '$data->user->username',
                    'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                ),
                'cat_id' => array(
                    'name' => 'cat_id',
                    'value' => '$data->cat->title',
                    'filter' => CHtml::listData(BlogCategory::model()->findAll(), 'id', 'title'),
                ),
                array(
                    'class'=>'CLinkColumn',
                    'label'=>'Comments',
                    'urlExpression'=>'Yii::app()->request->baseUrl."/admin/blogComment/index?blog=".$data->id',
                    'header'=>'Comments',
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
