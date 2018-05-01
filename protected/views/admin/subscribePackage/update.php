<?php
$this->breadcrumbs=array(
	'Subscribe Packages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubscribePackage','url'=>array('index')),
	array('label'=>'Create SubscribePackage','url'=>array('create')),
	array('label'=>'View SubscribePackage','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update SubscribePackage "'. $model->title.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>