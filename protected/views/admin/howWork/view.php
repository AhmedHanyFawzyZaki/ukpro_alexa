<?php
$this->breadcrumbs=array(
	'How Works'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List HowWork','url'=>array('index')),
	array('label'=>'Create HowWork','url'=>array('create')),
	array('label'=>'Update HowWork','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete HowWork','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View HowWork #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'description',
		//'image',
              array(
            'name'=>'image',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/how_work/'.$model->image,$model->title,array('width'=>250)),
        ),
		//'sort',
	),
)); ?>
