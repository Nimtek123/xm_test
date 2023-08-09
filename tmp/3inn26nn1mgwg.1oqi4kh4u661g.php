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
                        <h4 class="header-title"> User Categories</h4>
                        <!-- <p class="sub-header">
                            You may also swap <code>.row</code> for <code>.row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                        </p> -->

                        <form method="POST" action="/usercat/update/<?= ($POST['id']) ?>">
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="personName" class="form-label">Person Name</label>
                                    <input type="text" class="form-control" id="personName"  name="personName" placeholder="Person Name" value="<?= ($POST['personName']) ?>">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="gender" class="form-label">Gender <small>(Male=1, Female=2)</small></label>
                                    <input type="number" class="form-control" id="gender" name="gender" placeholder="Gender" value="<?= ($POST['gender']) ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="<?= ($POST['category']) ?>">
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label for="userID" class="form-label">userID</label>
                                    <input type="number" class="form-control" id="userID" name="userID" placeholder="userID" value="<?= ($POST['userID']) ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="<?= ($POST['contact']) ?>">
                                </div>
                                <!-- <div class="mb-2 col-md-6">
                                    <label for="userID" class="form-label">userID</label>
                                    <input type="number" class="form-control" id="userID" name="userID" placeholder="userID" value="<?= ($POST['userID']) ?>">
                                </div> -->
                            </div>
                            <!-- <div class="mb-2">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div> -->
                            
                            <!-- <div class="row">
                                <div class="mb-2 col-md-4">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="inputState" class="form-select">
                                        <option>Choose</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>

                                    </select>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                
                                <div class="mb-2 col-md-4">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div> -->
                            <!-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="Check">
                                    <label class="form-check-label" for="Check">
                                        Check me out
                                    </label>
                                </div>
                            </div> -->
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