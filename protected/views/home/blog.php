<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-8 col-xs-12 blog">
                    <?php
                    if($blogs){
                        foreach($blogs as $blog){ ?>
                            <div class="col-md-12 col-xs-12 blog-post">
                                <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/blog-<?=$blog->slug;?>" class="blog-title"><?=$blog->title;?></a>
                                <p class="data"><i>by</i><?= $blog->user->username;?><span><?= $blog->create_date;?></span></p>
                                <p class="blog-parag"><?= substr($blog->post, 0, 150) ;?></p>
                                <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/blog-<?=$blog->slug;?>"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/blog/<?=$blog->image;?>" alt="" /></a>
                                <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/blog-<?=$blog->slug;?>" class="more">read more...</a>
                            </div>
                    <?php
                        }
                    }else{ ?>
                        <div class="alert success-alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            No Blogs Found!
                        </div>
                    <?php
                    }
                    ?>
                <!--<div class="col-md-12 col-xs-12 more-posts">
                    <button type="button" class="btn btn-default">more posts</button>
                </div>-->
                </div><!--end blog-->
                <div class="col-md-4 col-xs-12 top-posts">
                    <p class="blog-title">top posts</p>
                    <?php
                    if($tops){
                        foreach($tops as $top){ 
                    ?>
                            <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/blog-<?= $top->blog->slug; ?>" class="col-md-12 col-xs-12"><?=$top->blog->title;?></a>
                    <?php
                        }
                    }
                    ?>
                    <div class="col-md-12 col-xs-12 categ">
                        <p class="blog-title">categories</p>
                        <?php
                        if($categories){
                            foreach($categories as $cat){ ?>
                                <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/blog?cat=<?=$cat->slug?>" class="col-md-12 col-xs-12"><?=$cat->title?></a>
                        <?php
                            }
                        }
                        ?>
                    </div><!--end categ-->
                </div><!--end top-posts-->
            </div><!--end inner-->
        </div>
    </div>
</div><!--end inner-bg-->
