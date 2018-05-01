
</div><!-- /container -->
<div class="morph-button morph-button-sidebar morph-button-fixed">
    <button type="button"><span class="fa fa-navicon"></span></button>
    <div class="morph-content">
        <div>
            <div class="content-style-sidebar">
                <span class="icon icon-close"><i class="fa fa-times"></i></span>
                <h2>Menu</h2>
                <ul class="main-menu">
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/websites"><i class="fa fa-cloud"></i>Manage websites</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/tools"><i class="fa fa-gear"></i>Tools</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/settings"><i class="fa fa-gears"></i>Settings</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/earn"><i class="fa fa-magic"></i>Earn points</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/referrals"><i class="fa fa-group"></i>Referrals</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/purchase"><i class="fa fa-shopping-cart"></i>Purchase Points</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/subscribe"><i class="fa fa-paperclip"></i>Subscribe</a></li>
                    <li><a class="" href="<?=Yii::app()->request->baseUrl?>/userpanel/support"><i class="fa fa-comments"></i>Support</a></li>

                </ul>
            </div>
        </div>
    </div>
</div><!-- morph-button -->

<script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/bootstrap.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/classie.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/uiMorphingButton_fixed.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/menu.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/highcharts.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/js/dashboard/notificationFx.js"></script>
<!--<script>
    (function() {
        var bttn = document.getElementById('notification-trigger');

        // make sure..
        bttn.disabled = false;

        bttn.addEventListener('click', function() {

            setTimeout(function() {

                classie.remove(bttn, 'active');

                // create the notification
                var notification = new NotificationFx({
                    message: '<p>The event was added to your calendar. Check out all your events in your <a href="#">event overview</a>.</p>',
                    layout: 'attached',
                    effect: 'bouncyflip',
                    type: 'notice', // notice, warning or error

                });

                // show the notification
                notification.show();

            }, 1200);


        });
    })();
</script>-->
<script>
    $('.ttip').tooltip("hide");
</script>

</body>
<!-- InstanceEnd --></html>