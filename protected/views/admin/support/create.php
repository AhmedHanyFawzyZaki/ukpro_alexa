<?php
$this->breadcrumbs=array(
	'Supports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Support','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Support';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>