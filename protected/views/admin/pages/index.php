<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pages','url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pages-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Pages';?> 

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
        'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
	'columns'=>array(
		'title',
		'publish' => array(
                    'name'=>'publish',
                    'value'=>'$data->getStatus($data->publish)',
		) ,
		array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view}{update}',
		),
	),
)); ?>
