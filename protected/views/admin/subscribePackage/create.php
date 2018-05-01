<?php
$this->breadcrumbs=array(
	'Subscribe Packages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubscribePackage','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create SubscribePackage';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>