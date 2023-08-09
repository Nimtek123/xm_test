<!-- Content -->
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-6">
            <!-- Calendar -->
            <div class="card-box">
                <div id="calendar"></div>
            </div>

        </div>
        
            <div class="col-md-6">
                <div class="card-box">
                    <form onsubmit="generateFullReport(); return false;">
                    <h4 class="m-t-0 header-title"><b>Report</b></h4>
            
                <div class="form-group row">
                        <select id="year" name="year" class="form-control" style="display: inherit;" required>
                            <?php foreach (($years?:[]) as $key=>$year): ?>
                                <option value="<?= ($year) ?>" <?php if ($year == $POST['year']): ?>selected="selected"<?php endif; ?>><?= ($year) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <select id="month" name="month" class="form-control" style="display: inherit;" required>
                            <option value="">--Select Month--</option>
                            <?php foreach (($months?:[]) as $key=>$month): ?>
                                <option value="<?= ($key) ?>" <?php if ($key == $POST['month']): ?>selected="selected"<?php endif; ?>><?= ($month) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <select id="searchType" name="searchType" class="form-control" style="display: inherit;" required>
                            <option value="">--Select Search Type--</option>
                            <option value="all">All Records</option>
                            <option value="name" disabled>Person's Name</option>
                            <option value="name" disabled>Device Name</option>
                            <option value="name" disabled>Temperature</option>
                            <option value="name" disabled>Time</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <input type="text" readonly placeholder="Inactive" name="searchValue" class="form-control">
                    </div>
                   
                    <div class="form-group row text-center">
                        <button type="submit" class="btn btn-primary btn-custom waves-effect w-md waves-light m-b-5">Download Report</button>
                    </div>
                    </form>
            </div>
        </div>

    </div>
        <!-- end row -->


    </div>
    <!-- end container -->
</div>
<!-- end content -->

<script src="assets/plugins/moment/moment.js"></script>
        <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>

<script type="text/javascript">
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };
    
    !function($) {
    /* Initializing */
    CalendarApp.prototype.init = function() {
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
        //alert(today);

        var defaultEvents =  [<?= ($countingMTD) ?>];

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,   
            height: $(window).height() - 200,   
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            events: defaultEvents,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); },

        });

    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
    
        
    function generateFullReport() {
        //alert('Reports are not ready for download');
        var month = $('#month').val();
        var year = $('#year').val();
        var url = "./temperatureReports/monthly/"+year+"/"+month;
        var win = window.open(url, '_blank');
        win.focus();
       // window.location.href = 
    }
        
</script>