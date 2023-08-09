<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <title>Unified-BI</title>

        <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="/assets/plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
        
        <link href="/assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />

        
        <!-- Plugins css-->
        <link href="/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="/assets/plugins/morris/morris.css">

        <script src="/assets/js/modernizr.min.js"></script>
        <script src="/assets/js/jquery.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="./" class="logo"><i class="mdi mdi-radar"></i> <span style="text-transform:none;">Unified-BI</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item notification-list hide-phone">
                            <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-crop-free noti-icon"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->        
            <style>
                .content-page {
                    margin: auto !important;
                    width: 70%;
                    background: #DDD;
                    color: #323b44;
                }
                .footer{
                    position: relative !important;
                    left: 0 !important;
                }
                .table td, .table th{
                    padding: 5px;
                }
            </style>
            <div class="content-page">
                <!-- Start content -->
                <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
                <!-- end content -->

                <footer class="footer">
                    2016 - 2018 © Unified-BI <span class="hide-phone">- unified-bi.co.za</span>
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->


        <script>
var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/detect.js"></script>
        <script src="/assets/js/fastclick.js"></script>
        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/jquery.blockUI.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/jquery.nicescroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>
        <script src="/assets/plugins/switchery/switchery.min.js"></script>

        <!-- Modal-Effect -->
        <script src="/assets/plugins/custombox/dist/custombox.min.js"></script>
        <script src="/assets/plugins/custombox/dist/legacy.min.js"></script>

        <!--Morris Chart-->
        <script src="/assets/plugins/morris/morris.min.js"></script>
        <script src="/assets/plugins/raphael/raphael-min.js"></script>
        <script src="/assets/pages/morris.init.js"></script>

        <!-- Counter Up  -->
        <script src="/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- circliful Chart -->
        <script src="/assets/plugins/jquery-circliful/js/jquery.circliful.min.js"></script>
        <script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        
        <script src="/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="/assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        
        <script src="/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/moment/moment.js"></script>
        <script src='/assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="/assets/pages/jquery.form-advanced.init.js"></script>

        <!-- skycons -->
        <script src="/assets/plugins/skyicons/skycons.min.js" type="text/javascript"></script>

        <!-- Page js  -->
        <script src="/assets/pages/jquery.dashboard.js"></script>

        <!-- Custom main Js -->
        <script src="/assets/js/jquery.core.js"></script>
        <script src="/assets/js/jquery.app.js"></script>


        


    </body>
</html>