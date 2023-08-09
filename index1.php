<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Include jQuery and jQuery UI libraries -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <!-- Include jQuery, jQuery UI, Chosen, and Bootstrap libraries -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $("#div1").fadeIn();
                $("#div2").fadeIn("slow");
                $("#div3").fadeIn(3000);
            });
        });
    </script>
</head>

<body>

    <h4>PHP Exercise - v21.0.5</h4>
    <form id="stockForm" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="symbol" class="form-label">Company Symbol</label>
            <select class="form-select" id="symbol" name="symbol" required></select>
            <div class="invalid-feedback">Please select a Company Symbol.</div>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startDate" name="startDate" required>
            <div class="invalid-feedback">Please enter a valid Start Date.</div>
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="endDate" name="endDate" required>
            <div class="invalid-feedback">Please enter a valid End Date.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <button type="submit" class="btn btn-primary">Get Historical Data</button>
    </form>

    <!-- Modal and script imports remain unchanged -->


    <!-- Modal -->
    <div class="modal fade modal-lg" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Historical Quotes</h4>
                </div>
                <div class="modal-body">
                    <!-- Loading spinner -->
                    <div id="loadingSpinner" class="d-none text-center">
                        <div class="spinner-border" role="status">
                        </div>
                        <span class="sr-only">Loading...</span>

                    </div>

                    <table class="table table-striped table-bordered" id="dataTable">
                        <tr><th>Date</th><th>Open</th><th>High</th><th>Low</th><th>Close</th><th>Volume</th></tr>
                        <!-- Table content will be dynamically added here -->
                    </table>
                    <br />
                    <div id="chartContainer" style="height: 300px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="sendMail()">Send Mail</button>
                    <button type="button" class="btn btn-primary" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        function closeModal(){
            $("#myModal").modal("hide"); // Open modal first
        }

        let symbol = "";
        let startDate = "";
        let endDate = "";
        let email = "";
        let region = "US";
        var chart = {};
        let companyName = "";

        // Fetch data and populate DataTable
        const table = $("#dataTable").DataTable({
                columns: [
                    { data: "date" },
                    { data: "open" },
                    { data: "high" },
                    { data: "low" },
                    { data: "close" },
                    { data: "volume" }
                ]
        });

        function validEmail(fieldID, require) {
            if (typeof require !== 'boolean') require = true;
            var email_pattern = /^[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/i;
            var field = $.trim($("#" + fieldID).val());
            var atpos = field.indexOf("@");
            var dot1pos = field.indexOf(".", atpos);
            var dot2pos = field.lastIndexOf(".");
            if ((field.length > 0 || require) && (!field.match(email_pattern) || atpos < 1 || dot1pos - atpos < 3 || field.length - dot2pos < 3)) {
            return false;
            }
            else {
            return true;
            }
        }

        $(document).ready(function() {
            // Initialize Chosen for Company Symbol dropdown

            $("#stockForm").submit(function(event) {
                event.preventDefault();
                // Show loading spinner
                $("#loadingSpinner").removeClass("d-none");
                 symbol = $("#symbol").val();
                 var symbArr = symbol.split("_");
                 symbol = symbArr[0];
                 companyName = symbArr[1];

                 startDate = $("#startDate").val();
                 endDate = $("#endDate").val();
                 email = $("#email").val();
                 //region = "US";

                 // Fetch data and populate DataTable


                if (!symbol || !startDate || !endDate || !email) {
                    alert("All fields are required.");
                    return;
                }

                if(!validEmail("email")){
                    alert("Please enter valid Email.");
                    return;
                }

                if (new Date(startDate) > new Date(endDate)) {
                    alert("Start Date must be less than or equal to End Date.");
                    return;
                }
                $("#myModal").modal("show"); // Open modal first

                $.ajax({
                    url: `https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data?symbol=${symbol}`,
                    headers: {
                        "X-RapidAPI-Key": "8b442414femsh7f8b58204295d77p1ed1bfjsn7d3299436417",
                        "X-RapidAPI-Host": "yh-finance.p.rapidapi.com"
                    },
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        if(data.prices.length > 0){
                            displayModal(data, symbol, startDate, endDate, email);
                        }
                        else{
                            alert("There are no records for the submitted data");
                        }
                    },
                    error: function(error) {
                        console.error("Error fetching data:", error);
                    }
                });
            });
        });

        function displayModal(data, symbol, startDate, endDate, email) {
            // Display data in table
            const startUnixTimestamp = Math.floor(new Date(startDate).getTime() / 1000);
            const endUnixTimestamp = Math.floor(new Date(endDate).getTime() / 1000);

            let hasRecords = false;

            // Hide loading spinner after processing
            $("#loadingSpinner").addClass("d-none");

            const formattedData = data.prices.map(item => {
                return {
                date: item.date,
                open: parseFloat(item.open).toFixed(6),
                high: parseFloat(item.high).toFixed(6),
                low: parseFloat(item.low).toFixed(6),
                close: parseFloat(item.close).toFixed(6),
                volume: item.volume
                };
            });

            // Clear existing table data, add formatted data, and draw the table
            table.clear().rows.add(formattedData).draw();

            let tableContent = "<tr><th>Date</th><th>Open</th><th>High</th><th>Low</th><th>Close</th><th>Volume</th></tr>";
            data.prices.forEach(function(item) {
                if(item.date > startUnixTimestamp && startUnixTimestamp < endUnixTimestamp){
                     // Convert Unix timestamp to date in "YYYY-mm-dd" format
                    let convertedStartDate = new Date(item.date * 1000).toISOString().slice(0, 10);
                    hasRecords = true;
                    tableContent += `<tr><td>${convertedStartDate}</td><td>${item.open.toFixed(6)}</td><td>${item.high.toFixed(6)}</td><td>${item.low.toFixed(6)}</td><td>${item.close.toFixed(6)}</td><td>${item.volume.toFixed(6)}</td></tr>`;
                }
                
            });

            if(!hasRecords) {
                alert("No records found within the selected dates")
            }
            else{
                //$("#dataTable").html(tableContent);

                // Display chart
                const chartDataOpen = data.prices.map(function(item) {
                    return {
                        x: new Date(new Date(item.date * 1000).getFullYear(), new Date(item.date * 1000).getMonth(),new Date(item.date * 1000).getDate()),
                        y: item.open
                    };
                });
                const chartDataClose = data.prices.map(function(item) {
                    return {
                        x: new Date(new Date(item.date * 1000).getFullYear(), new Date(item.date * 1000).getMonth(),new Date(item.date * 1000).getDate()),
                        y: item.close
                    };
                });

                console.log(chartDataClose[0])
                // const chart = new CanvasJS.Chart("chartContainer", {
                //     title: {
                //         text: "Open and Close Prices"
                //     },
                //     data: [{
                //         type: "candlestick",
                //         dataPoints: chartData
                //     }]
                // });
                // chart.render();
                chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    title:{
                        text: "Open and Close Prices"
                    },
                    axisX:{
                        valueFormatString: "YYYY MMM DD",
                        crosshair: {
                            enabled: true,
                            snapToDataPoint: true
                        }
                    },
                    axisY: {
                        title: "Historical Data",
                        includeZero: true,
                        crosshair: {
                            enabled: true
                        }
                    },
                    toolTip:{
                        shared:true
                    },  
                    legend:{
                        cursor:"pointer",
                        verticalAlign: "bottom",
                        horizontalAlign: "left",
                        dockInsidePlotArea: true,
                        itemclick: toogleDataSeries
                    },
                    data: [{
                        type: "line",
                        showInLegend: true,
                        name: "Open Price",
                        markerType: "square",
                        xValueFormatString: "DD MMM, YYYY",
                        color: "#F08080",
                        dataPoints: chartDataOpen
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Close Price",
                        lineDashType: "dash",
                        dataPoints: chartDataClose
                    }]
                });
                chart.render();

            }

            // // Show modal
            // $("#myModal").modal("show");
            
                
        }

        function toogleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else{
                e.dataSeries.visible = true;
            }
            chart.render();
        }

        function sendMail(){
            // Send email
            const subject = `${companyName}`;
            const body = `From ${startDate} to ${endDate}`;
            const emailUrl = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
            window.location.href = emailUrl;
        }


        $(document).ready(function() {
            // Initialize Datepickers
            $("#startDate").datepicker({
                dateFormat: "yy-mm-dd",
                maxDate: 0, // Restrict to current date and before
                onSelect: function(selectedDate) {
                    $("#endDate").datepicker("option", "minDate", selectedDate);
                }
            });

            $("#endDate").datepicker({
                dateFormat: "yy-mm-dd",
                maxDate: 0, // Restrict to current date and before
                onSelect: function(selectedDate) {
                    $("#startDate").datepicker("option", "maxDate", selectedDate);
                }
            });


            // Fetch and populate Company Symbol dropdown
            $.getJSON("https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json", function(data) {
                const symbolDropdown = $("#symbol");
                data.forEach(function(item) {
                    let comp = item["Company Name"];
                    symbolDropdown.append(new Option(item.Symbol, item.Symbol+"_"+comp));
                });
                $("#symbol").chosen();

            });
        });

        // Rest of the code remains unchanged...
    </script>
</body>

</html>