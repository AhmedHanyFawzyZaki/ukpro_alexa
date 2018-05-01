<?php
$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Referrals','url'=>array('index')),
	array('label'=>'Create Referrals','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('referrals-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Referrals';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'referrals-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => '$data->user->username',
                    'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                ),
                'referral_id' => array(
                    'name' => 'referral_id',
                    'value' => '$data->referral->username',
                    'filter' => CHtml::listData(User::model()->findAll(), 'id', 'username'),
                ),
		'active' => array(
                    'name' => 'active',
                    'value' => '($data->active == 1)? "Active" : "Not Active"',
                    'filter' => array(1 => "Active", 0 => "Not Active"),
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
