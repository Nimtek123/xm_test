<!-- Content -->
<div class="content">
    <div class="container-fluid">
        <!--div class="row">

            <div class="col-sm-12">
                <form action="./index" method="post">
            <div class="row">
                <div class="col-sm-3">
                    <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                        <tr>
                            <td>
                                <select id="year" name="year" class="form-control" style="display: inherit;" required>
                                    <?php foreach (($years?:[]) as $key=>$year): ?>
                                        <option value="<?= ($year) ?>" <?php if ($year == $POST['year']): ?>selected="selected"<?php endif; ?>><?= ($year) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3">
                    <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                        <tr>
                            <td>
                                <select id="month" name="month" class="form-control" style="display: inherit;" onchange="get_days(this.id)" required>
                                    <option value="">--Select Month--</option>
                                    <?php foreach (($months?:[]) as $key=>$month): ?>
                                        <option value="<?= ($key) ?>" <?php if ($key == $POST['month']): ?>selected="selected"<?php endif; ?>><?= ($month) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            
                <div class="col-sm-3">
                    <table style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                        <tr>
                            <td>
                                <button type="button" name="submit" class="btn btn-block" onclick="loadData()">Filter</button>
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </form>
            </div>

        </div-->
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-success  m-t-10" id="dispOccupancy"></h3>
                    <p class="text-muted text-nowrap m-b-10">Live Traffic</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-primary  m-t-10" id="dispEntrance"></h3>
                    <p class="text-muted text-nowrap m-b-10">Total Today</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-pink m-t-10" id="dispMTD"></h3>
                    <p class="text-muted text-nowrap m-b-10">Traffic This Month</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-danger  m-t-10" id="dispYTD"></h3>
                    <p class="text-muted text-nowrap m-b-10">Traffic This Year</p>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-success m-t-10" id="dispOccupancyYesterday"></h3>
                    <p class="text-muted text-nowrap m-b-10">Traffic Yesterday</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-primary  m-t-10" id="dispEntranceYesterday"></h3>
                    <p class="text-muted text-nowrap m-b-10">Total Yesterday</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-pink m-t-10" id="dispMTDLast"></h3>
                    <p class="text-muted text-nowrap m-b-10">Traffic Last Month</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-danger m-t-10" id="dispYTDLast"></h3>
                    <p class="text-muted text-nowrap m-b-10">Traffic Last Year</p>
                </div>
            </div>
        </div>
        <!-- end row -->
        
         
         <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-success m-t-10" id="dispDwellTime"></h3>
                    <p class="text-muted text-nowrap m-b-10">Dwell Time</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-primary  m-t-10" id="dispAccuracy"></h3>
                    <p class="text-muted text-nowrap m-b-10">Accuracy</p>
                </div>
            </div>

           <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-pink m-t-10" id="dispHookRate">pending...</h3>
                    <p class="text-muted text-nowrap m-b-10">Hook Rate</p>
                </div>
            </div>

            <!--div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-center card-box">
                    <h3 class="text-danger m-t-10" id="dispYTDLast"></h3>
                    <p class="text-muted text-nowrap m-b-10">Traffic Last Year</p>
                </div>
            </div-->
        </div>
        <!-- end row -->

        <!--div class="block-area">
            <div id="chartsZone" style="padding: 10px;"></div>
        </div-->
        <div class="row">

            <div class="col-md-6">
                <div class="tile">
                    <div class="p-10 text-center" style="height: 320px; overflow: hidden;">
                        <div id="chartToday" style="width: 100%; height: 320px;" ></div>
                        <div class="clear"></div>
                    </div>  
                </div>
            </div>

            <div class="col-md-6">
                <div class="tile">
                    <div class="p-10 text-center" style="height: 320px; overflow: hidden;">
                        <div id="chartMTD" style="width: 100%; height: 320px;" ></div>
                        <div class="clear"></div>
                    </div>  
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="tile">
                    <div class="p-10 text-center" style="height: 320px; overflow: hidden;">
                        <div id="chartWeek" style="width: 100%; height: 320px;" ></div>
                        <div class="clear"></div>
                    </div>  
                </div>
            </div>
        </div>
        <!--end row/ WEATHER -->


    </div>
    <!-- end container -->
</div>
<!-- end content -->



