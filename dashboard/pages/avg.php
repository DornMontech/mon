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
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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
                <div class="col-lg-6">
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-list-alt fa-fw"></i> 
								 
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
									<ul class = "list-group">
									   <li class="well"> <b>Your weekly spend :<?php echo $user_weekly_avg;  ?></b></li>
									   <li  class="well"><b>Other Users average spend: <?php echo $all_avg;  ?></b></li>
									   
								   </ul>
								</div>
							<!-- /.panel-body -->
							</div>
						<!-- /.panel -->
						</div>
						
						
						<div class="col-lg-6">
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-dollar fa-fw"></i> Target Leader Top 5
									<?php
									
									$leading_query="SELECT DISTINCT clients.cname as name, target.cid , COUNT(target.target_id) as number FROM clients, target WHERE target.cid = clients.cid and target.status = '1' GROUP by target.cid order by COUNT(target.target_id) DESC LIMIT 5";

									$leadRow=mysql_query($leading_query);
									
									?>
									
									
								 
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
									<table class = "table">  
		  <tr><th>User Name</th>
		  <th>Achivement Score</th>
		 
		  </tr>
			<?php
			$statement = "You can do it too !";
			
			while ($lead = mysql_fetch_assoc($leadRow)) {
				echo '<tr>';
			   
					echo '<td>' . $lead['name'] . '</td>';
					echo '<td>' . $lead['number'] . '</td>';
					if($_SESSION['user'] == $lead['name'])
					{
						$statement="Good Job ! Your are in the top 5" ;
					}
				
				echo '</tr>';
			}

			echo "</table>"; ?>
									
				<br/>
					<?php
						echo $statement; ?>
								
								</div>
							<!-- /.panel-body -->
							</div>
						<!-- /.panel -->
						</div>
			</div>
		
		
		
            <div class="row">
				
					
						<div class="col-lg-6">
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-bar-chart-o fa-fw"></i> Standard Drink Trend (<a href="records.php">more details</a>)
								 
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
									   <div id="morris-line-chart"></div>
								   
								</div>
							<!-- /.panel-body -->
							</div>
						<!-- /.panel -->
						</div>
						
						
						
						<div class="col-lg-6">
								<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-bar-chart-o fa-fw"></i> Expenditure Trend (<a href="records.php">more details</a>)
								 
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
									   <div id="morris-cost-chart"></div>
								   
								</div>
							<!-- /.panel-body -->
							</div>
						</div>
						
					
		    </div>
        
			
			
			
						
            <!-- /.row -->
			
		
        <div class="row">
            <div class="panel-body">						
                           <!---chart place----->
				<?php	
					$rt = mysql_query("SELECT DATE(`recorded_time`) AS drink_date,ROUND(SUM(`std_drink`),1) AS Stand_drink FROM user_drink WHERE `user_id` = '$cid' GROUP BY DATE(`recorded_time`) ORDER BY user_drink_id DESC LIMIT 20") ;
					$data_array = array();
					while($rowx = mysql_fetch_assoc($rt)) {
						$data_array[] = $rowx;								
					}
					//echo json_encode($data_array);
					
					
					$cost_chart_query = mysql_query("SELECT DATE(`recorded_time`) AS drink_date,ROUND(SUM(`cost`),1) AS cost_money FROM user_drink WHERE `user_id` = '$cid' GROUP BY DATE(`recorded_time`) ORDER BY user_drink_id DESC LIMIT 20") ;
					$cost_array = array();
					while($rowcost =  mysql_fetch_assoc($cost_chart_query)) {
						$cost_array[] = $rowcost;								
					}
					//echo jsson_encode ($cost_array);
					
					
				/* 	$total_cost = mysql_query("SELECT Week(`recorded_time`) AS Week, sum(`cost`) AS Cost from user_drink WHERE `user_id` = '$cid' GROUP BY Week(`recorded_time`)");
					$total_cost_array = array();
					while($weeklycost =  mysql_fetch_assoc($total_cost)) {
						$total_cost_array[] = $weeklycost;								
					} */
					
				?>
				<script> 
					Morris.Line({
						// ID of the element in which to draw the chart.
						element: 'morris-line-chart',
						// Chart data records -- each entry in this array corresponds to a point
						// on the chart.
						data: <?php echo json_encode($data_array);?>,
								 
						// The name of the data record attribute that contains x-values.
						xkey: 'drink_date',
								 
						// A list of names of data record attributes that contain y-values.
						ykeys: ['Stand_drink'],
								 
						// Labels for the ykeys -- will be displayed when you hover over the
						// chart.
						labels: ['Stand drink'],
						lineColors: ['#0b62a4'],
						xLabels: 'day',
						goals: [2.0,],
						goalLineColors: ['red'],
						goalLabels:['Health standard drink per day'],
						// Disables line smoothing
						smooth: true,
						resize: true
						});
				</script>
				
				
				
	<!--cost---->
			<script> 
					Morris.Line({
						// ID of the element in which to draw the chart.
						element: 'morris-cost-chart',
						// Chart data records -- each entry in this array corresponds to a point
						// on the chart.
						data: <?php echo json_encode($cost_array);?>,
								 
						// The name of the data record attribute that contains x-values.
						xkey: 'drink_date',
								 
						// A list of names of data record attributes that contain y-values.
						ykeys: ['cost_money'],
								 
						// Labels for the ykeys -- will be displayed when you hover over the
						// chart.
						labels: ['cost $'],
						lineColors: ['#0B3B0B'],
						xLabels: 'day',
						
						// Disables line smoothing
						smooth: true,
						resize: true
						});
						
						
						
		<!--weeky cost bar chart->
		/* 	Morris.Bar({
			 element: 'cost-barchart',
			 data:<?php echo json_encode($total_cost_array);?>,
			 xkey: 'Week',
			 ykeys: ['Cost'],
			 barColors: ["#669900", "#B29215"],
			 labels: ['Cost:$'],
			 
			 smooth: true,
			 resize: true
			}); */
						
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
