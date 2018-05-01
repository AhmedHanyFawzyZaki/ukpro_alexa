<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Website','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Website';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>