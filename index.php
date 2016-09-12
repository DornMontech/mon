# mon
<?php
	ob_start();
	session_start();		
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Safe-Meter project">
    <meta name="author" content="dorn">
    <link rel="icon" href="ico.png"> 

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
  </head>
<!-- NAVBAR
================================================== -->
  <body background="res/pic/bottle.png">
    <nav class="navbar navbar-inverse">
                <?php
					include 'nav.php';
				?>
        </nav>

     
    
      <!-- Body   
    ================================================== -->
    <div class="row clearfix">
		<div class="col-md-1 column">
		</div>
		<div class="col-md-10 column" align = "center">
		 <h1>
		 	<font face="rockwell" color = "white">
		 	Worried about having too many drinks?
		 	</font>
		  </h1>
		  <h2>
		  	<font face="rockwell" color = "white">
				Safemeter can help you to…
				&nbsp;<br/>
				&nbsp;<br/>
				&nbsp;<br/>
				&nbsp;<br/>
				</font>
			</h2>
		</div>
		<div class="col-md-1 column">
		
		</div>
	</div>
	


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="res/pic/alcohol4.jpeg" alt="Generic placeholder image" width="140" height="140">
          <h2><font face="rockwell" color = "white"> Drink Limit</h2>
          <p>Evaluate your health risk <br/>and calories consumed <br/>according to your regular drinks</font></p>
          <p><a class="btn btn-default" href="suggest.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="res/pic/salut.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2><font face="white" color = "white">BAC</h2>
          <p>Not sure if you exceed the limit? <br/>Calculate your average BAC</font><br/>
          <font face="rockwell" color = "white">Available on Oct 2016 </font></p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="res/pic/chart.png" alt="Generic placeholder image" width="140" height="140">
          <h2><font face="rockwell" color = "white">Track & Goals</h2>
          <p>Do not wait more and start tracking <br/>your drinks and money. <br/>Also set your goals!</font></p>
          <p><a class="btn btn-default" href="dashboard/pages/index.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      

	<!-- /.Body -->
	</div>


      <!-- FOOTER -->
       <?php
	  include 'footer.php';
	  ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="boostrap/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
