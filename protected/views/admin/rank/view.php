<?php
$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Rank','url'=>array('index')),
	array('label'=>'Create Rank','url'=>array('create')),
	array('label'=>'Update Rank','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Rank','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Rank #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'description',
		//'image',
                  array(
            'name'=>'image',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/rank/'.$model->image,$model->title,array('width'=>250)),
        ),
		//'sort',
	),
)); ?>
