<?php
	ob_start();
	session_start();
	require_once '../../db/dbconn.php';
	
	if( !isset($_SESSION['user']) ) {
		header("Location:../../index.php");
		exit;
	}
	// select loggedin users detail
	else
	{
	$res=mysql_query("SELECT * FROM clients WHERE cname= '".$_SESSION['user']."'");

	$userRow=mysql_fetch_array($res);
	}
	
	$cid = $userRow["cid"];
	
	$query = "SELECT * FROM user_drink WHERE user_id ='".$cid."'";
	$records = mysql_query($query);
	$count = mysql_num_rows($records); 
	$record = mysql_fetch_array($records);
	//$targetquery = "SELECT * FROM user_drink WHERE user_id ='".$cid."'";
	
	
	//$chart_query = mysql_query("SELECT * FROM user_drink");
	
	
	
	
	
	
	if(isset($_POST['btn-add'])) {
	  
	 $targetname = $_POST['tname'];
	 $target_money = $_POST['budget'];
	 $current_money = 0;
	 $end_date = $_POST['enddate'];
	 $dt = date("Y-m-d");
	 $tomorrow  = date("Y-m-d", strtotime($dt." + ". $end_date." day"));
	 $query = "INSERT INTO target(target_name,cid,target_money,current_money,start_date,end_date,status) VALUES
	 ('$targetname','$cid','$target_money','$current_money',now(),'$tomorrow',0)";	 
	 
	 $insert = mysql_query($query);
	 $update = mysql_query("UPDATE `clients` SET `target_no` = '1' WHERE `clients`.`cid` = '$cid'");
	 
  
  if ($insert) {
	   $errTyp = "success";
	   $errMSG = "successfully add record !";   
	   header("location: loading.php");
	   
	  } else {
	   $errTyp = "danger";
	   $errMSG = "Something went wrong, try again later...". $cid; 
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
    <meta name="author" content="">

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
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	

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
                    <h1 class="page-header">Budget Target</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-lg-12">
                    <div class="panel panel-default">
					
						<?php 
							$today = date("Y-m-d");
							$userTarget = $userRow['target_no'];
							if($userTarget == 0)
							{
								include 'set_target.php';
								}
							else
							{
									$tquery = mysql_query("SELECT * FROM `target` WHERE cid ='".$cid."' AND status = '0'");
									$trest = mysql_fetch_array($tquery);
									
									$tcurrent_cost = mysql_query("SELECT SUM(cost) AS sumcost FROM user_drink WHERE user_id ='".$cid."' AND `recorded_time` BETWEEN '".$trest["start_date"]."' AND '".$trest["end_date"]."'");
									$tresult = mysql_fetch_array($tcurrent_cost);
									$current_money= $tresult["sumcost"];
									
									
									$update_cost = mysql_query("UPDATE `target` SET `current_money` = '".$current_money."' WHERE `target`.`target_id` = '".$trest["target_id"]."'");
									//
									
									$status = "In Progress ";
									$today = date("Y-m-d");
									
									if($today <= $trest["end_date"]){
										if($current_money > $trest["target_money"]){
											$status = "You exceed the budget ! Should spend less";
											//$update_targetTable = mysql_query("UPDATE `target` SET `status` = '2' WHERE `target`.`target_id` = '".$trest["target_id"]."'");
											}	
									}
									else {
										$update_userTable = mysql_query("UPDATE `clients` SET `target_no` = '0' WHERE `clients`.`cid` = '$cid'");
										if($current_money <= $trest["target_money"] ) 	
										{									
											$update_targetTable = mysql_query("UPDATE `target` SET `status` = '1' WHERE `target`.`target_id` = '".$trest["target_id"]."'");
										}
										else{
											$update_targetTable = mysql_query("UPDATE `target` SET `status` = '2' WHERE `target`.`target_id` = '".$trest["target_id"]."'");
										}
										}
									
										?>
											<div class="panel-body">
											<h3> Current Target </h3>
												<table class = "table">
													<tr><th>Target Name</th>
													<th>Start Date</th>
													<th>End Date</th>
													 <th>Budget Limit</th>
													 <th>Spent Money</th>
													 <th>Status</th></tr>
													 <tr>
													 <?php 
													 echo "<td>".$trest["target_name"]."</td>";
													 echo "<td>".$trest["start_date"]."</td>";
													 echo "<td>".$trest["end_date"]."</td>";
													 echo "<td>$".$trest["target_money"]."</td>";
													 echo "<td>$".($current_money + 0)."</td>";
													 echo "<td>".$status."</td>";
													 ?>
													 </tr>
													 </table>
													 
													 
												Money spending on drinking Progress<br/> <?php 
												
												if($current_money >= $trest["target_money"]){
													$percent = 100;
													$color = "black";}
												else{
												$percent = round(($current_money / $trest["target_money"]) * 100,1);
												
												
												if($percent/100 < 0.4){
													$color = "green";
													}
												else if ($percent/100 < 0.8 && $percent/100 >= 0.4){
													$color = "yellow";}
												if($percent/100 >= 0.8){
													$color = "red";
													}
												
											}						
									?>
									
									<br/>
										<div class="outer">
										
											<div class = "inner"><font color="white"><?php echo $percent ?>%</font></div>
											
										</div>
										
										
										<style type="text/CSS">
											.outer{
												height:26px;
												width:100%;
												border:solid 1px #000;									
												}
											.inner{
												height:25px;
												width:<?php echo $percent ?>%;
												border-right:solid 1px #000;
												border-bottom:solid 1px #000;									
												background-color: <?php echo $color ?>;

												}
										</style>
									<?php
									}
									?>
					
					
						</div>
					</div>
				</div>
			
			</div>
			
			
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

   <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
