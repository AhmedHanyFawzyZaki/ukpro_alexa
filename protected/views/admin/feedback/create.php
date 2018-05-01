<?php
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Feedback','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Feedback';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>