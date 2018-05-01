<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Features','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Features';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>