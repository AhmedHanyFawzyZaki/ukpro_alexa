<?php
$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogComment','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create BlogComment';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>