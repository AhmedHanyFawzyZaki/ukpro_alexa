
<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-shopping-cart"></i></div>
                <h5>Purchase Points</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">
                <div class="col-md-10 col-md-offset-1 tools">
                    <h1 class="text-center">Purchase Points</h1>
                    <h4 class="text-center">You may optionally purchase points here, you can still earn points for free by using our auto pilot surf page, or referring friends.</h4>
                    <?php
                    if (Yii::app()->user->hasFlash('scammer'))
                        echo '<div class="alert alert-danger">' . Yii::app()->user->getFlash('scammer') . '</div>';
                    ?>
                    <div class="col-md-10 col-md-offset-1 ">
                        <?php
                        if ($packages) {
                            foreach ($packages as $pack) {
                                ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pricing-plan">
                                        <h3 class="pricing-title"><?= $pack->title ?></h3>
                                        <span class="pricing-label">Package</span>   
                                        <hr>
                                        <span class="pricing-price">
                                            <span class="pricing-amount"><?= $pack->points ?> Points</span>
                                        </span>
                                        <hr>
                                        <span class="pricing-price">
                                            <span class="pricing-amount"><?= $pack->price ?></span> USD
                                        </span>
                                        <div class="clear-fix">
                                            <button type="button" onclick="window.location = '<?= Yii::app()->request->baseUrl ?>/userpanel/checkoutExpress/<?= $pack->id ?>'" class="btn btn-primary btn-lg" value="Buy now" name="">Buy now</button>
                                        </div>
                                    </div> <!-- /.pricing -->
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-10 col-md-offset-1 ">
                        <h2 class="text-center">Build your package</h2>
                        <span class="text-center">Purchase exactly how many points you want.</span>
                        <form action="<?=Yii::app()->request->baseUrl?>/userpanel/checkoutExpress" method="POST">
                        <div class="col-md-10 col-md-offset-1 ">
                            <div id="slider"></div>
                            <span class="slider-range">
                                <label for="amount">Points:</label>
                                <input type="text" name="points" id="amount" readonly >
                            </span>
                            <span class="slider-range">
                                <label for="amount">Price: <span id="pack_price">0</span> USD</label>
                                <input type="hidden" name="price" id="price_amount" value="0"  >
                                <input type="hidden" name="points" id="points_amount" value="0"  >
                            </span>
                        </div>
                            <input type="submit" class="btn btn-primary btn-lg" value="Buy Now">
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/jquery-ui.css">
<script src="<?=Yii::app()->request->baseUrl?>/js/dashboard/jquery-ui.js"></script>
<script>
    $(function() {
        $("#slider").slider({
            range: "min",
            value: 0,
            min: 0,
            max: <?=Yii::app()->params['slider_max_points']?>,
            step: 5000,
            slide: function(event, ui) {
                $("#amount").val(ui.value + " Points");
                var factor=ui.value/5000;
                var default_5k_price="<?=Yii::app()->params['cost_of_5k_points'];?>";
                $('#price_amount').val(factor*default_5k_price);            
                $('#pack_price').html(factor*default_5k_price);
                $('#points_amount').val(ui.value);
            }
        });
        $("#amount").val($("#slider").slider("value") + " Points");
    });
</script>