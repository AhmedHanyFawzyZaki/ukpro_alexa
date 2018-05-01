<?php
$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rank','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Rank';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>