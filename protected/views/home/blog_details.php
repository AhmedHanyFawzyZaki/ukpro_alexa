<div class="inner-bg">
    <div class="container">
        <div class="wrapper">
            <p class="inner-msg">Not A Member Yet? <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/register">Join Now</a> And Get <?= Yii::app()->params['user_intial_points']; ?> free points Today!</p>
            <div class="col-md-12 col-xs-12 inner">
                <div class="col-md-8 col-xs-12 blog blog-details">
                    <div class="col-md-12 col-xs-12 blog-post">
                        <a href="" class="blog-title"><?= $blog->title; ?></a>
                        <p class="data"><i>by</i><?= $blog->user->username; ?><span><?= $blog->create_date; ?></span></p>
                        <a href="#" class="blog-img"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/blog/<?= $blog->image; ?>" alt="" /></a>
                        <p class="blog-parag"><?= $blog->post; ?></p>
                        <p class="parag2 col-md-7 col-xs-7"></p>
                        <img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/blog/<?=$blog->image?>" alt="" class="col-md-5 col-xs-5">
                    </div>
                    <div class="col-md-12 col-xs-12 reviews">
                        <?php
                        if(Yii::app()->user->id){ ?>
                            <div class="col-md-12 col-xs-12 review-posts">
                                <a href="#" class="user col-md-2 col-xs-2"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/members/<?= User::model()->findByPk(Yii::app()->user->id)->image; ?>" alt="" /></a>
                                <div class="col-md-10 col-xs-10">
                                    <form method="post" action="<?= Yii::app()->request->getBaseUrl(true); ?>/blog-<?=$blog->slug?>">
                                        <textarea rows="1" placeholder="Comment" name = "comment" class="form-control" required="required"></textarea>
                                        <button class="btn btn-default pull-right" type="submit">ADD</button>
                                    </form>
                                </div>
                            </div>
                        <?php
                        }else{ ?>
                            <div class="alert success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/login">Login</a> Or <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/register">Join Us</a> To Add Your Comment.
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        foreach ($comments as $comment){
                            $d1 = new DateTime($comment->create_date);
                            $d2 = new DateTime(date('Y-m-d'));
                            ?>
                            <div class="col-md-12 col-xs-12 review-posts">
                                <a href="#" class="user col-md-2 col-xs-2"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/media/members/<?= $comment->user->image; ?>" alt="" /></a>
                                <div class="col-md-10 col-xs-10">
                                    <p class="username"><?= $comment->user->username; ?>• <?= $d1->diff($d2)->m + ($d1->diff($d2)->y*12); ?> months ago</p>
                                    <p class="comment"><?= $comment->comment; ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div><!--end reviews-->
                </div><!--end blog-->
                <div class="col-md-4 col-xs-12 top-posts">
                    <p class="blog-title">top posts</p>
                    <?php
                    foreach($tops as $top){ ?>
                      <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/blog-<?= $top->blog->slug; ?>" class="col-md-12 col-xs-12"><?=  $top->blog->title; ?></a>  
                    <?php
                    }
                    ?>
                    <div class="col-md-12 col-xs-12 categ">
                        <p class="blog-title">categories</p>
                        <?php
                        foreach ($categories as $cat){ ?>
                            <a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/blog?cat=<?=$cat->slug?>" class="col-md-12 col-xs-12"><?= $cat->title; ?></a>
                        <?php
                        }
                        ?>
                    </div><!--end categ-->
                </div><!--end top-posts-->
            </div><!--end inner-->
        </div>
    </div>
</div><!--end inner-bg-->