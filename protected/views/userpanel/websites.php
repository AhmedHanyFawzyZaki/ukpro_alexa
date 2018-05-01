<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->

        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-cloud"></i></div>
                <h5>Manage websites</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">
                <?php
                    if(User::CanCreateWebsite()){
                ?>
                        <a href="<?=Yii::app()->request->baseUrl?>/userpanel/createWebsite" class="btn new-btn"><i class="fa fa-plus fa-fw"></i> New website</a>
                <?php
                    }
                    if(Yii::app()->user->hasFlash('wrong')){
                        echo '<div class="alert alert-danger">'.Yii::app()->user->getFlash('wrong').'</div>';
                    }
                ?>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Website</th>
                            <th>Status</th>
                            <th>Limit Per Day</th>
                            <th>Hide Referral</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($websites)
                            {
                                foreach($websites as $website)
                                {
                        ?>
                                    <tr>
                                        <td><a href="<?=$website->title?>" target="_blank"><?=$website->title?></a></td>
                                        <td><?=$website->active==1?'<span class="label label-success">Enabled</span>':'<span class="label label-danger">Disabled</span>'?></td>
                                        <td><?=$website->limit_points==0?'No Limit':$website->limit_points?></td>
                                        <td><?=$website->hide_referrals==1?'Yes':'No'?></td>
                                        <td>
                                            <a href="<?=$website->title?>" target="_blank"><i class="fa fa-link"></i></a>
                                            <a href="<?=Yii::app()->request->baseUrl?>/Userpanel/editWebsite/<?=$website->id?>"><i class="fa fa-pencil"></i></a>
                                            <a href="<?=Yii::app()->request->baseUrl?>/Userpanel/deleteWebsite/<?=$website->id?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }else{
                                echo '<tr><td colspan="5">No Websites Found!</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</section>

