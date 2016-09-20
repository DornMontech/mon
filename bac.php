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
                                    <font color = "grey" > 1. What have you drunk so far?</font></h3>
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
                              <!--    <tr>
                                     <td colspan="2">
                                         <!--<div class=" pull-right">
                                            <input type='button' onclick='CalculateBac()' value='Check' class="btn btn-success btn-sm" />
                                        </div> -->
                                    </td>
                                </tr> 
                                <tr>
                                    <td colspan="2">
                                        <div class=" pull-right">
                                            <input type='button' onclick='calculateFinalBac()' value=' Get my BAC' class="btn btn-success btn-lg" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
                 <div class="col-md-6" style="background-color:#F6F6F6;">
                            <div class="container">
                                <div class="row clearfix">
                                    <div class="col-md-5 column">
                                        <h3>
                                            <font color = "grey" >2. Select your gender</font>
                                            <hr>
                                        </h3>
                                         <p>
                                         <div id="selectsex">
                                                </div> 
                                         </p>
                                    </div>
                                </div>
                                <div class="container">
                                <div class="row clearfix">
                                    <div class="col-md-6 column">
                                          </br>
                                    </div>

                                    
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-1 column">
                                            <div class="form-group">
                                            <!-- <select class="form-control" id="sex"> -->
                                                  
                                               <!-- <option value="1">Female</option> -->
                                               <!-- <option value="2">Male</option> -->
                                           <!--  </select> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4 column"> 
                                    <form id = "mainForm" name ="mainForm" action="form_action.asp" >
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" class = 'radio1' onclick="myFunction(this.value)" value="1" checked="checked">Female&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" class = 'radio1' onclick="myFunction(this.value)" value="2">Male
                                </label>
                             </form>
                                    </div>
                                </div>
                            </div>

                             <div class="container">
                                <div class="row clearfix">
                                    <div class="col-md-5 column">
                                        <h3>
                                            <hr>
                                           <font color ="grey" >
                                            3. What is your weight?</font>
                                            <hr>
                                        </h3>
                                    </div>
                                </div>
                                <div class="container">
                                <div class="row clearfix">
                                    <div class="col-md-6 column">
                                           
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-1 column">
                                            
                                    </div>
                                    <div class="col-md-2 column">
                                  <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[7]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[7]" id="weight" class="form-control input-number"
                                                value="50" min="0" max="500">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[7]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                             <div class="container">
                                <div class="row clearfix">
                                    <div class="col-md-5 column">
                                        <h3>
                                            <hr>
                                            </br> <font color="grey">
                                            4. For how long have you been drinking?</font>
                                            <hr>
                                        </h3>
                                        <p>
                                        <div id="selecttime">
                                                </div> 
                                         </p>
                                    </div>
                                </div>
                                <div class="container">
                                <div class="row clearfix">
                                    <div class="col-md-1 column">
                                           </br>   
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 column">
                                     <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[8]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[8]" id="hours" class="form-control input-number"
                                                value="0" min="0" max="50">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[8]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                     <h4> hrs. </h4>

                                    </div>
                                    <div class="col-md-2 column">
                                        
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[9]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[9]" id="minutes" class="form-control input-number"
                                                value="0" min="0" max="59">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[9]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <h4> min. </h4>
                                    </div>
                                </div>
                            </div>
                            </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <caption>
                                <h3>
                                    BAC Information: &nbsp; <div id="bac2"> </h3> 
                            </caption>
                            <tbody>
                                <tr>
                                    <td>
                                                <div id="stddrinks">
                                                    <!-- style="width: 505px; height: 360px;">-->
                                                </div> 
                                       
                                                <div id="alcholgrams">
                                                    <!-- style="width: 505px; height: 360px;">-->
                                                </div> 
                                                <div id="">
                                                    <!-- style="width: 505px; height: 360px;">-->
                                                </div> 
                                                <div id="bac1">
                                                    <!-- style="width: 505px; height: 360px;">-->
                                                </div> 
                                                <div id="sex2">
                                                    <!-- style="width: 505px; height: 360px;">-->
                                                </div>                                    
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <div class="chart-stage">
                                            <div id="card">
                                                <div id="myDiv">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>-->
                                <tr>
                                <td>
                                <div id = "sugg_btn" style="display:none;">
                                
                                    <label id = "cal_res" > </label>
                                    <a class='btn btn-block btn-warning' href='#cal'>Suggestion and Calorie Burning Information</a>
                                    </div>
                                </td></tr>
                            </tbody>
                        </table>
                         
                    </div>
                    <div class="clearfix">
                    <div class="container">
                      <button  href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                      data-target="#myModal" id="myModalButton">myModal</button>
                      <!-- Modal -->
                      <div class="modal fade" id="myModal" >
                        <div class="modal-dialog modal-sm">

                          <!-- Modal content-->
                          <div class="modal-content" >
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Missing information</h4>
                            </div>
                            <div class="modal-body">
                              <p>Please input all your information.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      
                    </div>

                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</body>

