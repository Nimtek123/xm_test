<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<div class="content">
    <div class="container-fluid">
        <header class="content__title">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <h1>Temperature Readings</h1>


            <div class="actions">
                <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                <a href="" class="actions__item zmdi zmdi-check-all"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert" aria-expanded="false"></i>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                        style="position: absolute; transform: translate3d(35px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
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
                    <h3 class="text-success m-t-10" id="dispDwellTime"><?= ($totalEntrance) ?></h3>
                    <p class="text-muted text-nowrap m-b-10">Total Entrance</p>
                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-danger m-t-10" id="dispDwellTime"><?= ($gymEntry) ?></h3>
                    <p class="text-muted text-nowrap m-b-10">Gym Entry</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-pink m-t-10" id="dispDwellTime"><?= ($foyerEntry) ?></h3>
                    <p class="text-muted text-nowrap m-b-10">Foyer Entry</p>
                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-primary m-t-10" id="dispDwellTime"><?= ($gymExit) ?></h3>
                    <p class="text-muted text-nowrap m-b-10">Exit</p>
                </div>
            </div>


        </div>
        <div class="row quick-stats">

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-success m-t-10" id="dispDwellTime"><?= ($totalResults) ?></h3>
                    <p class="text-muted text-nowrap m-b-10">Total Temperatures</p>
                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <a href="/temperature/highAlerts">
                    <div class="widget-simple-chart text-center card-box">
                        <h3 class="text-danger m-t-10" id="dispDwellTime"><?= ($highTemps) ?></h3>
                        <p class="text-muted text-nowrap m-b-10">High Temperature Alerts</p>
                    </div>
                </a>
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
                <form action="/reporting" method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="start_date" id="start_date"
                                                value="<?= ($POST['start_date']) ?>" placeholder="Start Date"
                                                data-provide="datepicker" data-date-autoclose="true">
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
                                            <input type="text" class="form-control" name="end_date" id="end_date"
                                                value="<?= ($POST['end_date']) ?>" placeholder="End Date"
                                                data-provide="datepicker" data-date-autoclose="true">
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
                                            <select id="category" name="category" class="form-control" style="display: inherit;" required>
                                                <option value="">--Select Search Type--</option>
                                                <option value="All">All Records</option>
                                                <option value="Athlete">Athlete</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Contractor">Contractor</option>
                                                <option value="Visitor">Visitors</option>
                                                <script>$('#category option[value="<?= ($POST['category']) ?>"]').attr("selected", "selected");</script>

                                            </select>
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
                                            <select id="deviceType" name="deviceType" class="form-control" style="display: inherit;" required>
                                                <option value="">--Select Device Type--</option>
                                                <option value="All">All Records</option>
                                                <option value="Gym Entry (U)">Gym Entry (U)</option>
                                                <option value="Gym Entry (L)">Gym Entry (L)</option>
                                                <option value="Foyer Entry (U)">Foyer Gym (U)</option>
                                                <option value="Foyer Entry (L)">Foyer Entry (L)</option>
                                                <option value="Exit (U)">Exit (U)</option>
                                                <option value="Exit (L)">Exit (L)</option>
                                                <script>$('#deviceType option[value="<?= ($POST['deviceType']) ?>"]').attr("selected", "selected");</script>

                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-sm-3">
                            <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                                <tr>
                                    <td>
                                        <button type="submit" name="submit" class="btn btn-block">Filter</button>
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

                            <table id="datatable-buttons" class="table table-buttons datatable table-bordered table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">

                                <thead class="thead-default">

                                    <tr>
                                        <th class="text-strong">Date</th>
                                        <th class="text-strong">Name</th>
                                        <th class="text-strong">Contact</th>
                                        <th class="text-strong">Classification</th>
                                        <th class="text-strong">Device Name</th>
                                        <th class="text-strong">Temperature</th>
                                        <!--<th class="text-strong" >Confirmed</th>-->
                                        <!--th class="text-strong" >Confidence</th-->
                                    </tr>
                                </thead>
                                <tbody>




                                    <?php foreach (($tempResults?:[]) as $skey=>$value): ?>

                                        <tr>
                                            <td>
                                                <?= (date("d-m-Y H:i:s", strtotime($value['tmp_dateCreated'])))."
" ?>
                                            </td>
                                            <td>
                                                <?= ($value['tmp_username'])."
" ?>

                                            </td>
                                            <td>
                                                <?= ($value['contact'])."
" ?>

                                            </td>
                                            <td><?= ($value['category']) ?></td>
                                            <td>
                                                <?= ($value['tmp_deviceID'])."
" ?>
                                            </td>
                                            <td>
                                                <?php if ($value['tmp_isAbnomalTemperature'] == 'true'): ?>
                                                    <span style="color:red"><?= ($value['tmp_temperature']) ?></span>
                                                    <?php else: ?><?= ($value['tmp_temperature']) ?>
                                                <?php endif; ?>

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
<!-- Custom Modal -->
<div id="image-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title" id="imgtitle"></h4>
    <div class="custom-modal-text" id="imgbody">
        <div class="row">
            <div class="col-12">
                <a class="thumbnail fancybox " rel="ligthbox">
                    <img id="image" src="" height="100px">
                </a>

            </div>

        </div>
    </div>
</div>

<script>

    function loadImage(imgData) {

        $("#image-modal").modal();
        var imageData = "data://text/plain;base64," + imgData;
        $("#image").prop("src", imageData);
    }

   $(document).ready(function(){

    $("#end_date").datepicker({
        format: "dd/mm/yyyy",
    });
    $("#start_date").datepicker({
        format: "dd/mm/yyyy",
    });
       $("#datatable-simple").DataTable({
           language:{
               paginate:{previous:"<i class='mdi mdi-chevron-left'>",
                next:"<i class='mdi mdi-chevron-right'>"}
            },
            drawCallback:function(){
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
        var a=$("#datatable-buttons").DataTable({
            lengthChange:!1,
            order: [[ 0, "desc" ]],
            buttons:[
                {extend:"print",className:"btn-light"},
                {extend:"csv",className:"btn-light"},
                {extend:"excel",className:"btn-light"},
                {extend:"pdf",className:"btn-light"}],
            language:{
                paginate:{
                    previous:"<i class='mdi mdi-chevron-left'>",
                    next:"<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback:function(){
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        });
        $("#selection-datatable").DataTable({
            select:{style:"multi"},language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}
            }),
        $("#key-datatable").DataTable({keys:!0,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}),
            a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),$("#alternative-page-datatable").DataTable({pagingType:"full_numbers",drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}),$("#scroll-vertical-datatable").DataTable({scrollY:"350px",scrollCollapse:!0,paging:!1,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}),$("#scroll-horizontal-datatable").DataTable({scrollX:!0,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}),$("#complex-header-datatable").DataTable({language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},columnDefs:[{visible:!1,targets:-1}]}),$("#row-callback-datatable").DataTable({language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},createdRow:function(a,e,t){15e4<+e[5].replace(/[\$,]/g,"")&&$("td",a).eq(5).addClass("text-danger")}}),$("#state-saving-datatable").DataTable({stateSave:!0,language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")}}),$(".dataTables_length select").addClass("form-select form-select-sm")});
    $(document).ready(function () {
        
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