<script>

    function refreshDashboard() {
        var noPeople = 0;
        var noTrans = 0;
        var conrate = 0;
        var date = new Date();
        var d = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        $.get("./get_display_top/4/" + year + "/" + month, function (data, status) {
            data = JSON.parse(data);
            $("#dispOccupancy").html(data.dispOccupancy);
            $("#dispEntrance").html(data.dispEntrance);
            $("#dispCapacity").html(data.dispCapacity);
            $("#dispMTD").html(data.dispMTD);
            $("#dispYTD").html(data.dispYTD);
            $("#dispDwellTime").html(data.dispDwellTime);

            $("#dispOccupancyYesterday").html(data.dispOccupancyYesterday);
            $("#dispEntranceYesterday").html(data.dispEntranceYesterday);
            $("#dispCapacityMax").html(data.dispCapacityMax);
            $("#dispMTDLast").html(data.dispMTDLast);
            $("#dispYTDLast").html(data.dispYTDLast);
            $("#dispAccuracy").html(data.dispAccuracy);

            $("#dispOccupancyVariance").html(data.dispOccupancyVariance);
            $("#dispEntranceVariance").html(data.dispEntranceVariance);
            $("#dispCapacityTotal").html(data.dispCapacityTotal);
            $("#dispMTDVariance").html(data.dispMTDVariance);
            $("#dispYTDVariance").html(data.dispYTDVariance);
            $("#dispAverage").html(data.dispAverage);

        });
    }


    $(document).ready(function () {
        refreshDashboard();

        window.setInterval(function () {
            refreshDashboard();
        }, 1000 * 60 * 30);


    });


    $('#month, #year').on('change', function () {
        refreshDashboard();
    });

    //For Charts
    function fetchChartDisplay(filterSection, filterYear, filterMonth) {
        $('#chartsZone').html(loadingAnimation2());
        $.get("/people_counting/dashboard/get_display_charts/" + 4 + "/" + year + "/" + month + "",
                {
                    api_key: "1588dsd34djnudn89scd9833mk2"
                },
                function (data, status) {
                    if (status == 'success') {
                        $('#chartsZone').html(data);
                    } else {
                        $('#chartsZone').html('<img src="./img/sad-face.png" style="height: 20px; width: auto;"> <span style="font-size: 16px;">Error</span>');
                    }
                }).fail(function () {
            $('#chartsZone').html('<div style="text-align: center; padding-top: 50px; display:inline-block; width: 100%;"><img src="./img/sad-face.png" style="height: 40px; width: auto; margin-top: -20px"> <span style="font-size: 40px;">Failed</span></div>');
        });
    }

    function loadingAnimation2() {
        return '<div style="text-align: center; padding-top: 50px; display:inline-block; width: 100%;"><img src="./img/loading_animation.gif" style="height: 40px; width: auto;  margin-top: -20px"> <span style="font-size: 40px;">Loading graphs...</span></div>';
    }

