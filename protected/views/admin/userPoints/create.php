<?php
$this->breadcrumbs=array(
	'User Points'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserPoints','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create UserPoints';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>