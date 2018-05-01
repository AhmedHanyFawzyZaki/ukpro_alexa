<footer class="col-md-12 col-xs-12">
    <div class="visitor-bg">
        <div class="visitor">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 visit-inner">
                <?php
                    $users_used_points = UserPoints::model()->findAll();
                    $count=0;
                    foreach ($users_used_points as $point) {
                       $count += $point->used;
                    }
                ?>
                <p class="numbers pull-left"><span><?php echo count(User::model()->findAll(array('condition' => 'active= 1')));  ?></span>active members </p>
                <p class="numbers pull-right"><span><?php echo $count/Yii::app()->params['auto_surfing_points']; ?></span>total visits</p>
            </div>
        </div>
    </div><!--end visitor-bg-->
    <div class="container">
        <div class="wrap">
            <div class="col-md-12 col-xs-12 footer-inner">
                <div class="col-md-7 col-xs-12 footer-left">
                    <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/index"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/front/logo.png" alt="" /></a>
                    <ul class="isocial" id="social">
                        <li><a class="face" href="<?= Yii::app()->params['facebook']; ?>" target="_blank"></a></li>
                        <li><a class="twitter" href="<?= Yii::app()->params['twitter']; ?>" target="_blank"></a></li>
                        <li><a class="youtube" href="<?= Yii::app()->params['youtube']; ?>" target="_blank"></a></li>
                        <li><a class="google" href="<?= Yii::app()->params['google']; ?>" target="_blank"></a></li>
                    </ul>
                    <p class="copy">copyright © <?= date('Y'); ?> . All Rights Reserved .</p>
                </div><!--end footer-left-->
                <div class="col-md-5 col-xs-5 footer-right pull-right">
                    <div class="col-md-6 col-xs-6">
                        <ul class="nav nav-pills nav-stacked" style="max-width: 300px; margin-top:30px;">
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/tour">Tour </a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/support">Support</a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/buy">Buy</a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/blog">Blog</a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true); ?>/home/features">Features</a></li>  
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <ul class="nav nav-pills nav-stacked" style="max-width: 300px; margin-top:30px;">
                            <li><a href="<?= HtmlHelper::HtmlPageLink(1); ?>">About Us </a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true);?>/contact-us">Contact us</a></li>
                            <li><a href="<?= HtmlHelper::HtmlPageLink(3); ?>">Terms & Conditions</a></li>
                            <li><a href="<?= HtmlHelper::HtmlPageLink(2); ?>">Privacy Policy</a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl(true);?>/home/faq">FAQs</a></li>  
                        </ul>
                    </div>
                </div><!--end footer-right-->
            </div><!--end footer-inner-->
        </div>
    </div>
</footer>

        <!-- JS and analytics only. -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?= Yii::app()->request->getBaseUrl(true); ?>/js/front/jquery.js"></script>
        <script src="<?= Yii::app()->request->getBaseUrl(true); ?>/js/front/bootstrap.js"></script>
        <script src="<?= Yii::app()->request->getBaseUrl(true); ?>/js/front/waypoints.min.js"></script>

        <script>
            $(document).ready(function() {

                $('.wp2').waypoint(function() {
                    $('.wp2').addClass('animated fadeInUp');
                }, {
                    offset: '75%'
                });

                $('.wp4').waypoint(function() {
                    $('.wp4').addClass('animated fadeInRight');
                }, {
                    offset: '75%'
                });

                $('.wp5').waypoint(function() {
                    $('.wp5').addClass(' animated rotateIn delay-05s');
                }, {
                    offset: '75%'
                });
                
                $('.wp7').waypoint(function() {
                    $('.wp7').addClass('animated bounce');
                }, {
                    offset: '75%'
                });


                $('.wp3').waypoint(function() {
                    $('.wp3').addClass('animated fadeInLeft');
                }, {
                    offset: '75%'
                });

                $('.wp1').waypoint(function() {
                    $('.wp1').addClass('animated fadeIn');
                }, {
                    offset: '75%'
                });

            });
        </script>

    </body>
</html>
