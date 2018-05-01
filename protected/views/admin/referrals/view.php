<?php
$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Referrals','url'=>array('index')),
	array('label'=>'Create Referrals','url'=>array('create')),
	array('label'=>'Update Referrals','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Referrals','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Referrals #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => $model->user->username,
                ),
		'referral_id' => array(
                    'name' => 'referral_id',
                    'value' => $model->referral->username,
                ),
		'active' => array(
                    'name' => 'active',
                    'value' => ($model->active == 1)? "Active": "Not Active",
                ),
	),
)); ?>
