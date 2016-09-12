<?php
   ob_start();
   session_start();
   
   ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Safe-Meter project">
    <meta name="author" content="dorn">
   

    <title>Safe-Meter</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="boost/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>



		html {
			font-family: "Lucida Sans", sans-serif;

		}
		}


		</style>
		
	<style type="text/css">
		.bs-example{
			margin: 20px;
		}
		.modal-content iframe{
			margin: 0 auto;
			display: block;
		}
	</style>
	
</head>



<!-- NAVBAR
================================================== -->
  <body>
    <nav class="navbar navbar-inverse">
                 <?php
					include 'nav.php';
				?>
        </nav>
		
		
		<!--------------->



<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<p>
				 &nbsp;<br/></p>
				 
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column">
					<div class="row clearfix">
						<img src="logo.png" align="center"/> 
					</div>
				</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
		</div>	 
	
<div class="container">
	<div class="row clearfix">
		<div class="col-md-1 column">
		</div>
		<div class="col-md-10 column">
			<div class="page-header">
				<h4>
					 Safe-Meter aims to improve users well-being by helping you to evaluate and track your alcohol consumption
				</h4>
			</div>
		</div>
		<div class="col-md-1 column">
		</div>
	</div>
	
	<p>
					 
			</p>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="res/pic/alcohol3.jpeg" />
						<div class="caption">
							<h3>
								&nbsp;<br/>
								Drink Limit & List to Avoid
							</h3>
							<p>
								It will evaluate your risk health according to your regular drinks.
								&nbsp;<br/>
								Also, it will provide you with a drink list to avoid in case that you have drunk too much lately!
								&nbsp;<br/>
								&nbsp;<br/>
							</p>
						
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="res/pic/coins.jpg"  />
						<div class="caption">
							<h3>
								Track your Savings 
							</h3>
							<p>
								You can store the drinks you have consumed and your savings!
								&nbsp;<br/>
								&nbsp;<br/>
								<h5 style="color:LightGray;">Function available on Mid Septemer!</h5>
							</p>
							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="res/pic/drinking.jpeg" />
						<div class="caption">
							<h3>
								Track your health
							</h3>
							<p>
								According to your consumption, you can get information about what might be affecting your health or improving it!
								&nbsp;<br/>
								
								<h5 style="color:LightGray;">Function available on Mid Septemer!</h5>

							</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-4 column">
		</div>
		<div class="col-md-6 column">

			<div class="bs-example">
				<!-- Button HTML (to Trigger Modal) -->
				<a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Watch Safe-Meter Video</a>
				
				<!-- Modal HTML -->
				<div id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Safe-Meter</h4>
							</div>

							<div class="modal-body">
								<iframe id="cartoonVideo" width="560" height="315" src="https://www.youtube.com/embed/3sAy5fSN2UI" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>    
		</div
		<div class="col-md-2column">
		</div>
	</div>



      <!-- FOOTER -->
       <?php
	  include 'footer.php';
	  ?> 
</body>
		<script type="text/javascript">
	$(document).ready(function(){
		/* Get iframe src attribute value i.e. YouTube video url
		and store it in a variable */
		var url = $("#cartoonVideo").attr('src');
		
		/* Assign empty url value to the iframe src attribute when
		modal hide, which stop the video playing */
		$("#myModal").on('hide.bs.modal', function(){
			$("#cartoonVideo").attr('src', '');
		});
		
		/* Assign the initially stored url back to the iframe src
		attribute when modal is displayed again */
		$("#myModal").on('show.bs.modal', function(){
			$("#cartoonVideo").attr('src', url);
		});
	});
	</script>
</html>
