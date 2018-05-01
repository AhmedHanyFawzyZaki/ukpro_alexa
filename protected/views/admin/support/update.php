<?php
$this->breadcrumbs=array(
	'Supports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Support','url'=>array('index')),
	array('label'=>'Create Support','url'=>array('create')),
	array('label'=>'View Support','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Support #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>