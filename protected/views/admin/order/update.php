<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	array('label'=>'Create Order','url'=>array('create')),
	array('label'=>'View Order','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Order #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>