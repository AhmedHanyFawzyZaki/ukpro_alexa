<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Settings','url'=>array('index')),
);
?>
<h1>View Settings</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'facebook',
		'twitter',
                'google',
                'youtube',
                'address',
                'business_hours',
		'email',
		/*'api_username',
		'api_password',
		'signature',		*/
                'auto_surfing_points',
                'surfing_period',
                'referral_points',
                'user_intial_points',
                'cost_of_5k_points',
                'slider_min_pints',
                'slider_max_pints',
                'how_work_video',
                'alexa_ranking',
                'alexa_features',
                'alexa_take_tour',
                array(
                    'name'=>'logo',
                    'type'=>'raw',
                    'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/settings/'.$model->logo,'',array('width'=>250)),
                ),
	),
)); ?>
