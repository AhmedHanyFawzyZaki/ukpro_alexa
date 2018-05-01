<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Features','url'=>array('index')),
	array('label'=>'Create Features','url'=>array('create')),
	array('label'=>'Update Features','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Features','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Features "'. $model->title.'"'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'description',
                'color',
                array(
                    'name'=>'home_image',
                    'type'=>'raw',
                    'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/features/'.$model->home_image,'',array('width'=>250)),
                ),
                array(
                    'name'=>'inner_image',
                    'type'=>'raw',
                    'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/features/'.$model->inner_image,'',array('width'=>250)),
                ),
	),
)); ?>
