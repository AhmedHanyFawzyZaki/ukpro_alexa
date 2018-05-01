<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Users';?> 

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
        'orderField' => 'sort',
        'idField' => 'id',
        'orderUrl' => 'order',
        'columns'=>array(
		'username',
		'email',
		'groups_id'=>array(// display 'author.username' using an expression
                    'name'=>'groups_id',
                    'value'=>'$data->usergroup->group_title',
                    'filter'=> Groups::model()->getgroups(),
                ),
                array(
                    'class'=>'CLinkColumn',
                    'label'=>'Points',
                    'urlExpression'=>'Yii::app()->request->baseUrl."/admin/userPoints/index?user=".$data->id',
                    'header'=>'User Points',
                ),
                 array(
                    'class'=>'CLinkColumn',
                    'label'=>'Packages',
                    'urlExpression'=>'Yii::app()->request->baseUrl."/admin/order/index?user=".$data->id',
                    'header'=>'User Packages',
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
