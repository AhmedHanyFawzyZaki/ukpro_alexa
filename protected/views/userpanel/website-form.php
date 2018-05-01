
<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-cloud"></i></div>
                <h5>New Website</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-8">



                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                        'id'=>'website-form',
                        'enableAjaxValidation'=>false,
                        'type'=>'horizontal',
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                )); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="">Website URL</label>
                        <div class="col-sm-9">
                            <?php echo $form->textField($model,'title',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Website url')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="">Limit points</label>
                        <div class="col-sm-9">
                            <?php echo $form->textField($model,'limit_points',array('class'=>'form-control','maxlength'=>10)); ?>
                            <span class="help-block">Limit how many points used per day, enter 0 to allow maximum hits to be used.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Enable Website</label>
                        <div class="col-md-9">
                            <?=$form->radioButtonList($model,'active',array('0'=>'No','1'=>'Yes'))?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Hide Referral</label>
                        <div class="col-md-9">
                            <?=$form->radioButtonList($model,'hide_referrals',array('0'=>'No','1'=>'Yes'),array('labelOptions'=>array('style'=>'display:inline', 'separator'=>'  ')))?>
                            
                            <span class="help-block">We will attempt to blank your referrer, and for a fallback your referral will come from <a href="http://www.whattosearch.com" target="_blank">whattosearch.com</a>.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    'buttonType'=>'submit',
                                    'type'=>'danger',
                                    'label'=>$model->isNewRecord ? 'Add' : 'Edit',
                            )); ?>
                            <!--<button href="new_website.html" class="btn btn-danger" type="submit">Save</button>
                            <button class="btn btn-default" type="submit">Save</button>-->
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>

    </div>
</section>