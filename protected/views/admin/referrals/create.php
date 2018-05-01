<?php
$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Referrals','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Referrals';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>