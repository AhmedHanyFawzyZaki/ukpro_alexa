<?php
$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Referrals','url'=>array('index')),
	array('label'=>'Create Referrals','url'=>array('create')),
	array('label'=>'View Referrals','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Referrals #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>