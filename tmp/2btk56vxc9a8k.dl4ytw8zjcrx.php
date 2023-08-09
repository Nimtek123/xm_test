<!-- Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row no-print">
        <div class="col-12">
            <a href="javascript:void(0)" class="btn btn-sm btn-success no-print" id="print-page"> 
                <i class="fa fa-print"></i> Download Pdf
            </a>
            <br>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card-box" style="background: #d1d1d1;">
                    <h4 class="m-t-0 header-title"><b>Full Month Report</b></h4>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div style="padding: 0px; border: solid thin #666666; background: #fff;">
                    <table border="0" style="width: 100%; background: #cccccc; color: #000; font-size: 20px;">
                        <tr>
                            <td style="padding: 10px;">Monthly Report For</td>
                            <td style="padding: 10px;" class="text-right">
                                <strong><?= ($filterDate) ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">Month To Date</td>
                            <td style="padding: 10px;" class="text-right">
                                <?= ($dispMTD)."
" ?>
                            </td>
                        </tr>   
                        <tr>
                            <td style="padding: 10px;">Previous Month Total (<?= ($lastmonth) ?>)</td>
                            <td style="padding: 10px;" class="text-right">
                                <?= ($dispMTDLast)."
" ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">Year To Date</td>
                            <td style="padding: 10px;" class="text-right">
                                <?= ($dispYTD)."
" ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px;">Average Number of People (<?= ($filterDate) ?>)</td>
                            <td style="padding: 10px;" class="text-right">
                                <?= (@$keyAverage)."
" ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">High Temperatures </td>
                            <td style="padding: 10px;" class="text-right">
                                <?= ($highTemperatures)."
" ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="p-10 text-center" style="height: 320px; overflow: hidden;">
                        <div id="chartMTD" style="width: 100%; height: 320px;" ></div>
                        <div class="clear"></div>
                    </div>  
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped" style="font-size: 16px; width: 100%;">
                    <tbody>
                        <tr>
                            <th><strong>Day of the month</strong></th>
                            <th><strong>IN</strong></th>
                        </tr>
                    <?php foreach (($days?:[]) as $ikey=>$value): ?>
                        <tr>
                            <td><?= ($this->raw($value['day'])) ?></td> 
                            <td><?= ($value['total']) ?></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- end container -->
</div>
<!-- end content -->

<!-- amCharts javascript sources -->
<script type="text/javascript" src="/amcharts/amcharts.js"></script>
<script type="text/javascript" src="/amcharts/serial.js"></script>

<script>
    // print printable div
    $("#print-page").click(function () {
        window.print();
    });
</script> 
<script type="text/javascript">
$(document).ready(function () {
createMTDChart("chartMTD");
/*createYTDChart("chartYTD");
 createYOYChart("chartYOY");
 createMTDEntranceChart("chartMTDEntrance");
 createWeekChart("chartWeek");*/
});
function createMTDChart(divId) {
AmCharts.makeChart(divId,
{
"type": "serial",
        "categoryField": "category",
        "colors": [
                "#000",
                "#000",
                "#000"
        ],
        "startDuration": 1,
        "backgroundColor": "#4A4A4A",
        "color": "#000",
        "categoryAxis": {
        "gridPosition": "start",
                "axisColor": "#000",
                "gridColor": "#000"
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
                "title": "Events",
                "type": "column",
                "color": "#000",
                "valueField": "column-1"
        },
        {
                        "fillAlphas": 1,
			"fillColors": "#F00",
                        "lineAlpha": 0.90,
			"lineColor": "#fafafa",
                        "balloonText": "[[title]] count for [[category]]:[[value]]",
                        "id": "AmGraph-2",
                        "labelText": "",
                        "title": "Alerts",
                        "type": "column",
                        "valueField": "column-2"
                    }
        ],
        "guides": [],
        "valueAxes": [
        {
        "id": "ValueAxis-1",
                "axisColor": "#000",
                "gridColor": "#000",
                "title": "Number of People",
                "titleColor": "#000"
        }
        ],
        "allLabels": [],
        "balloon": {},
        "legend": {
        "enabled": true,
                "backgroundColor": "#FAFAFA",
                "borderColor": "#000",
                "color": "#000",
                "useGraphSettings": true
        },
        "titles": [
        {
        "id": "Title-1",
                "size": 15,
                "text": "Traffic Flow Month to Date",
                "color": "#000"
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