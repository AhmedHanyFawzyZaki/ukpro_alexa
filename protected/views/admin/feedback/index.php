<?php
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Feedback','url'=>array('index')),
	array('label'=>'Create Feedback','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('feedback-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Feedbacks';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'feedback-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'subject',
		'email',
		'vote' => array(
                    'name' =>'vote',
                    'value' => '($data->vote == 1)? "Yes" : "No"',
                    'filter' => array(1 => 'Yes', 0 => 'No'),
                ),
		'num_of_votes',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
