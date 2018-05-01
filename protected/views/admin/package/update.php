<?php
$this->breadcrumbs=array(
	'Packages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Package','url'=>array('index')),
	array('label'=>'Create Package','url'=>array('create')),
	array('label'=>'View Package','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Package #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>