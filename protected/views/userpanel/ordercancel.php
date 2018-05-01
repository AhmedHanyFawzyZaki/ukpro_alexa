<section class="section">
    <div class="mockup-content">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-shopping-cart"></i></div>
                <h5>Order Cancellation</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">
                <div class="col-md-10 col-md-offset-1 tools">
                    <h2>Order Cancellation!</h2><br><br>
                    <div class="alert alert-warning">
                        <h5 class="text-center">
                            <?php
                            if (Yii::app()->user->hasFlash('ErrorCancel'))
                                echo Yii::app()->user->getFlash('ErrorCancel');
                            else
                                echo 'Your order has been cancelled successfully.';
                            ?>
                        </h5>
                    </div>
                    <br><br>

                    <h4 class="text-center">Thank you for using <?= Yii::app()->name ?>.</h4>

                </div>
            </div>
        </div>

    </div>
</section>
