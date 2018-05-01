<?php
$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BlogComment','url'=>array('index')),
	array('label'=>'Create BlogComment','url'=>array('create')),
	array('label'=>'Update BlogComment','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete BlogComment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View BlogComment #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'blog_id' => array(
                    'name' => 'blog_id',
                    'vlaue' => $model->blog->title,
                ),
		'comment',
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => $model->user->username,
                ),
		'approve' => array(
                    'name' => 'approve',
                    'value' => ($model->approve == 1)? "Approved" : "Not Approved",
                ),
		'create_date',
	),
)); ?>
