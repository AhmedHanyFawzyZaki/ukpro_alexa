<?php
$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Blog','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Blog';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>