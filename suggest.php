<?php
   ob_start();
   session_start();
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Welcome</title>
      <!-- Bootstrap core CSS -->
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
      <!--<script src="boost/docs/assets/js/ie-emulation-modes-warning.js"></script>-->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
      <link href="carousel.css" rel="stylesheet">
      <link rel="stylesheet" href="style.css" type="text/css" />
   </head>
   <body>
    <nav class="navbar navbar-inverse">
         <?php
            include 'nav.php';
            ?>
      </nav>
    <div class="container">
        <div class="container">
            <form name="drink_input" method="Get" action="suggest.php" id='form1'>
            <div class="row well" style="background-color: #F6F6F6;">
                <div class="col-md-6">
                    <div class="table-responsive clearfix">
                        <table class="table">
                            <caption>
                                <h3>
                                    Choose how much you drink in a day</h3>
                            </caption>
                            <tbody>
                                <tr>
                                    <td class="col-md-2" style="vertical-align: middle">
                                        <img class="img-rounded img-responsive center-block" src="res/pic/beer.png" alt="Cinque Terre"
                                            width="50" height="50">
                                        <p class="text-center">
                                            BEER
                                        </p>
                                    </td>
                                    <td class="col-md-4" style="vertical-align: middle">
                                        <div class="form-group">
                                            <select class="form-control" id="beertype">
                                                <option value="1">Full Strength (4.8%)</option>
                                                <option value="2">Mid Strength (3.5%)</option>
                                                <option value="3">Low Strength (2.7%)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="beercont">
                                                <option value="285">Glass (285 ml)</option>
                                                <option value="375">Bottle (375 ml)</option>
                                                <option value="425">Glass (425 ml)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-md-3" style="vertical-align: middle">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[1]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[1]" id="beerqty" class="form-control input-number"
                                                value="0" min="0" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2" style="vertical-align: middle">
                                        <img class="img-rounded img-responsive center-block" src="res/pic/wine-glass.png"
                                            alt="Cinque Terre" width="50" height="50">
                                        <p class="text-center">
                                            WINE</p>
                                    </td>
                                    <td class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" id="winetype">
                                                <option value="1">Red</option>
                                                <option value="2">White</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="containerwine">
                                                <option value="100">Standard serve (100 ml)</option>
                                                <option value="150">Restaurant serve (150 ml)</option>
                                                <option value="750">Bottle (750 ml)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-md-3" style="vertical-align: middle">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[2]" id="wineqty" class="form-control input-number"
                                                value="0" min="0" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2" style="vertical-align: middle">
                                        <img class="img-rounded img-responsive center-block" src="res/pic/champagne.png"
                                            alt="Cinque Terre" width="50" height="50">
                                        <p class="text-center">
                                            CHAMPAGNE</p>
                                    </td>
                                    <td class="col-md-4" style="vertical-align: middle">
                                        <div class="form-group">
                                            <p>
                                            </p>
                                            <select class="form-control" id="containerchampagne">
                                                <option value="1.4">Restaurant serve (150 ml)</option>
                                                <option value="7.1">Bottle (750 ml)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-md-3" style="vertical-align: middle">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[3]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" id="chqty" name="quant[3]" class="form-control input-number" value="0"
                                                min="0" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[3]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2" style="vertical-align: middle">
                                        <img class="img-rounded img-responsive center-block" src="res/pic/glass.png" alt="Cinque Terre"
                                            width="50" height="50">
                                        <p class="text-center">
                                            SPIRITS
                                        </p>
                                    </td>
                                    <td class="col-md-4" style="vertical-align: middle">
                                        <div class="form-group">
                                            <p>
                                            </p>
                                            <select class="form-control" id="spiritscon">
                                                <option value="1">Nip (30 ml)</option>
                                                <option value="22">Bottle (700 ml)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-md-3" style="vertical-align: middle">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[4]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" id="spiritsqty" name="quant[4]" class="form-control input-number"
                                                value="0" min="0" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[4]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2" style="vertical-align: middle">
                                        <img class="img-rounded img-responsive center-block" src="res/pic/can.png" alt="Cinque Terre"
                                            width="50" height="50">
                                        <p class="text-center">
                                            PRE-MIXED
                                        </p>
                                    </td>
                                    <td class="col-md-4" style="vertical-align: middle">
                                        <div class="form-group">
                                            <select class="form-control" id="premixtype">
                                                <option value="1">Full Strength (5%)</option>
                                                <option value="2">High Strength (7%)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="containerpremix">
                                                <option value="250">Can (250 ml)</option>
                                                <option value="300">Can (300 ml)</option>
                                                <option value="375">Can (375 ml)</option>
                                                <option value="440">Can (440 ml)</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="col-md-3" style="vertical-align: middle">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[5]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[5]" id="preqty" class="form-control input-number"
                                                value="0" min="0" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[5]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class=" pull-right">
                                            <input type='button' onclick='printstd()' value='Check' class="btn btn-success btn-sm" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <caption>
                                <h3>
                                    Standard Drink Measurement :</h3>
                            </caption>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="chart-stage">
                                            <div id="card">
                                                <div id="myDiv">
                                                    <!-- style="width: 505px; height: 360px;">-->
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td>
								<div id = "sugg_btn" style="display:none;">
								
									<label id = "cal_res" > </label>
									<a class='btn btn-block btn-warning' href='#cal'>Suggestion and Calorie Burning Information</a>
									</div>
								</td></tr>
                            </tbody>
                        </table>
                         
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
			
			<div class = "row well">
				<div class = "col-md-12">
					<table class="table" id = "cal">
                                                                            <caption>
                                <h3>
                                    Risks Involved :</h3>
                            </caption>

                        <tr>
                             <td>
                    <div id="dorn">
                    </div>                            
                            </td>
                       
                        
                        
                                <td>
                                  
                                   
                                        <div id="join">
                                        </div>
                                   
                                </td>
                            </tr>
                       </table>
				
				
				</div>
			</div>
			
			
			
			
            <div class="row well">
                <div class="col-md-12" style="background-color: #F6F6F6;">
                    <div class="col-md-12" style="vertical-align: middle">
                        <table class="table">
                                                    <caption>
                                <h3>
                                    Calorie Information :</h3>
                            </caption>
                             <tr>
                                    <td>
                                        <div class="col-md-6" style="vertical-align: middle">
                                            Select Sports Type :
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="activity">
                                                <option value="6.5">Basket Ball</option>
                                                <option value="7.5">Bicycling - General</option>
                                                <option value="8.5">Bicycling - Mountain</option>
                                                <option value="6.8">Bicycling - Dirt</option>
                                                <option value="12.8">Boxing </option>
                                                <option value="8">Football </option>
                                                <option value="5">Jogging</option>
                                                <option value="13.3">Marathon</option>
                                                <option value="6">Running - 6 KM/hr</option>
                                                <option value="8.3">Running - 8 KM/hr</option>
                                                <option value="9.8">Running - 10 KM/hr</option>
                                                <option value="10.5">Running - 11 KM/hr</option>
                                                <option value="11.5">Running - 12 KM/hr</option>
                                                <option value="11.8">Running - 13 KM/hr</option>
                                                <option value="12.3">Running - 14 KM/hr</option>
                                                <option value="14.5">Running - 16 KM/hr</option>
                                                <option value="16">Running - 18 KM/hr</option>
                                                <option value="19">Running - 19 KM/hr</option>
                                                <option value="19.8">Running - 21 KM/hr</option>
                                                <option value="23">Running - 23 KM/hr</option>
                                                <option value="7">Skiing</option>
                                                <option value="3">Walking - 4 KM/hr</option>
                                                <option value="3.5">Walking - 5 KM/hr</option>
                                                <option value="4.3">Walking - 6 KM/hr</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="vertical-align: middle">
                                             Weight (in KG):
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" id="weight" type="number" min = "10"/>
                                        </div>
                                    </td>
                                </tr>
    <tr>
                                <td>
                                    <div class="col-md-2">
                                        <h5>
                                           <b> Calories Consumed :</b>
                                        </h5>
                                    </div>
                                    <h5 id="calorieConsumed" class="col-md-2">
                                    </h5>
                                    <div class="col-md-2">
                                        <h5>
                                            <b> Work out For :</b>
                                        </h5>
                                    </div>
                                    <h5 id="calorieinfo" class="col-md-2">
                                    </h5>
                                </td>
                                    <td colspan="2">
                                        <div class=" pull-right">
                                            <input type='button' onclick='printstd()' value='Calculate' class="btn btn-success btn-sm" />
                                        </div>
                                    </td>
                            </tr>
                        </table>
                       
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</body>

