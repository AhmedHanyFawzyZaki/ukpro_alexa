<section class="section">
    <div class="mockup-content">
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-comments"></i></div>
                <h5>Support</h5>
            </div><!--end heading-->
        </div>
        <div class="col-md-12 inner">
            <div class="col-md-12 views">
                <div class="col-md-6 contact">
                    <h3 class="mini-title">Contact Us</h3>
                    <?php if(Yii::app()->user->hasflash('contact'))
                    {
                    	echo '<div class="alert alert-success">'.Yii::app()->user->getFlash('contact').'</div>';
                    } ?>
                    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                    'id'=>'contact-form',
                    'enableAjaxValidation'=>true,
                    'type'=>'horizontal',
                    'htmlOptions'=>array('class'=>'multipart/form-data' ,'class' =>'form-horizontal form1'),
                    )); ?>
                        <?php echo $form->errorSummary($model);?>
                        <div class="form-group">
                            <label class="col-md-3">Subject:<span style="color: red">*</span></label>
                            <div class="col-md-7">
                                <?php echo $form->textField($model,'subject',array('class' => 'form-control', 'required')); ?>
                            </div> <!-- /.col -->
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-md-3">Message:<span style="color: red">*</span></label>
                            <div class="col-md-7">
                                <?php echo $form->textArea($model,'body',array('cols' => 5,'class' => 'form-control', 'required')); ?>
                            </div> <!-- /.col -->
                        </div> <!-- /.form-group -->					
                        <div class="form-group">
                            <label class="col-md-3">Email:<span style="color: red">*</span></label>
                            <div class="col-md-7">
                                <?php echo $form->textField($model,'email',array('class' => 'form-control', 'required')); ?>
                            </div> <!-- /.col -->
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-push-3">
                                <?php $this->widget('bootstrap.widgets.TbButton',
                                    array('buttonType'=>'submit',
                                        'type'=>'primary',
                                        'label'=>'Send',
                                        'htmlOptions'=>array('class'=>'btn btn-danger pull-right')
                                  )); ?>
                            </div> <!-- /.col -->
                        </div> <!-- /.form-group -->					
                   <?php $this->endWidget(); ?>	       
                </div>
                
                <div class="col-md-6 faqs">
                    <h3 class="mini-title">FAQ and Knowledge Base</h3>
                    
                    <div class="panel-group" id="accordion">
                        <?php
                        $i = 1;
                        foreach($faqs as $faq){ ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $faq->id; ?>">
                                      <?= $faq->question; ?>
                                    </a>
                                  </h4>
                                </div>
                                <?php
                                if($i == 1){ ?>
                                    <div id="collapse_<?= $faq->id; ?>" class="panel-collapse collapse in">
                                <?php
                                }else{ ?>
                                    <div id="collapse_<?= $faq->id; ?>" class="panel-collapse collapse">
                                <?php
                                }
                                ?>
                                    <div class="panel-body">
                                        <?= $faq->answer; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        $i ++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
                
    </div>
</section>