<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Website','url'=>array('index')),
	array('label'=>'Create Website','url'=>array('create')),
	array('label'=>'View Website','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Website #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>