<?php
$this->breadcrumbs=array(
    'Banners'=>array('index'),
    $model->id,
);
$this->menu=array(
	array('label'=>'List Banner','url'=>array('index')),
	array('label'=>'Create Banner','url'=>array('create')),
	array('label'=>'Update Banner','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Banner','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Banner "'. $model->header.' "'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
        'header',
       // 'subheader',
        'details',
        'publish' => array(
            'name' => 'publish',
            'value' => ($model->publish == 1)? "Publish" : "Not Publish",
        ),
        array(
            'name'=>'image',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/banner/'.$model->image,$model->header,array('width'=>250)),
        ),

	),
)); ?>
