<div class="content">
    <div class="container-fluid">
            <header class="content__title"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <h1>Dashboard</h1>
        

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

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2><?= (count($faceResults)) ?></h2>
                    <small>Total Alerts</small>
                </div>

            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2><?= ($suspects) ?></h2>
                    <small>Suspect Alerts</small>
                </div>

            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2><?= ($confirmed) ?></h2>
                    <small>Confirmed Alerts</small>
                </div>

            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="quick-stats__item">
                <div class="quick-stats__info">
                    <h2><?= ($repeat) ?></h2>
                    <small>Repeat Visitors</small>
                </div>

            </div>
        </div>
    </div>
<div class="row">

            <div class="col-sm-12">
                <form action="./facialrec" method="post">
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
                    <h4 class="card-title">Face Detect Alerts</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">

                       <table id="datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead class="thead-default">

                                <tr> 
                                    <th class="text-strong" >Images</td>
                                    <th class="text-strong" >Alert Type</th>
                                    <th class="text-strong" >Source Camera</th>
                                    <th class="text-strong" >Date</th>
                                    <th class="text-strong" >Confirmed</th>
                                    <!--th class="text-strong" >Confidence</th-->
                                   

                                </tr>
                            </thead>
                            <tbody >


                            

                                <?php foreach (($faceResults?:[]) as $skey=>$value): ?>

                                    <tr>
                                        <td style="width:30%">
                                            <div class="row">
                                            <div class="col-6" style="border:1px solid red">Live Capture<img src="https://<?= ($SESSION['HOST']) ?>/.platform/raw_data/<?= ($SESSION['folder']) ?>/facial_recognition/<?= ($value['alt_img']) ?>" width="100%"></div>
                                            <?php if ($value['alt_type'] == 's'  || $value['alt_type'] == 'v'): ?>
                                                <div class="col-6" style="border:1px solid blue">Saved Capture<img src="https://<?= ($SESSION['HOST']) ?>/.platform/raw_data/<?= ($SESSION['folder']) ?>/facial_recognition/faces/<?= ($value['alt_matched']) ?>.jpg" width="100%"></div>

                                                <?php else: ?>
                                                    <div class="col-6" style="border:1px solid blue">Saved Capture<img src="https://<?= ($SESSION['HOST']) ?>/.platform/raw_data/<?= ($SESSION['folder']) ?>/facial_recognition/repeat_faces/<?= ($value['alt_matched']) ?>.jpg" width="100%"></div>
                                                
                                    <?php endif; ?>
                                            
                                        </div> 
                                        </td>
                                        <td>

                                    <?php if ($value['alt_type'] == 's'): ?>
                                        <span class="fa fa-times text-danger"></span> &nbsp; 
                                        <span style="color:red;">Suspect</span>

                                        
                                    <?php endif; ?>
                                    <?php if ($value['alt_type'] == 'r'): ?>
                                        <span class="fa fa-times text-danger"></span> &nbsp; 
                                        <span style="color:red;">Repeat Visitor</span>

                                        
                                    <?php endif; ?>
                                    <?php if ($value['alt_type'] == 'v'): ?>
                                        <span class="fa fa-times text-danger"></span> &nbsp; 
                                        <span style="color:red;">VIP</span>

                                        
                                    <?php endif; ?>

                                    </td>
                                        <td>
                                            <?= ($value['alt_camera'])."
" ?>
                                        </td>
                                        <td>
                                            <?= ($value['alt_date'])."
" ?>
                                        </td>
                                         <td>

                                    <?php if ($value['alt_confirmed'] == 'n'): ?>
                                        <span class="fa fa-times text-danger"></span> &nbsp; 
                                        <span style="color:red;">Not yet Confirmed</span>

                                        <?php else: ?>
                                        <span class="fa fa-check text-success"></span> &nbsp; 
                                        <span class="text-success">Confirmed</span>

                                        
                                    <?php endif; ?>

                                    </td>
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


