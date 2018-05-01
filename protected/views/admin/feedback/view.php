<?php
$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Feedback','url'=>array('index')),
	array('label'=>'Create Feedback','url'=>array('create')),
	array('label'=>'Update Feedback','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Feedback','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Feedback " '. $model->subject.' "'; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'subject',
		'content',
		'email',
		'vote' => array(
                    'name' => 'vote',
                    'value' => ($model->vote == 1)? "Yes" : "No",
                ),
		'num_of_votes',
	),
)); ?>