<body onload="hideButton();">
    
    </body>

<script type="text/javascript">
    function hideButton() {
    document.getElementById("myModalButton").style.visibility = "hidden";
}

</script>


</script>

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
       
        //document.getElementById('stddrinks').innerHTML = "the standard drinks" + total;
        return total;

    };


    function getAlcoholGrams(){
        var bqty = document.getElementById('beerqty').value;
        var wqty = document.getElementById('wineqty').value;
        var cqty = document.getElementById('chqty').value;
        var sqty = document.getElementById('spiritsqty').value;
        var pqty = document.getElementById('preqty').value;
        var std = CalculateStd();
        var alcholgrs = 0;

        if (std == 0){
            $('#myModal').modal('show')
        }
        else{
            var alcholgrs = (std * 14);
        }
        return alcholgrs;
    };

    function getWeightGender(){
        var bodywgt = document.getElementById('weight').value;
        var sex2 =  $('.radio1:checked').val();

        if (bodywgt == 0){
            $('#myModal').modal('show')
        }
        if (sex2 == 1){
            bodywgt = ((bodywgt * 1000)*.55);
        }
        if (sex2 == 2){
            bodywgt = ((bodywgt * 1000)*.68);
        }
        return bodywgt;
    };

    function calculateBacPercentage(){
        var alcoholgrams = getAlcoholGrams();
        var weightgender = getWeightGender();
        var bac = ((alcoholgrams / weightgender) * 100);
        return bac;
    };

    function calculateTime(){
        var hours = document.getElementById('hours').value;
        var minutes = document.getElementById('minutes').value;
        var time = 0;
        if (hours == 0 && minutes == 0){
            $('#myModal').modal('show')
        }
        else {
            time = (minutes / 60) + hours;
        }
        return time;
        
    };

    function calculateFinalBac(){
        var bac = calculateBacPercentage();
        var time =calculateTime();
        var finalbac = bac - (time * 0.015)

        if ((time * 0.015) >= bac){
            finalbac = 0;        }
        if ((time * 0.015) < bac){
            finalbac = (bac - (time * 0.015)).toFixed(4);
           // document.getElementById('bac2').innerHTML = "" + finalbac + "%";
        }

        if (finalbac < 0.02 && finalbac > 0){
            document.getElementById('bac2').innerHTML = "" + finalbac + "%";
            document.getElementById('bac1').innerHTML = "With a BAC less than 0.02 you do not have any side effects";

        }
        if (finalbac > 0.02 && finalbac < 0.05){
            document.getElementById('bac2').innerHTML = "" + finalbac + "%";
            document.getElementById('bac1').innerHTML = "With a BAC between 0.02 and 0.05 your ability to see and calculate distances is slightly reduced. Also, your reflexes are slow. With a BAC greater than 0.05 is not legal to drive in Australia!" ;

        }
        if (finalbac > 0.05 && finalbac < 0.08){
            document.getElementById('bac2').innerHTML = "" + finalbac + "%";
            document.getElementById('bac1').innerHTML = "With a BAC greater to 0.05 is twice as likely to have a car accident";

        }
        if (finalbac > 0.08 ){
            document.getElementById('bac2').innerHTML = "" + finalbac + "%";
            document.getElementById('bac1').innerHTML = "It is 5 times more risky to have a crash. Call a cab!";
        }
        return finalbac;
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
