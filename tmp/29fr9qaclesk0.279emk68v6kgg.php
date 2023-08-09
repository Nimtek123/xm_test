<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<div class="content">
    <div class="container-fluid">
            <header class="content__title"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <h1>Temperature Readings</h1>
        

        <div class="actions">
            <a href="" class="actions__item zmdi zmdi-trending-up"></a>
            <a href="" class="actions__item zmdi zmdi-check-all"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zmdi zmdi-more-vert" aria-expanded="false"></i>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(35px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a href="" class="dropdown-item">Refresh</a>
                    <a href="" class="dropdown-item">Manage Widgets</a>
                    <a href="" class="dropdown-item">Settings</a>
                </div>
            </div>
        </div>
    </header>

    <div class="row quick-stats">

        <div class="col-sm-6 col-lg-3">
            <div class="widget-simple-chart text-center card-box">
                <h3 class="text-success m-t-10" id="dispDwellTime"><?= ($totalResults) ?></h3>
                <p class="text-muted text-nowrap m-b-10">Total Events</p>
            </div>
        </div>
            

        <div class="col-sm-6 col-lg-3">
            <div class="widget-simple-chart text-center card-box">
                <h3 class="text-danger m-t-10" id="dispDwellTime"><?= ($highTemps) ?></h3>
                <p class="text-muted text-nowrap m-b-10">High Temperature Alerts</p>
            </div>
        </div>
        
         <div class="col-sm-6 col-lg-3">
            <div class="widget-simple-chart text-center card-box">
                <h3 class="text-pink m-t-10" id="dispDwellTime"><?= ($lowTemps) ?></h3>
                <p class="text-muted text-nowrap m-b-10">Low Temperature Alerts</p>
            </div>
        </div>
        
    
        <div class="col-sm-6 col-lg-3">
            <div class="widget-simple-chart text-center card-box">
                <h3 class="text-primary m-t-10" id="dispDwellTime"><?= ($nomalTemps) ?></h3>
                <p class="text-muted text-nowrap m-b-10">Normal Temperature Alerts</p>
            </div>
        </div>

        
    </div>
<div class="row">

            <div class="col-sm-12">
                <form action="./temperature" method="post">
            <div class="row">
                <div class="col-sm-3">
                    <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="start_date" id="start_date" value="<?= ($POST['start_date']) ?>" placeholder="Start Date" data-provide="datepicker" data-date-autoclose="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3">
                    <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                        <tr>
                            <td>
                               <div class="input-group">
                                    <input type="text" class="form-control" name="end_date" id="end_date" value="<?= ($POST['end_date']) ?>" placeholder="End Date" data-provide="datepicker" data-date-autoclose="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            
                <div class="col-sm-3">
                    <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                        <tr>
                            <td>
                                <button type="submit" name="submit" class="btn btn-block" >Filter</button>
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </form>
            </div>

        </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temperature Events</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">

                       <table id="datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead class="thead-default">

                                <tr> 
                                    <?php if ($tmpImg == 'true'): ?><th class="text-strong" >Image</th><?php endif; ?>
                                    <th class="text-strong" >Name</th>
                                    <th class="text-strong" >Device Name</th>
                                    <th class="text-strong" >Temperature</th>
                                    <th class="text-strong" >Date</th>
                                    <!--<th class="text-strong" >Confirmed</th>-->
                                    <!--th class="text-strong" >Confidence</th-->
                                </tr>
                            </thead>
                            <tbody >


                            

                                <?php foreach (($tempResults?:[]) as $skey=>$value): ?>

                                    <tr>
                                        <?php if ($tmpImg == 'true'): ?>
                                            <td>
                                                <div class="row">
                                                <div class="col-12">
                                                    <a class="thumbnail fancybox " rel="ligthbox" href='data://text/plain;base64,<?= ($value['tmp_imageData']) ?>'>
                                                        <img src="data://text/plain;base64,<?= ($value['tmp_imageData']) ?>" height="100px">
                                                    </a>
                                                    
                                                    </div>
                                                
                                                </div> 
                                            </td>
                                        <?php endif; ?>
                                         <td>
                                        

                                        </td>
                                        <td>
                                        <?= ($value['tmp_deviceID'])."
" ?>

                                        </td>
                                        <td><?php if ($value['tmp_isAbnomalTemperature'] == 'true'): ?>
                                            <span style="color:red"><?= ($value['tmp_temperature']) ?></span>
                                            <?php else: ?><?= ($value['tmp_temperature']) ?>
                                        <?php endif; ?>
                                           
                                        </td>
                                        <td>
                                            <?= ($value['tmp_dateCreated'])."
" ?>
                                        </td>
                                    <!--     <td>-->

                                    <!--<?php if ($value['alt_confirmed'] == 'n'): ?>-->
                                    <!--    <span class="fa fa-times text-danger"></span> &nbsp; -->
                                    <!--    <span style="color:red;">Not yet Confirmed</span>-->

                                    <!--    <?php else: ?>-->
                                    <!--    <span class="fa fa-check text-success"></span> &nbsp; -->
                                    <!--    <span class="text-success">Confirmed</span>-->

                                    <!--    -->
                                    <!--<?php endif; ?>-->

                                    <!--</td>-->
                                        <!--td>
                                            <?php if (round((0.6 - $value['alt_score']) * 1000)  == 600): ?>
                                                100%

                                                <?php else: ?>
                                                    <?= (round((0.6 - $value['alt_score']) * 1000)) ?> %
                    
                                                
                                            <?php endif; ?>
                                           
                                        </td-->
                                        
                                       

                                    </tr>


                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<script>
$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});

    function get_days() {
    var opt = '';
    var selct = '';
    var target = '';

    var ajaxData = '';
    ajaxData = "month=" + $("#month").val();
    selct = '<option value="">-- Day --</option>';

    $.ajax({
        type: 'POST',
        url: '/get_days',
        data: ajaxData,
        dataType: 'HTML',
        success: function (r) {
            var arr = JSON.parse(r);

            var i = 0;
            $("#days").html(selct);
            for (i = 0; i < arr.length; i++) {
                $("#days").append("<option value='" + arr[i].day + "'>" + arr[i].day + "</option>");
            }

        },
        error: function (r, textStatus, errorThrown) {
            alert(r + textStatus + errorThrown);
        }


    });
}



</script>


