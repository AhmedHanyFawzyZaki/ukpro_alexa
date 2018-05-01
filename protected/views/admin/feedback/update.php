<?php
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Feedback','url'=>array('index')),
	array('label'=>'Create Feedback','url'=>array('create')),
	array('label'=>'View Feedback','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Feedback #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>