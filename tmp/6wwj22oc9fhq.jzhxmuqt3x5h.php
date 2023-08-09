<div class="content">
    <div class="container-fluid">
        <!--div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Filter Data</label>
                        <div class="col-lg-8">
                            <div id="reportrange" class="pull-right form-control">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>June 6, 2018 - July 5, 2018</span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div-->
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($smile_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($smile_pec) ?>" data-fgcolor="#00b19d" data-bgcolor="#505A66"></div>
                    <h3 class="text-success  m-t-10"><i class="fa fa-smile-o"></i></h3>
                    <p class="text-muted text-nowrap m-b-10">Happy</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($neutral_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($neutral_pec) ?>" data-fgcolor="#3ddcf7" data-bgcolor="#505A66"></div>
                    <h3 class="text-info  m-t-10"><i class="fa fa-meh-o "></i></h3>
                    <p class="text-muted text-nowrap m-b-10">Neutral</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($otherexp_pec) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($otherexp_pec) ?>" data-fgcolor="#ef5350" data-bgcolor="#505A66"></div>
                    <h3 class="m-t-10 text-danger"><i class="fa fa-frown-o "></i></h3>
                    <p class="text-muted text-nowrap m-b-10">Sad</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="widget-simple-chart text-right card-box">
                    <div class="circliful-chart" data-dimension="90" data-text="<?= ($sys_acc) ?>%" data-width="5" data-fontsize="14" data-percent="<?= ($sys_acc) ?>" data-fgcolor="#98a6ad" data-bgcolor="#505A66"></div>
                    <h3 class="text-inverse  m-t-10"><?= ($sys_acc) ?>%</h3>
                    <p class="text-muted text-nowrap m-b-10">System Accuracy</p>
                </div>
            </div>
        </div>
        <!-- end row -->

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
            <!--div class="col-lg-6">
                <div class="portlet">
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
                            <div id="ethnicity" style="height: 300px;">
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
               
            </div-->

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
                            <div id="gender" style="height: 300px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Portlet -->
        </div>
        <!--end row/ WEATHER -->
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