<script>
    function CalculateStd() {
        var btype = document.getElementById('beertype').value;
        var bqty = document.getElementById('beerqty').value;
        var bcont = document.getElementById('beercont').value;
        var beerdrink = 0;

        var wtype = document.getElementById('winetype').value;
        var wqty = document.getElementById('wineqty').value;
        var wcont = document.getElementById('containerwine').value;
        var winedrink = 0;

        var cqty = document.getElementById('chqty').value;
        var ccont = document.getElementById('containerchampagne').value;
        var chdrink = 0;
        chdrink = cqty * ccont;

        var sqty = document.getElementById('spiritsqty').value;
        var scont = document.getElementById('spiritscon').value;
        var spdrink = 0;
        spdrink = sqty * scont;

        var ptype = document.getElementById('premixtype').value;
        var pqty = document.getElementById('preqty').value;
        var pcont = document.getElementById('containerpremix').value;
        var pdrink = 0;


        if (btype == 1) {
            if (bcont == 285) {
                beerdrink = 1.1 * bqty;
            }
            if (bcont == 375) {
                beerdrink = 1.4 * bqty;
            }
            if (bcont == 425) {
                beerdrink = 1.6 * bqty;
            }
        }
        if (btype == 2) {
            if (bcont == 285) {
                beerdrink = 0.8 * bqty;
            }
            if (bcont == 375) {
                beerdrink = 1 * bqty;
            }
            if (bcont == 425) {
                beerdrink = 1.2 * bqty;
            }
        }

        if (btype == 3) {
            if (bcont == 285) {
                beerdrink = 0.6 * bqty;
            }
            if (bcont == 375) {
                beerdrink = 0.8 * bqty;
            }
            if (bcont == 425) {
                beerdrink = 0.9 * bqty;
            }
        }

        //

        if (wtype == 1) {
            if (wcont == 100) {
                winedrink = 1 * wqty;
            }
            if (wcont == 150) {
                winedrink = 1.5 * wqty;
            }
            if (wcont == 750) {
                winedrink = 7.7 * wqty;
            }
        }
        if (wtype == 2) {
            if (wcont == 100) {
                winedrink = 0.9 * wqty;
            }
            if (wcont == 150) {
                winedrink = 1.4 * wqty;
            }
            if (wcont == 750) {
                winedrink = 6.8 * wqty;
            }
        }


        ///

        if (ptype == 1) {
            if (pcont == 250) {
                pdrink = 1 * pqty;
            }
            if (wcont == 300) {
                pdrink = 1.2 * pqty;
            }
            if (wcont == 375) {
                pdrink = 1.5 * pqty;
            }
            if (wcont == 440) {
                pdrink = 1.7 * pqty;
            }
        }

        if (ptype == 2) {
            if (pcont == 250) {
                pdrink = 1.9 * pqty;
            }
            if (wcont == 300) {
                pdrink = 1.6 * pqty;
            }
            if (wcont == 375) {
                pdrink = 2.1 * pqty;
            }
            if (wcont == 440) {
                pdrink = 2.4 * pqty;
            }
        }

        var total = beerdrink + winedrink + chdrink + spdrink + pdrink;


        var trace1 = {
            x: ['Standard Drinks'],
            y: [2],
            name: 'Maximum Limit Per Day',
            type: 'bar'
        };

        var trace2 = {
            x: ['Standard Drinks'],
            y: [Number(total)],
            name: 'Your Consumption',
            type: 'bar'
        };

        var data = [trace1, trace2];

        var layout = { barmode: 'group', bargap: 0.75,
            bargroupgap: 0
        };

        Plotly.newPlot('myDiv', data, layout);


        return total;



    };

    function CalculateCal() {
        var btype = document.getElementById('beertype').value;
        var bqty = document.getElementById('beerqty').value;
        var bcont = document.getElementById('beercont').value;
        var beercalories = 0;

        var wtype = document.getElementById('winetype').value;
        var wqty = document.getElementById('wineqty').value;
        var wcont = document.getElementById('containerwine').value;
        var winecalories = 0;

        var cqty = document.getElementById('chqty').value;
        var ccont = document.getElementById('containerchampagne').value;
        var champagnecalories = 0;

        if (ccont = 1.4) { champagnecalories = 121.1 * cqty; }
        else { champagnecalories = 605.59 * cqty; }


        var sqty = document.getElementById('spiritsqty').value;
        var scont = document.getElementById('spiritscon').value;
        var spiritcalories = 0;
        if (scont = 1) { spiritcalories = 63.4 * sqty; }
        else { spiritcalories = 1481.61 * sqty; }

        var ptype = document.getElementById('premixtype').value;
        var pqty = document.getElementById('preqty').value;
        var pcont = document.getElementById('containerpremix').value;
        var predrinkcalories = 0;

        if (btype == 1) {
            if (bcont == 285) {
                beercalories = 102.807 * bqty;
            }
            if (bcont == 375) {
                beercalories = 135.272 * bqty;
            }
            if (bcont == 425) {
                beercalories = 153.309 * bqty;
            }
        }
        if (btype == 2) {
            if (bcont == 285) {
                beercalories = 81.7009 * bqty;
            }
            if (bcont == 375) {
                beercalories = 107.501 * bqty;
            }
            if (bcont == 425) {
                beercalories = 121.835 * bqty;
            }
        }

        if (btype == 3) {
            if (bcont == 285) {
                beercalories = 70.127 * bqty;
            }
            if (bcont == 375) {
                beercalories = 92.272 * bqty;
            }
            if (bcont == 425) {
                beercalories = 104.575 * bqty;
            }
        }

        //

        if (wtype == 1) {
            if (wcont == 100) {
                winecalories = 77.4 * wqty;
            }
            if (wcont == 150) {
                winecalories = 116.1 * wqty;
            }
            if (wcont == 750) {
                winecalories = 580.5 * wqty;
            }
        }
        if (wtype == 2) {
            if (wcont == 100) {
                winecalories = 70.7 * wqty;
            }
            if (wcont == 150) {
                winecalories = 106.07 * wqty;
            }
            if (wcont == 750) {
                winecalories = 530.3 * wqty;
            }
        }



        ///

        if (ptype == 1) {
            if (pcont == 250) {
                predrinkcalories = 266.364 * pqty;
            }
            if (wcont == 300) {
                predrinkcalories = 319.637 * pqty;
            }
            if (wcont == 375) {
                predrinkcalories = 399.546 * pqty;
            }
            if (wcont == 440) {
                predrinkcalories = 468.801 * pqty;
            }
        }

        if (ptype == 2) {
            if (pcont == 250) {
                predrinkcalories = 147.516 * pqty;
            }
            if (wcont == 300) {
                predrinkcalories = 177.019 * pqty;
            }
            if (wcont == 375) {
                predrinkcalories = 221.333 * pqty;
            }
            if (wcont == 440) {
                predrinkcalories = 259.627 * pqty;
            }
        }
        var totalcalories = beercalories + winecalories + champagnecalories + spiritcalories + predrinkcalories;

		//dorn modified
		
		 document.getElementById('sugg_btn').style.display = "block";
		// document.getElementById('car_res').innerHTML = "The drinking contains : " + totalcalories + "KCal <br/>";
        return totalcalories;

    };




    function printstd() {
        var std = CalculateStd();
        var ctr = 1;

        var totalcalories = CalculateCal();
        var met = document.getElementById('activity').value;
        var weight = document.getElementById('weight').value;
        var calories = CalculateCal();
        var time = (calories / (weight * met)) * 60
        if(calories == 0)
		{
        document.getElementById('calorieinfo').innerHTML = 0 + " Minutes";
		}
		else 
		{
		document.getElementById('calorieinfo').innerHTML = Math.round(time) + " Minutes";
		}
        document.getElementById('calorieConsumed').innerHTML = Math.round(totalcalories) + " KCal";




        if (std <= 2) {
            document.getElementById('dorn').innerHTML = " <ul> <li>You do not exceed the Australian Alcohol Guidelines." + " </li> <li>"
      + "There are no long term risks associated with this type of drinking.</li> </ul>";
        }

        else {
            document.getElementById('dorn').innerHTML = " <ul><li>Long term effects for this type of consumption : </li>"+ 
                "<li>Cancer - bowel, breast, throat, mouth, liver" + " </li> <li>"
      + "Liver Disease </li><li>Cardiovascular Diseases </li><li> Stroke</li><li>Mental Health Problems</li></ul>";
        }

        document.getElementById('join').innerHTML = "<br/> "+ "<p><b>Wish to track your drinking?</b></p> <br/>" + 
		"<a class='btn btn-block btn-primary' href='dashboard/pages/index.php'>JOIN US</a>";



        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue"],
                datasets: [{
                    label: '# of Votes',
                    data: [2, std],
                    backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
                    borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
                    borderWidth: 1
}]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
}]
                        }
                    }
                });


            };
      
      
                   
      
                                
