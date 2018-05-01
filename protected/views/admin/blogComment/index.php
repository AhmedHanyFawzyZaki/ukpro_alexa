<?php
$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BlogComment','url'=>array('index')),
	array('label'=>'Create BlogComment','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('blog-comment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Blog Comments';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'blog-comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
                'comment',
                'create_date',
		'blog_id' => array(
                    'name' => 'blog_id',
                    'value' => '$data->blog->title',
                    'filter' => CHtml::listData(Blog::model()->findAll(), 'id', 'title'),
                ),
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => '$data->user->username',
                    'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                ),
		'approve' => array(
                    'name' => 'approve',
                    'value' => '($data->approve == 1)? "Approved":"Not Approved"',
                    'filter' => array(1 => 'Approved', 2 => 'Not Approved'),
                ),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
