<?php
$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rank','url'=>array('index')),
	array('label'=>'Create Rank','url'=>array('create')),
	array('label'=>'View Rank','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Rank #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>