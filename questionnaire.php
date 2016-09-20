<?php
   ob_start();
   session_start();
   
   ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    <script src="boost/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="raphael-2.1.4.min.js"></script>
    <script type="text/javascript" src="bootstrap\js\modal.js" ></script>
        <script src="justgage.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style type="text/css">
        .table > tbody > tr > td {
            background-color: #F6F6F6;
        }
         .table caption input {
            float: right;
        }
        .table caption button {
            float: right;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Safe-Meter</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="suggest.php">  Drink Limit  </a>
                    </li>
                    <li>
                        <a href="about.php"> About  </a>
                    </li>
                    <li>
                        <a href="home.php">  Profile  </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span> Sign Up
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form name="drink_input" method="Get" action="suggest.php" id='form1'>
                <div class="col-md-12" style="background-color:#F6F6F6;">
                    <div class="table-responsive clearfix" style="background-color:#F6F6F6;">
                        <table class=" table">
                        <caption>
                            <h2>Hazardous drinking test</h2>
                            <p>
                                Based on World Health Organisation's Alcohol Use Disorders Identification Test
                                <input type='button' onclick='CalculateRisk(); $("#myModal").modal() ;' value='Calculate' class="btn btn-success btn-sm" />
                            </p>
                        </caption>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-md-6" style="background-color:#F6F6F6;">
                                        <div class="table-responsive clearfix">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>How often do you consume alcohol?</p>
                                                                <div class="col-md-7">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="freq">
                                                                            <option value="0">Never</option>
                                                                            <option value="1">Monthly or Less</option>
                                                                            <option value="2">2 to 4 times a month</option>
                                                                            <option value="3">2 to 3 times a week</option>
                                                                            <option value="4">4 or more times a week</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>How often do you have six or more drinks on one occasion?</p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="sixdrink">
                                                                                <option value="0">Never</option>
                                                                                <option value="1">Monthly or Less</option>
                                                                                <option value="2">2 to 4 times a month</option>
                                                                                <option value="3">2 to 3 times a week</option>
                                                                                <option value="4">4 or more times a week</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>
                                                                    How often during the last year have you found that
                                                                    <br>you were not able to stop drinking once you had started?
                                                                </p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="stopdrink">
                                                                                <option value="0">Never</option>
                                                                                <option value="1">Monthly or Less</option>
                                                                                <option value="2">2 to 4 times a month</option>
                                                                                <option value="3">2 to 3 times a week</option>
                                                                                <option value="4">4 or more times a week</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>
                                                                How often during the last year have you needed a first drink in the morning to get yourself going after a heavy drinking session?
                                                                </p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="morning">
                                                                                <option value="0">Never</option>
                                                                                <option value="1">Monthly or Less</option>
                                                                                <option value="2">2 to 4 times a month</option>
                                                                                <option value="3">2 to 3 times a week</option>
                                                                                <option value="4">4 or more times a week</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>
                                                                    How often during the last year have you been unable to remember
                                                                    <br> what happened the night before because you had been drinking?
                                                                </p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="remember">
                                                                                <option value="0">Never</option>
                                                                                <option value="1">Monthly or Less</option>
                                                                                <option value="2">2 to 4 times a month</option>
                                                                                <option value="3">2 to 3 times a week</option>
                                                                                <option value="4">4 or more times a week</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="background-color:#F6F6F6;">
                                        <div class="table-responsive clearfix">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>How many drinks do you have on a typical day when you are drinking?</p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="drinkcnt">
                                                                                <option value="0">1 or 2</option>
                                                                                <option value="1">3 or 4</option>
                                                                                <option value="2">5 or 6</option>
                                                                                <option value="3">7, 8 or 9</option>
                                                                                <option value="4">10 or more</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>Have you or someone else been injured as a result of your drinking?</p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="injured">
                                                                                <option value="0">No</option>
                                                                                <option value="2">Yes, but not in the last year</option>
                                                                                <option value="4">Yes, during the last year</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>
                                                                    How often during the last year have you failed to do
                                                                    <br>what was normally expected from you because of drinking?
                                                                </p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="failure">
                                                                                <option value="0">Never</option>
                                                                                <option value="1">Monthly or Less</option>
                                                                                <option value="2">2 to 4 times a month</option>
                                                                                <option value="3">2 to 3 times a week</option>
                                                                                <option value="4">4 or more times a week</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>How often during the last year have you had a feeling of guilt or remorse after drinking?</p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="guilt">
                                                                                <option value="0">Never</option>
                                                                                <option value="1">Monthly or Less</option>
                                                                                <option value="2">2 to 4 times a month</option>
                                                                                <option value="3">2 to 3 times a week</option>
                                                                                <option value="4">4 or more times a week</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="col-xs-12">
                                                                <p>
                                                                    Has a relative or friend or a doctor or another health worker been concerned about your drinking or suggested you cut down?
                                                                </p>
                                                                <div class="col-md-7">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="healthworker">
                                                                                <option value="0">No</option>
                                                                                <option value="2">Yes, but not in the last year</option>
                                                                                <option value="4">Yes, during the last year</option>
                                                                            </select>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#F6F6F6;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2>Result</h2>
                                </div>
                                <div class="modal-body clearfix">
                                    <p>
                                        <div id="message" class="col-md-5">
                                        </div>
                                        <div class="col-md-7">
                                            <div id="myDiv"></div>
                                        </div>
                                     <div class="col-md-4">
                                        <div id="join">
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="modal-footer" style="background-color:#F6F6F6;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="gauge" class="200x160px"></div>
                </div>
        </form>
    </div>
    <script>
        function CalculateRisk() {
            var freq = document.getElementById('freq').value;
            var drinkcnt = document.getElementById('drinkcnt').value;
            var sixdrink = document.getElementById('sixdrink').value;
            var stopdrink = document.getElementById('stopdrink').value;
            var failure = document.getElementById('failure').value;
            var morning = document.getElementById('morning').value;
            var guilt = document.getElementById('guilt').value;
            var remember = document.getElementById('remember').value;
            var injured = document.getElementById('injured').value;
            var healthworker = document.getElementById('healthworker').value;
            var risklevel = 0;
            var dependence = 0;
            if (freq == 0) { risklevel = Number(freq) + Number(injured) + Number(healthworker); }
            else { risklevel = Number(freq) + Number(drinkcnt) + Number(sixdrink) + Number(stopdrink) + Number(failure) + Number(morning) + Number(guilt) + Number(remember) + Number(injured) + Number(healthworker); }
            dependence = Number(stopdrink) + Number(failure) + Number(morning);

            if (risklevel < 8) {
                document.getElementById('message').innerHTML = " <ul> <li>You are a low risk drinker with an AUDIT score of " + risklevel + " </li> <li>"
            + "You also have low alcohol dependence with a dependency score of " + dependence + "</li> <li>Join us to keep track of your alcohol consumption.</ul>";
            }
            if (risklevel >= 8) {
                if (dependence < 4) {
                    document.getElementById('message').innerHTML = " <ul> <li>Your drinking is at a hazardous level with an AUDIT score of " + risklevel + " </li> <li>"
           + "You have low alcohol dependence with a dependency score of " + dependence + "</li> <li>Contact a professional to get harm reduction advise.</ul>";
                }
                else {
                    document.getElementById('message').innerHTML = " <ul> <li>Your drinking is at a hazardous level with an AUDIT score of " + risklevel + " </li> <li>"
           + "You have a high alcohol dependence with a dependency score of " + dependence + "</li> <li>Contact a professional to assess your dependency and harm reduction advise.</ul>";
                }

            }
            plotchart(risklevel);
            $(".svg-container").height("300");
            $(".main-svg").attr("height","300");
        }
        function plotchart(a) {

            // Enter a speed between 0 and 180
            var level = a * 4.5;

            // Trig to calc meter point
            var degrees = 180 - level,
                 radius = .5;
            var radians = degrees * Math.PI / 180;
            var x = radius * Math.cos(radians);
            var y = radius * Math.sin(radians);

            // Path: may have to change to create a better triangle
            var mainPath = 'M -.0 -0.025 L .0 0.025 L ',
                 pathX = String(x),
                 space = ' ',
                 pathY = String(y),
                 pathEnd = ' Z';
            var path = mainPath.concat(pathX, space, pathY, pathEnd);

            var data = [{
                type: 'scatter',
                x: [0], y: [0],
                marker: { size: 28, color: '850000' },
                showlegend: false,
                name: 'risk',
                text: level,
                hoverinfo: 'text+name'
            },
              {
                  values: [50 / 2, 50 / 6.5, 50 / 6.5, 50 / 6.5, 50],
                  rotation: 90,
                  text: ['High-Risk', 'Harmful', 'Risky', 'Low-Risk', ''],
                  textinfo: 'text',
                  textposition: 'inside',
                  marker: {
                      colors: ['rgba(237, 37, 41, .5)', 'rgba(235, 121, 123, .5)',
                                    'rgba(239, 143, 145, .5)', 'rgba(231, 187, 187, .5)',
                                    'rgba(255, 255, 255, 0)']
                  },
                  labels: ['20-40', '16-19', '8-15', '0-7', ''],
                  hoverinfo: 'label',
                  hole: .5,
                  type: 'pie',
                  showlegend: false
              }];

            var layout = {
                shapes: [{
                    type: 'path',
                    path: path,
                    fillcolor: '850000',
                    line: {
                        color: '850000'
                    }
                }],
                title: '<b>Your Risk Level based on AUDIT</b>',
                height: 500,
                width: 500,
                xaxis: {
                    zeroline: false, showticklabels: false,
                    showgrid: false, range: [-1, 1]
                },
                yaxis: {
                    zeroline: false, showticklabels: false,
                    showgrid: false, range: [-1, 1]
                }
            };

            Plotly.newPlot('myDiv', data, layout);
            document.getElementById('join').innerHTML = "<br/><a class='btn btn-block btn-primary' href='register.php'>JOIN US</a>";
        }
    </script>

									<?php
      include 'footer.php';
      ?>
								</html>
