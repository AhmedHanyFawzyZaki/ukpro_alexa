<?php
$this->breadcrumbs=array(
	'Blog Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogCategory','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create BlogCategory';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>