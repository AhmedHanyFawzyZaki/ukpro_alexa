<?php
$this->breadcrumbs=array(
	'How Works'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HowWork','url'=>array('index')),
	array('label'=>'Create HowWork','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('how-work-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage How Works';?>


<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'how-work-grid',
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
                    'value'=>'(!empty($data->image))?CHtml::image(Yii::app()->request->baseUrl."/media/how_work/".$data->image,"",array("style"=>"width:50px;height:50px;")):"no image"',
                ),
		//'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
