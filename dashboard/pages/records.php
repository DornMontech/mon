<?php
ob_start();
	session_start();
	require_once '../../db/dbconn.php';
	
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	else
	{
	$res=mysql_query("SELECT * FROM clients WHERE cname= '".$_SESSION['user']."'");

	$userRow=mysql_fetch_array($res);
	}
	
	$cid = $userRow["cid"];
	
	$num_rec_per_page=10;	
	if (isset($_GET["page"])){ 
		$page  = $_GET["page"]; 
	}
	else { 
		$page=1; 
		} 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	
	$query = "SELECT * FROM user_drink WHERE user_id ='".$cid."' LIMIT $start_from, $num_rec_per_page";
	$records = mysql_query($query);
	
	
	
	

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Safe-Meter</title>

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
                    <h1 class="page-header">Drinking Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                       	<table class = "table">  
  <tr><th>Drink Name</th>
  <th>Drink Type</th>
  <th>Quantity</th>
  <th>Container</th>
  <th>Standard drink</th>
  <th>Cost</th>
  <th>Record Time</th>
  </tr>
	<?php
	
while ($record = mysql_fetch_assoc($records)) {
    echo '<tr>';
   
        echo '<td>' . $record['drink_name'] . '</td>';
		echo '<td>' . $record['drink_type'] . '</td>';
		echo '<td>' . $record['qty'] . '</td>';
		echo '<td>' . $record['ml'] .'ml</td>';
		echo '<td>' . $record['std_drink'] .'</td>';
		echo '<td>' . '$' . $record['cost'] .'</td>';
		echo '<td>' . $record['recorded_time'] . '</td>';
    
    echo '</tr>';
}

echo "</table>"; 

	echo "<br/> ";
$sql = "SELECT * FROM user_drink WHERE user_id ='".$cid."'"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='records.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='records.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='records.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
<!--Close the table in HTML--->
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
