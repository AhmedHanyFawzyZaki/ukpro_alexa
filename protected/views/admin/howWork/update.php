<?php
$this->breadcrumbs=array(
	'How Works'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HowWork','url'=>array('index')),
	array('label'=>'Create HowWork','url'=>array('create')),
	array('label'=>'View HowWork','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update HowWork #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>