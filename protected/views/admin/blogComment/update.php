<?php
$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogComment','url'=>array('index')),
	array('label'=>'Create BlogComment','url'=>array('create')),
	array('label'=>'View BlogComment','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update BlogComment #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>