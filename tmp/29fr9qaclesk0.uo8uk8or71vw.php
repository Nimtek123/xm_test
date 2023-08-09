<div class="content">
    <div class="container-fluid">
        <!--div class="row">
            <div class="col-sm-12">
                <form action="./pos" method="post" enctype="multipart/form-data">
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto">
                                                        <label>Start Date</label>
                <input type="text" class="form-control datepicker" id="start_date" name="start_date" value="2018-07-01" required="" autocomplete="off">
                                                    </div>
                                                    <div class="col-auto">
                                                        <label>End Date</label>
                <input type="text" class="form-control datepicker" id="end_date" name="end_date" value="2018-09-30" required="" autocomplete="off">
                                                    </div>
                                                    <div class="col-auto">
                                                         <label>Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label>Ethnicity</label>
                <select name="race" id="race" class="form-control">
                    <option value="">All</option>
                    <option value="black">African</option>
                    <option value="white">Caucasian</option>
                    <option value="other">Other</option>
                </select>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label>Age Group</label>
                <select name="age" id="age" class="form-control">
                    <option value="">All</option>
                    <option value="child">Children</option>
                    <option value="youth">Youth</option>
                    <option value="adult">Adult</option>
                    <option value="seniors">Seniors</option>
                </select>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label>Submit</label><br>
                                                        <button type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
            </div>

        </div-->
        <br>
    <div class="row" >
        <div class="col-sm-6">
            <div id="topvalue" style="width: 100%; height: 250px; background-color: rgba(0,0,0,0.35);" ></div>
        </div>
        <div class="col-sm-6">
            <div id="topvolume" style="width: 100%; height: 250px; background-color: rgba(0,0,0,0.35);" ></div>
        </div>
        
    </div>
        <!-- end row -->
    <br>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($child_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($child_pec) ?>" data-fgcolor="#3bafda" data-bgcolor="#505A66"></div>
                    <h3 class="text-primary m-t-10">Children</h3>
                    <p class="text-muted text-nowrap m-b-10">0 - 14</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($youth_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($youth_pec) ?>" data-fgcolor="#3bafda" data-bgcolor="#505A66"></div>
                    <h3 class="text-primary m-t-10">Youth</h3>
                    <p class="text-muted text-nowrap m-b-10">15 - 24</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($adult_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($adult_pec) ?>" data-fgcolor="#3bafda" data-bgcolor="#505A66"></div>
                    <h3 class="text-primary m-t-10">Adults</h3>
                    <p class="text-muted text-nowrap m-b-10">25 - 50</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($senior_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($senior_pec) ?>" data-fgcolor="#3bafda" data-bgcolor="#505A66"></div>
                    <h3 class="text-primary m-t-10">Seniors</h3>
                    <p class="text-muted text-nowrap m-b-10">50+</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="portlet">
                    <!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark"> Ethnicity Demographics </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="fa fa-refresh"></i></a>
                            <span class="divider"></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet5" class="panel-collapse collapse show">
                        <div class="portlet-body">
                            <div id="ethnicity" style="height: 150px;">
                            </div>

                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle m-r-5" style="color: #3bafda ;"></i>African</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle m-r-5" style="color: #ededed;"></i>Caucasian</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle m-r-5" style="color: #80deea ;"></i>Other</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Portlet -->
            </div>

            <div class="col-lg-6">
                <div class="portlet">
                    <!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark"> Gender Demographics</h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="fa fa-refresh"></i></a>
                            <span class="divider"></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="bg-default" class="panel-collapse collapse show">
                        <div class="portlet-body">
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle m-r-5" style="color: #3bafda;"></i>Male</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle m-r-5" style="color: #f76397;"></i>Female</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="gender" style="height: 150px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Portlet -->
        </div>
        <!--end row/ -->
        <div class="row">
            <div class="col-md-12">
                <!-- Start datatable -->
                        <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Point of sale Data</h4>
                                    
                                    <table id="datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort">Items Bought</th>
                                        <th data-class="expand" class="expand sorting_asc" tabindex="0" aria-controls="datatable-ajax">Qty</th>
                                        <!--th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable-ajax" rowspan="1" colspan="1">Date</th>
                                        <th data-hide="phone,tablet" class="text-center no-sort" rowspan="1" colspan="1">Action</th-->
                                    </tr>
                                </thead>

                                <?php foreach (($posresults?:[]) as $ikey=>$value): ?>
                                    <tr>
					                    <td><?= ($value['pd_item']) ?></td> 
                                        <td><?= ($value['pd_qty']) ?></td>
					                    <!--td><?= ($value['pd_date']) ?></td>
                                        <!--td>
                                           <a href="/frd/delete/<?= ($ikey) ?>" class="text-danger" title="Delete record"><i class="text-danger fa fa-trash"></i> Delete</a></td>
                                            
                                        </td-->
                                           
                                    </tr>
                                <?php endforeach; ?>
                                <script>
                                    function archive (adID) {
                                        var conf = confirm("Are you sure you want to remove this from your view list");
                                        if(!conf){
                                            return false;
                                        }
                                        else location.href  = "/adverts/archive/"+adID;
                                    }
                                    </script>
                            </table>
                            <!--/ End datatable -->
                        </div>
            </div>
        </div>
    </div>
</div>

<script>
    var MorrisCharts = function() {};
    MorrisCharts.prototype.createBarChart = function(element, data, xkey, ykeys, labels, lineColors) {
    Morris.Bar({
    element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#3d4853',
            barColors: lineColors
    });
    }
    //creates Donut chart
        MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                resize: true, //defaulted to true
                colors: colors,
                labelColor: '#fff'
            });
        }
    $(document).ready(function(){
    $('#sparklinegender').sparkline([<?= ($cau_pec) ?>, <?= ($afr_pec) ?>, <?= ($oth_pec) ?>], {
    type: 'pie',
            width: '200',
            height: '200',
            sliceColors: ['#dcdcdc', '#3bafda', '#333333']
    });
    MorrisCharts.prototype.init = function() {
    //creating bar chart
    var $barData = [
    <?= ($graphgender_data)."
" ?>
    ];
    this.createBarChart('gender', $barData, 'y', ['a', 'b'], ['Male', 'Female'], ["#3bafda", "#f76397"]);
    
    //creating donut chart
            var $donutData = [
                {label: "African %", value: <?= ($afr_pec) ?>},
                {label: "Caucasian %", value: <?= ($cau_pec) ?>},
                {label: "Other %", value: <?= ($oth_pec) ?>}
            ];
            this.createDonutChart('ethnicity', $donutData, ["#3bafda ", "#ededed ", "#80deea"]);
    }
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts;
    $.MorrisCharts.init();
    });
</script>


<script type="text/javascript" src="./amcharts/amcharts.js"></script>
<script type="text/javascript" src="./amcharts/serial.js"></script>
<script>
     AmCharts.makeChart("topvalue",
				{
					"type": "serial",
					"categoryField": "product",
					"startDuration": 1,
					"color": "#FFFFFF",
					"categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                  },
                  "export": {
                    "enabled": true
                  },
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[category]]:R [[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "Product",
							"lineColor":"#ff7f0e",
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
                        "title": "Total Value of Product"
                    }
                ],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true,
						"color":"#ffffff"
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Top 25 products by Value MTD"
						}
					],
					"dataProvider": [
						<?= ($this->raw($pd_amount))."
" ?>
                		
					]
				}
			);
  
    
    AmCharts.makeChart("topvolume",
				{
					"type": "serial",
					"categoryField": "product",
					"startDuration": 1,
					"color": "#FFFFFF",
					"categoryAxis": {
                    "gridPosition": "start",
                    "axisColor": "#FAFAFA",
                    "gridColor": "#FAFAFA"
                },
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                  },
                  "export": {
                    "enabled": true
                  },
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "Product",
							"lineColor":"#1da2cf",
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
                        "title": "Total Volume of Product"
                    }
                ],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true,
						"color":"#ffffff"
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Top 25 products by Volume MTD"
						}
					],
					"dataProvider": [
						<?= ($this->raw($pd_qty))."
" ?>
                		
					]
				}
			);
</script>