</script>

<script>
    $(document).ready(function() {
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('input[name=beer]').on('change', function() {
            if ($('input[name=beer]:checked').val() == "fullstrength") {
                $("#container1none").show()
                $("#container1glass").show()
                $("#container1bottle").show()
                $("#container1glass1").show()
            }
            if ($('input[name=beer]:checked').val() == "midstrength") {
                $("#container1none").show()
                $("#container1glass").show()
                $("#container1bottle").show()
                $("#container1glass1").show()
            }
            if ($('input[name=beer]:checked').val() == "lowstrength") {
                $("#container1none").show()
                $("#container1glass").show()
                $("#container1bottle").show()
                $("#container1glass1").show()
            }
        })
        $('input[name=wine]').on('change', function() {
            if ($('input[name=wine]:checked').val() == "Red") {
                $("#container2none").show()
                $("#container2standard").show()
                $("#container2restaurant").show()
                $("#container2bottle").show()
            }
            if ($('input[name=wine]:checked').val() == "White") {
                $("#container2none").show()
                $("#container2standard").show()
                $("#container2restaurant").show()
                $("#container2bottle").show()
            }
            if ($('input[name=wine]:checked').val() == "Champagne") {
                $("#container2none").show()
                $("#container2standard").hide()
                $("#container2restaurant").show()
                $("#container2bottle").show()
            }
            if ($('input[name=wine]:checked').val() == "Port") {
                $("#container2none").show()
                $("#container2standard").show()
                $("#container2restaurant").hide()
                $("#container2bottle").hide()
            }

        })
        $('input[name=Spirits]').on('change', function() {
            if ($('input[name=Spirits]:checked').val() == "highstrength") {
                $("#container3none").show()
                $("#container3nip").show()
                $("#container3bottle").show()
                $("#container3can1").hide()
                $("#container3can2").hide()
            }
            if ($('input[name=Spirits]:checked').val() == "fullstrengthRTD") {
                $("#container3none").show()
                $("#container3nip").hide()
                $("#container3bottle").show()
                $("#container3can1").show()
                $("#container3can2").show()
            }
            if ($('input[name=Spirits]:checked').val() == "highstrengthRTD") {
                $("#container3none").show()
                $("#container3nip").hide()
                $("#container3bottle").show()
                $("#container3can1").show()
                $("#container3can2").show()
            }
            if ($('input[name=Spirits]:checked').val() == "fullstrengthPMS") {
                $("#container3none").show()
                $("#container3nip").hide()
                $("#container3bottle").show()
                $("#container3can1").show()
                $("#container3can2").show()
            }
            if ($('input[name=container3]:checked').val() == "highstrengthPMS") {
                $("#container3none").show()
                $("#container3nip").hide()
                $("#container3bottle").show()
                $("#container3can1").show()
                $("#container3can2").show()
            }
        })

        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
                  (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
                  (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
             
</script>
   <?php
      include 'footer.php';
      ?>
   <script>window.jQuery || document.write('<script src="boostrap/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
   <script src="bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
   <script src="bootstrap/docs/assets/js/vendor/holder.min.js"></script>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
</html>