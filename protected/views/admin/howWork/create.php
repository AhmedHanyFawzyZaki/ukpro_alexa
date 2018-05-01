<?php
$this->breadcrumbs=array(
	'How Works'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HowWork','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create HowWork';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>