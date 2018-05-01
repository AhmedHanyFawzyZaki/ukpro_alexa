<?php
$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Blog','url'=>array('index')),
	array('label'=>'Create Blog','url'=>array('create')),
	array('label'=>'View Blog','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Blog #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>