</script>
<!-- amCharts javascript sources -->
<script type="text/javascript" src="./amcharts/amcharts.js"></script>
<script type="text/javascript" src="./amcharts/serial.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#chartsZone').html(loadingAnimation2());
        createLiveChart("chartToday");
        createMTDChart("chartMTD");
        /*createYTDChart("chartYTD");
        createYOYChart("chartYOY");
        createMTDEntranceChart("chartMTDEntrance");*/
        createWeekChart("chartWeek");
    });
 
    function createLiveChart(divId) {
        AmCharts.makeChart(divId,
            {
                "type": "serial",
                "categoryField": "category",
                "colors": [
                    "#809fff",
                    "#b3b3b3",
                    "#b3ff66"
                ],
                "startDuration": 1,
                "backgroundColor": "#4A4A4A",
                "color": "#FAFAFA",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
			"fillColors": "#809fff",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "[[title]] count for [[category]]:[[value]]",
                        "id": "AmGraph-1",
                        "labelText": "",
                        "title": "IN",
                        "type": "column",
                        "valueField": "column-1"
                    },
                    {
                        "fillAlphas": 1,
			"fillColors": "#b3b3b3",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "[[title]] count for [[category]]:[[value]]",
                        "id": "AmGraph-2",
                        "labelText": "",
                        "lineThickness": 2,
                        "title": "OUT",
                        "type": "column",
                        "valueField": "column-2"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "axisColor": "#FAFAFA",
                        "gridColor": "#FAFAFA",
                        "title": "Number of People"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "backgroundColor": "#FAFAFA",
                    "borderColor": "#FAFAFA",
                    "color": "#FAFAFA",
                    "useGraphSettings": true,
                    "valueWidth": 10
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Traffic Flow Today"
                    }
                ],
                "dataProvider": [<?= ($this->raw($countingToday)) ?>]
            }
        );
    }
    
    function createMTDChart(divId) {
        AmCharts.makeChart(divId,
            {
                "type": "serial",
                "categoryField": "category",
                "colors": [
                    "#809fff",
                    "#b3b3b3",
                    "#b3ff66"
                ],
                "startDuration": 1,
                "backgroundColor": "#4A4A4A",
                "color": "#FAFAFA",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
			"fillColors": "#00ADD9",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "people count for day [[category]] is [[value]]",
                        "id": "AmGraph-1",
                        "labelText": "",
                        "title": "Days of the Month",
                        "type": "column",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "axisColor": "#FAFAFA",
                        "gridColor": "#FAFAFA",
                        "title": "Number of People"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "backgroundColor": "#FAFAFA",
                    "borderColor": "#FAFAFA",
                    "color": "#FAFAFA",
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Traffic Flow Month to Date"
                    }
                ],
                "dataProvider": [<?= ($this->raw($countingMTD)) ?>]
            }
        );
    }
    
    function createYTDChart(divId, organisedData) {
        AmCharts.makeChart(divId,
            {
                "type": "serial",
                "categoryField": "category",
                "colors": [
                    "#809fff",
                    "#b3b3b3",
                    "#b3ff66"
                ],
                "startDuration": 1,
                "backgroundColor": "#4A4A4A",
                "color": "#FAFAFA",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
			"fillColors": "#809fff",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "people count for [[category]] is [[value]]",
                        "id": "AmGraph-1",
                        "labelText": "",
                        "title": "Months of the year",
                        "type": "column",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "axisColor": "#FAFAFA",
                        "gridColor": "#FAFAFA",
                        "title": "Number of People"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "backgroundColor": "#FAFAFA",
                    "borderColor": "#FAFAFA",
                    "color": "#FAFAFA",
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Traffic Flow Year to Date"
                    }
                ],
                "dataProvider":  [<?= ($this->raw($countingYTD)) ?>]
            }
        );
    }
    
    function createYOYChart(divId, organisedData) {
        AmCharts.makeChart(divId,
            {
                "type": "serial",
                "categoryField": "category",
                "colors": [
                    "#809fff",
                    "#b3b3b3",
                    "#b3ff66"
                ],
                "startDuration": 1,
                "backgroundColor": "#4A4A4A",
                "color": "#FAFAFA",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
			"fillColors": "#809fff",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "people count [[category]] is [[value]]",
                        "id": "AmGraph-1",
                        "labelText": "",
                        "title": "Year",
                        "type": "column",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "axisColor": "#FAFAFA",
                        "gridColor": "#FAFAFA",
                        "title": "Number of People"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "backgroundColor": "#FAFAFA",
                    "borderColor": "#FAFAFA",
                    "color": "#FAFAFA",
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Traffic Flow Year on Year"
                    }
                ],
                "dataProvider":  [<?= ($this->raw($countingYOY)) ?>]
            }
        );
    }
    
    function createWeekChart(divId, organisedData) {
        AmCharts.makeChart(divId,
            {
                "type": "serial",
                "categoryField": "category",
                "colors": [
                    "#809fff",
                    "#b3b3b3",
                    "#b3ff66"
                ],
                "startDuration": 1,
                "backgroundColor": "#4A4A4A",
                "color": "#FAFAFA",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
			"fillColors": "#809fff",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
			"lineThickness": 1,
                        "balloonText": "people count for week [[category]] is [[value]]",
                        "id": "AmGraph-1",
                        "labelText": "",
                        "title": "Week number",
                        "type": "column",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "axisColor": "#FAFAFA",
                        "gridColor": "#FAFAFA",
                        "title": "Number of People"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "backgroundColor": "#FAFAFA",
                    "borderColor": "#FAFAFA",
                    "color": "#FAFAFA",
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Traffic Flow Per Week"
                    }
                ],
                "dataProvider": [<?= ($this->raw($countingWeek)) ?>]
            }
        );
    }
    /*
    function createMTDEntranceChart(divId, organisedData) {
        AmCharts.makeChart(divId,
            {
                "type": "serial",
                "categoryField": "category",
                "colors": [
                    "#809fff",
                    "#b3b3b3",
                    "#b3ff66"
                ],
                "startDuration": 1,
                "backgroundColor": "#4A4A4A",
                "color": "#FAFAFA",
                "categoryAxis": {
                    "autoRotateAngle": 90,
                    "autoRotateCount": 5,
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
			"fillColors": "#809fff",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "people count for entrance [[category]] is [[value]]",
                        "id": "AmGraph-1",
                        "labelText": "",
                        "title": "Entrance",
                        "type": "column",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "axisColor": "#FAFAFA",
                        "gridColor": "#FAFAFA",
                        "title": "Number of People"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "backgroundColor": "#FAFAFA",
                    "borderColor": "#FAFAFA",
                    "color": "#FAFAFA",
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Traffic Flow Month to Date by Entrance"
                    }
                ],
                "dataProvider": [<?= ($this->raw($countingMTDEntrance)) ?>]
            }
        );
    }*/
</script>