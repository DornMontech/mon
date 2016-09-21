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
	if (isset($_GET["userid"])){ 
		$view_userid  = $_GET["userid"]; 
		
		$certain_user_query = mysql_query("SELECT * FROM clients WHERE cid= '".$view_userid."'");
		$certain_username = mysql_fetch_array($certain_user_query);
		
	}
	else { 
		header("Location: index.php");
		exit;
		} 

	
	
	$query = "SELECT * FROM target WHERE cid ='".$view_userid."' AND status = '1' ";
	$records = mysql_query($query);
	
	
	//comment insert
	if(isset($_POST['btn-signup'])) {
  
		 $comment = trim($_POST['content']);
		 
		 $post_user = $_SESSION['user'];
			
		 
		 $comment = strip_tags($comment);
		 $comment_length = strlen($comment);
		 
		 
		 if ($comment_length < 100 && $comment_length >0) {
		  
			  $query = "INSERT INTO comment(user_id,post_time,content,post_username) VALUES('$view_userid',now(),'$comment','$post_user')";
			  $res = mysql_query($query);
		 }
		 else {
		  $errTyp = "warning";
		  $errMSG = "The comment should not be empty and no more than 50 characters !"; 
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
                    <h2 class="page-header"><?php echo $certain_username['cname']; ?> Past Target</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       <div class="table-responsive">
                       	<table class = "table">  
							<tr>
								<th>Target Name</th>
								<th>Budget Limit</th>
								<th>Cost</th>
								<th>Achieved Date</th>
								<th>Status</th>
											</tr>
					<?php
					
					while ($record = mysql_fetch_assoc($records)) {
						
						
						 $comments = "<font color = 'green'> Achieved!</green>";
						
						 
						
					echo '<tr>';
				   
						echo '<td>' . $record['target_name'] . '</td>';
						echo '<td> $' . $record['target_money'] . '</td>';
						echo '<td> $' . $record['current_money'] . '</td>';
						echo '<td>' . $record['end_date'] .'</td>';		
						echo '<td>' . $comments .'</td>';
					
					echo '</tr>';
				}

				echo "</table>"; 

				?>

				</div>
				<!--Close the table in HTML--->
                    </div>
                    <!-- /.panel -->
                </div>
				</div>
				
				<!--end row -->
			<div class="row">
                <div class="col-lg-12">   
					
						<form class="form-horizontal" method="post" autocomplete="off">
						  <div class="form-group">
							<label for="comment">Your comment (Max length 100):</label> 
							<input type="text" class="form-control" id="content" name="content" maxlength = "100">
						  </div>
							<button type="submit" class="btn btn-primary" name="btn-signup">Submit Comment</button>
						  
						</form>
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
				<!--end row -->
			<div class="row">
                <div class="col-lg-12">
					
                    <h2 class="page-header">Recently Comments</h2>
						<?php
							//display the comments
							
							$comments_query= mysql_query("SELECT * FROM `comment` WHERE `user_id` = '".$view_userid."' ORDER BY post_time Desc Limit 6");
							
							while ($dis_comment = mysql_fetch_assoc($comments_query)) {
								echo $dis_comment['post_username']. ":" . $dis_comment['content'] ."<hr/>";
							}
						?>
					
                </div>
                <!-- /.col-lg-12 -->
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
