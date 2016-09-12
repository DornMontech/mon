<?php
 ob_start();
 session_start();
 require_once 'db/dbconn.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 if( isset($_POST['btn-login']) ) { 
  
  $username = $_POST['username'];
  $upass = $_POST['pass'];
  
  $username = strip_tags(trim($username));
  $upass = strip_tags(trim($upass));
  
  $password = hash('sha256', $upass); // password hashing using SHA256
  
  $res=mysql_query("SELECT cid, cname, cpassword FROM clients WHERE cname='$username'");
  
  $row=mysql_fetch_array($res);
  
  $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if( $count == 1 && $row['cpassword']==$password ) {
   $_SESSION['user'] = $row['cname'];
   header("Location: dashboard/pages/");
  } else {
   $errMSG = "Wrong password or username, Try again...";
  }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Safe-Meter Login in</title>
<!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="boost/docs/assets/js/ie-emulation-modes-warning.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

 
<nav class="navbar navbar-inverse">
                 <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Safe-Meter</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">  Home</a></li>
                            <li><a href="suggest.php">  Drink Limit  </a></li>
                            <li><a href="about.php"> About  </a></li>
                            <li><a href="dashboard/pages/index.php">  Profile  </a></li> 
              </ul>
			
            </div>
			
          </div>
        </nav>
		
		
		<!--------------->


<!---------------->

<div class="container">

 <div id="login-form">
    <form method="post" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="">Sign in with username and password please</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="username" class="form-control" placeholder="Your username" required />
                </div>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Your Password" required />
                </div>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="register.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
	<p><br></p>
    </div> 

</div>
 <div class="container marketing">
 <!-- FOOTER -->
      <footer>
	  <p><br></p>
        <p>&copy; 2016 MonTech, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->

</body>
</html>