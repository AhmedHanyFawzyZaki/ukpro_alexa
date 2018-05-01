<?php
$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogCategory','url'=>array('index')),
	array('label'=>'Create BlogCategory','url'=>array('create')),
	array('label'=>'View BlogCategory','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update BlogCategory "'. $model->title.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>