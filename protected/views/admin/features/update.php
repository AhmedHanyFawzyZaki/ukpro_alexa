<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Features','url'=>array('index')),
	array('label'=>'Create Features','url'=>array('create')),
	array('label'=>'View Features','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Features #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>