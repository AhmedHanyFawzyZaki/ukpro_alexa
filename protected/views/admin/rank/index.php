<?php
$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Rank','url'=>array('index')),
	array('label'=>'Create Rank','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rank-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Ranks';?>

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'rank-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'title',
		'description',
		//'image',
                  array(
                    'name'=>'image',
                    'type'=>'html',
                    'value'=>'(!empty($data->image))?CHtml::image(Yii::app()->request->baseUrl."/media/rank/".$data->image,"",array("style"=>"width:50px;height:50px;")):"no image"',
                ),
		//'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
