<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<div class="content">
    <div class="container-fluid">
        <header class="content__title">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <h1>User</h1>


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

        
        <!-- Form row -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> User Record</h4>
                        <!-- <p class="sub-header">
                            You may also swap <code>.row</code> for <code>.row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                        </p> -->

                        <form method="POST" action="/temperature/editTemperature/<?= ($POST['tmp_id']) ?>">
                            <div class="row">
                                <div class="col-12">
                                    <a class="thumbnail fancybox " rel="ligthbox" href='#'>
                                        <?php if (strpos($POST['tmp_imageData'], 'https')  > -1): ?>
                                            <img src="<?= ($POST['tmp_imageData']) ?>"
                                            height="100px">
                                            <?php else: ?>
                                                <img src="data://text/plain;base64,<?= ($POST['tmp_imageData']) ?>"
                                                height="100px">
                                            
                                        <?php endif; ?>
                                        
                                    </a>

                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="personName" class="form-label">Person Name</label>
                                    <input type="text" class="form-control" id="tmp_username"  name="tmp_username" placeholder="Person Name" value="<?= ($POST['tmp_username']) ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

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
            buttons:[
                {extend:"print",className:"btn-light"},
                {extend:"csv",className:"btn-light"},
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