<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>
<body>

<div id="container">

    <button id="mainLi" onclick="myFunc(this)">Dev</button>
    <button id="secondLi" onclick="myFunc(this)">Live</button>


    <h1>Welcome to CodeIgniter!</h1>

    <div id="body">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6" id="div_line_graph">
                    <div class="panel panel-default">
                        <div id="chartContainerRev" style="min-height: 470px;">
                            <div id="highchart_11" style="height: 450px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="div_bar_graph">
                        <div class="panel panel-default">

                            <div class="panel-body" style="border: none !important;">
                            <span class="pull-right">
                                <label>Report Type:</label>
                                <select name="perf_rep_type1" id="perf_rep_type1">
                                    <option value="1">Revenue</option>
                                    <option value="2">eCPM</option>
                                </select>
                            </span>
                            </div>
                            <div id="div_mediation_stats" style="min-height: 415px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong>
        seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"/>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="module" src="/test.js"></script>

<script src="highcharts/js/highcharts.js"></script>

<script type="text/javascript">

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"
        integrity="sha256-gJWdmuCRBovJMD9D/TVdo4TIK8u5Sti11764sZT1DhI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.4/jspdf.plugin.autotable.js"
        integrity="sha256-2R/rXqlBOnWwyQU2exkY0idF1T+UEyM6sEogxFUCKEk=" crossorigin="anonymous"></script>
<script>

    //ready
    $(function () {
        let str = "SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740,SB10502002105740, SB10502002105740";

        var partsOfStr = str.split(",").map(function (item) {
            return item.trim();
        });


        var doc = new jsPDF("p", "mm", "a4");

        doc.setFontSize(22);
        doc.addFont('ArialMS', 'Arial', 'bold');
        doc.setFont('Arial');

        doc.text('Payment Receipt', 80, 25);

        // This section is used to print Address

        doc.setFontSize(12);
       // doc.addFont('ArialMS', 'Arial', 'normal');
        doc.setFont('Arial');

        doc.text('ConsoliAds PTE LTD,', 10, 50,);




        var transactionRefs = str.split(",").map(function (item) {
            return item.trim() + "\n";
        });

        console.log(transactionRefs);

        var y = 76;

        transactionRefs.forEach(function (index, value) {
            doc.setFontSize(12);
            doc.addFont('Arial', 'normal');
            doc.setFont('Arial');
            doc.text(index, 160,y);
            y = y + 5;
        });
        let s = 'Payment for the month of November-2019 for UnityAds,November-2019 for Vungle,November-2019 for AdColony';
        let desc = s + s + s + s + s + s + s + s + s + s;

        doc.autoTable({
            startY: y + 20,
            columnStyles: {
                0: {
                    cellWidth: 140,
                    fontSize: 15
                },
                1: {
                    cellWidth: 40,
                    fontSize: 15
                }

            },
            headStyles: {fillColor: [168, 168, 168]},
            head: [['Description', '']],
            body: [
                [desc, (100 * 1).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' $']

            ]
        });
        window.open(URL.createObjectURL(doc.output("blob")));
        console.log(partsOfStr);
        //  [1, 2].forEach(alert);

        //showChart('#highchart_11');
        // showChart('#div_mediation_stats');

//        if (sessionStorage.getItem("tabID")) {
//            var func = window[sessionStorage.getItem("tabID")];
//            console.log(func);
//            func();
//        }


    });

    function showChart(chartID) {

        var requests = [0, 0, 0, 0, 0, 0, 0];
        var completed = [0, 0, 0, 0, 0, 0, 0];
        var available = [0, 0, 0, 0, 0, 0, 0];
        var impressions = [0, 0, 0, 0, 0, 0, 0];
        var date = ['2020-06-13', '2020-06-14', '2020-06-15', '2020-06-16', '2020-06-17', '2020-06-18', '2020-06-19'];

        var text = " ";
        var y = 0;
        if (requests == '' && impressions == '' && completed == '' && available == '') {
            text = "No Data Found";
            y = 200;
        }

        $(chartID).highcharts({

            chart: {
                style: {
                    fontFamily: "Open Sans"
                }


            },
            title: {
                text: text,
                x: -10,
                y: y
            },
            xAxis: {
                type: 'date',
                categories: date,
                labels: {

                    align: 'center'
                }

            },
            yAxis: {
                title: {
                    text: "Count"
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: "#808080"
                }]
            },
            tooltip: {
                valueSuffix: ""
            },
            legend: {
                layout: "horizontal",
                align: "center",
                verticalAlign: "bottom",
                borderWidth: 0
            },
            series: [{
                name: "Requests",
                data: requests
            }, {
                name: "Completed",
                data: completed
            }, {
                name: "Available",
                data: available
            }, {
                name: "Impressions",
                data: impressions
            }]

        });
    }

    //function li onclick
    function myFunc(el) {
        let tabID = $(el).attr('id');
        sessionStorage.setItem("tabID", tabID);
        window.location.href = "/";
    }

    function mainLi() {
        console.log("hello1");
    }

    function secondLi() {
        console.log("hello2");
    }

    function getDevModeValue(el) {
        let tabID = $(el).attr('id');
        sessionStorage.setItem("tabID", tabID);


    }


</script>
</body>
</html>