<?php
$this->breadcrumbs=array(
	'User Points'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserPoints','url'=>array('index')),
	array('label'=>'Create UserPoints','url'=>array('create')),
	array('label'=>'View UserPoints','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update UserPoints #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>