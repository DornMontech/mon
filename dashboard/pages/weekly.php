<?php
	ob_start();
	session_start();
	require_once '../../db/dbconn.php';
	
	if( !isset($_SESSION['user']) ) {
		header("Location:../../login.php");
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
	
	
	$chart_query = mysql_query("SELECT * FROM user_drink");
	
	
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
    

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="icon" href="../../ico.png"> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	

</head>

<body>


<div id="wrapper">

         <!-- Navigation -->
        <!-- Navigation -->
      
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
      


        <div id="page-wrapper">
			<div class="row">
				<div class = "col-lg-2"></div>
				<div class = "col-lg-8">
					<?php
										$overall_query = mysql_query("SELECT count(*) As times, sum(cost)as scost, avg(std_drink) as avgs FROM `user_drink` WHERE user_id='$cid'");
										$overall_res = mysql_fetch_array($overall_query);
										$drink_times = $overall_res["times"];
										$drink_cost = $overall_res["scost"];
										$drink_avg = Round($overall_res["avgs"],1);
										?>
									
									
									<br/>
									<ul class = "list-group">
									   <li class="well"> <b>Recording Since: <?php echo $userRow["reg_date"];  ?></b></li>
									   <li  class="well"><b>Number of Drinking times: <?php echo $drink_times;  ?></b></li>
									   <li  class="well"><b>Total Expenditure: $ <?php echo $drink_cost;  ?></b></li>									 
									   <!-- <li  class="well"><b>Average standard drinks per time: <?php echo $drink_avg;  ?></b></li> */-->
								   </ul>
								   
				</div>
				<div class = "col-lg-2"></div>
			</div>
			<div class="row">
                <div class="col-lg-6">
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-money"></i> Weekly spend compare
								 
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
									
									<?php
										//all users
										$all_user_week =  mysql_query("SELECT week(recorded_time) as week , sum(cost) as cost FROM `user_drink` GROUP by week");
										$all_week_amount = mysql_num_rows($all_user_week);
										$all_user_total =0;
										while ($all_user_record = mysql_fetch_assoc($all_user_week)) {
											
											$all_user_total = $all_user_total + $all_user_record['cost'];
										}
										 $users_amount = mysql_query("SELECT DISTINCT`user_id` FROM `user_drink`");
										 $all_user_no = mysql_num_rows($users_amount);
										 $all_avg = round($all_user_total/$all_week_amount / $all_user_no,1);
										
									
										
										//one user
										$user_week_query = mysql_query("SELECT week(recorded_time) as week , sum(cost) as cost FROM `user_drink` WHERE `user_id` = '$cid' GROUP by week");
										$week_amount =  mysql_num_rows($user_week_query); 
										$total_spend = 0;
										while ($user_record = mysql_fetch_assoc($user_week_query)) {
											
											$total_spend = $total_spend + $user_record['cost'];
										}
										 $user_weekly_avg = round($total_spend/$week_amount,1);
										?>
									
									
									<br/>
									
								   <div id ="cost-barchart"></div>
								
								<!--- <ul class = "list-group">
									   <li class="well"><b>Your average weekly spend : $<?php /* echo $user_weekly_avg;  */ ?></b></li>
									   <li class="well"><b>Other Users average spend: $<?php /* echo $all_avg; */  ?></b></li>
									   
								   </ul>  ---->
					</div>
							<!-- /.panel-body -->
							</div>
						<!-- /.panel -->
						</div>
						
						
						<div class="col-lg-6">
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-glass"></i> Weekly standard drink compare
								 
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
									
									<?php
										//all users
										$all_user_drink =  mysql_query("SELECT week(recorded_time) as week , sum(std_drink) as dr FROM `user_drink` GROUP by week");
										$all_drink_amount = mysql_num_rows($all_user_drink);
										$all_drink_total =0;
										while ($all_drink_record = mysql_fetch_assoc($all_user_drink)) {
											
											$all_drink_total = $all_drink_total + $all_drink_record['dr'];
										}
										
										 $all_avg_drink = round($all_drink_total/$all_week_amount / $all_user_no,1);
										
									
										
										//one user
										$user_week_drink = mysql_query("SELECT week(recorded_time) as week , sum(std_drink) as dr FROM `user_drink` WHERE `user_id` = '$cid' GROUP by week");
										
										$total_drink = 0;
										while ($user_dr_record = mysql_fetch_assoc($user_week_drink)) {
											
											$total_drink = $total_drink + $user_dr_record['dr'];
										}
										 $user_weekly_dr= round($total_drink/$week_amount,1);
										?>
									
									<div id ="drink-barchart"></div>
									<br/>
									<!---<ul class = "list-group">
									   <li class="well"> <b>Your weekly avarage standard drinks :<?php /* echo $user_weekly_dr; */  ?></b></li>
									   <li  class="well"><b>Other Users average standard drinks: <?php /* echo $all_avg_drink; */  ?></b></li>
									   
								   </ul>
									---->
								   <div id ="drink-barchart"></div>
								</div>
							<!-- /.panel-body -->
							</div>
						<!-- /.panel -->
						</div>
			</div>
		
		
		
            <div class="row">
				
					
		    </div>
        
			
			
			
						
            <!-- /.row -->
			
		
        <div class="row">
            <div class="panel-body">						
                
			
				
				
				
	<!--cost---->
			<script> 
		<!--weeky cost bar chart->
			Morris.Bar({
			 element: 'cost-barchart',
			 barGap:30,
			 barSizeRatio:0.3,
			 data:[{ y: 'Weekly Spend $', a: <?php echo $user_weekly_avg;  ?>, b: <?php echo $all_avg  ?> }],
			 xkey: 'y',
			 ykeys: ['a','b'],
			 barColors: ["#339933", "#FFCC33"],
			 labels: ['You', 'Other'],
			 
			 smooth: true,
			 resize: true
			});
		


// weekly standard drink
			Morris.Bar({
			 element: 'drink-barchart',
			 barGap:30,
			 barSizeRatio:0.3,
			 data:[{ y: 'Weekly Standard drink', a: <?php echo $user_weekly_dr;  ?>, b: <?php echo $all_avg_drink;  ?> }],
			 xkey: 'y',
			 ykeys: ['a','b'],
			 barColors: ["#339933", "#FFCC33"],
			 labels: ['You', 'Other'],
			 
			 smooth: true,
			 resize: true
			});
		</script>
				

					
				
			</div>	 
            <!-- /.row -->
		</div>
        <!-- /#page-wrapper -->
	</div>
	
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
