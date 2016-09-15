<?php
ob_start();
session_start();
if( isset($_SESSION['user'])=="" ){
 header("Location: home.php");
}
//
require_once '../../db/dbconn.php';



if(isset($_POST['btn-signup'])) {
	  
	 $drinkname = "Wine";
	 $drinktype = $_POST['beertype'];
	 $qty = $_POST['beerqty'];
	 $ml = $_POST['beercont'];
	 $cost = $_POST['cost'];
	 
	 $res=mysql_query("SELECT * FROM clients WHERE cname= '".$_SESSION['user']."'");
	 $userRow=mysql_fetch_array($res);
	 $cid = $userRow["cid"];
	 
	 $stand_drink_query = mysql_query("SELECT std_drink FROM drink_details WHERE drink_name = '".$drinkname."' AND drink_type = '".$drinktype."' and ml = '".$ml."'");
	 $drink_stand_result = mysql_fetch_array($stand_drink_query);
	 $user_stand_drink = $drink_stand_result["std_drink"]*$qty;
		
	 
	 $query = "INSERT INTO user_drink(user_id,drink_name,qty,drink_type,ml,std_drink,cost,recorded_time) VALUES('$cid','$drinkname','$qty','$drinktype','$ml','$user_stand_drink','$cost', now())";
	 $insert = mysql_query($query);
  
  if ($insert) {
	   $errTyp = "success";
	   $errMSG = "successfully add record !<br/> You had ". $user_stand_drink . " standard drink this time";   
	  } else {
	   $errTyp = "danger";
	   $errMSG = "Something went wrong, try again later...". $qty; 
	  } 
	   
	 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="dorn">

    <title>Welcome</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <nav class="navbar navbar-inverse">
                <?php
					include 'nav.php';
				?>
        </nav>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php include "sidebar.php"; ?>
                        
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add wine drinking</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
							<form method="post" autocomplete="off">
							<div class="col-md-12 clearfix">
							<div class="col-md-10" style="background-color:#F6F6F6;">
								<div class="table-responsive">
									<table class="table">
										<caption>
											<h3>Choose how much wine you drink</h3>
										</caption>
										 <?php   if ( isset($errMSG) ) {  
												?>
												<div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
										<tbody>
											<tr>
												<td class="col-md-2" style="vertical-align: middle">
													<img class="img-rounded img-responsive center-block" src="../../res/pic/can.png" alt="Cinque Terre" width="50" height="50">
													<p class="text-center">Wine </p>
												</td>
												<td class="col-md-4" style="vertical-align: middle">
													
													<div class="form-group">
													 <select class="form-control" id="beertype" name="beertype">
														<option value="Red">Red (13%)</option>
														<option value="White">White (11.5%)</option>
														
													  </select>
														</div>
														<div class="form-group">
													  <select class="form-control" id="beercont" name = "beercont">
														<option value="100">Standard serve (100 ml)</option>
														<option value= "150">Restaurant serve (150 ml)</option>
														<option value="740">Bottle (750 ml)</option>
													  </select>
													</div>
												</td>
												<td class="col-md-4" style="vertical-align: middle">
												<div class="form-group">
											Quantity:
											<select name="beerqty" id= "beerqty">
									<?php
										for ($i=1; $i<=100; $i++)
										{
											?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>
											<?php
										}
									?>
									</select></div>
												</td>
												<td class="col-md-2" style="vertical-align: middle">
											<div class="form-group">
											Cost($):<input type = "number" name = "cost" id = "cost" min= "0" required />
											</div></td>
												
											</tr>
											
											</tbody>
										<tr>
											<td colspan="3">
												<div class=" pull-right">
													 <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Add</button>
												</div>
											</td>
										</tr>
									</table>
											
								</div>
								<!-- /.panel-body -->
								</div>
							</div>	
						</form>
                    </div>
                    <!-- /.panel -->
                </div>
				</div>
            </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
