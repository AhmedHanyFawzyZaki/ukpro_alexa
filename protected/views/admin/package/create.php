<?php
$this->breadcrumbs=array(
	'Packages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Package','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Package';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>