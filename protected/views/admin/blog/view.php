<?php
$this->breadcrumbs=array(
    'Blogs'=>array('index'),
    $model->title,
);

$this->menu=array(
    array('label'=>'List Blog','url'=>array('index')),
    array('label'=>'Create Blog','url'=>array('create')),
    array('label'=>'Update Blog','url'=>array('update','id'=>$model->id)),
    array('label'=>'Delete Blog','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Blog "'. $model->title.'"'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes' => array(
		'title',
		'post',
                'user_id' => array(
                    'name' => 'user_id',
                    'value' => $model->user->username,
                ),
                'cat_id' => array(
                    'name' => 'cat_id',
                    'value' => $model->cat->title,
                ),
		'publish' => array(
                    'name' => 'publish',
                    'value' => ($model->publish == 1)? "Publish":"Not Publish",
                ),
		'create_date',
                array(
                    'name'=>'image',
                    'type'=>'raw',
                    'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/blog/'.$model->image,'',array('width'=>250)),
                ),
	),
)); ?>
