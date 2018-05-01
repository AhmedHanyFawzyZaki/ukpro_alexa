<section class="section">
    <div class="mockup-content">
        <div class="row">
            <div class="heading">
                <div class="icons"><i class="fa fa-magic"></i></div>
                <h5>Auto surf</h5>
            </div><!--end heading-->
        </div>

        <div class="col-md-12 inner">
            <div class="col-md-12 views">

                <div class="col-md-12 launch">
                    <h3 class="mini-title">Auto Surf</h3>

                    <!--<div role="alert" class="alert alert-danger">
                        <a aria-hidden="true" href="#" data-dismiss="alert" class="close">x</a>

                        <strong>Alexa Toolbar Not Found</strong> We could not detect AlexaToolbar installed on your browser, your earned points will be diminished. 															
                    </div>

                    <div role="alert" class="alert alert-danger">
                        <a aria-hidden="true" href="#" data-dismiss="alert" class="close">x</a>
                        <p>
                            <strong>Popup Error</strong> There was an error creating or closing popup, please check your popup blocker settings and whitelist alexaboostup.com 	</p>														
                    </div>-->

                    <h5>Receive <?=Yii::app()->params['auto_surfing_points']?> point in <span id="time_left"><?=Yii::app()->params['surfing_period']?></span> seconds</h5>
                    <div class="progress" >
                        <div style="width: 0%" id="progress_bar_id" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-info progress-bar-striped">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>

                    <div class="col-md-12 points">
                        <div class="col-md-8 current">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <p class="head-title">Current URL</p>
                                </div>

                                <div class="panel-body ref-cont" id="current_url">
                                    <p>Loading...</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 cur-points">
                            <i class=" fa fa-magic"></i>
                            <span>Current Points</span>
                            <p id="current_points"><?=  User::model()->findByPk(Yii::app()->user->id)->points?></p>


                        </div>

                    </div>

                </div>


            </div>


        </div>

    </div>
</section>

<script>
    $(document).ready(function(e){
        var period=parseFloat(<?=Yii::app()->params['surfing_period']?>)*1000;
        var elapsed_time=0;
        setInterval(function(){
            loadAjax();
        },period);
        
        setInterval(function(){
            drawProgress();
        },1000);
        
        function loadAjax(){
            $.ajax({
                url: "<?=Yii::app()->request->baseUrl?>/userpanel/randomWebsite",
                success:function(data){
                    var arr=jQuery.parseJSON(data);
                    if(arr['status']=='success'){
                        $('#current_url').html("<p>"+arr['website']+"</p>");
                        $('#current_points').html(arr['points']);
                        window.open(arr['website'], "myWindowName", "width=800, height=600");
                    }else{
                        alert("Sorry! Something went wrong, please try again later.");
                        window.location="<?=Yii::app()->request->baseUrl?>/home";
                    }
                    //drawPage(arr);
                }
            });
        }
        
        function drawProgress(){
            elapsed_time++;
            var time_spent=elapsed_time%(period/1000);
            var percent=time_spent*100/(period/1000);
            var time_left=Math.round((period/1000)-time_spent);
            //console.log (percent);
            $('#progress_bar_id').css('width',Math.round(percent)+'%');
            $('#time_left').html(time_left);
        }
        
    });
</script>