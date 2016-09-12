<?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php");
}
require_once 'db/dbconn.php';

if(isset($_POST['btn-signup'])) {
  
 $uname = trim($_POST['username']);
 $email = trim($_POST['email']);
 $upass = trim($_POST['pwd']);
 
 $gender = trim($_POST['gender']);
 $weight = trim($_POST['weight']);
 $dob = trim($_POST['dob']);
 
 
 $uname = strip_tags($uname);
 $email = strip_tags($email);
 $upass = strip_tags($upass);
 
 $gender = strip_tags($gender);
 $weight = strip_tags($weight);
 $dob = strip_tags($dob);
 
 // password encrypt using SHA256();
 $password = hash('sha256', $upass);
 
 // check email exist or not
 $query = "SELECT cname FROM clients WHERE cname='$uname'";
 $result = mysql_query($query);
 
 $count = mysql_num_rows($result); // if username not found then proceed
 
 if ($count==0) {
  
	  $query = "INSERT INTO clients(cname,cemail,cpassword,dob,gender,weight,reg_date,target_no) VALUES('$uname','$email','$password','$dob','$gender','$weight',now(),0)";
	  $res = mysql_query($query);
	  
	  if ($res) {
	   $errTyp = "success";
	   $errMSG = "successfully registered, you may login now";
	   header("refresh:3;url=login.php");
	  } else {
	   $errTyp = "danger";
	   $errMSG = "Something went wrong, try again later..."; 
	  } 
   
 }
 else {
  $errTyp = "warning";
  $errMSG = "Sorry username already in use ..."; 
 }
 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Safe-Meter Registration System</title>
<!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
	
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
    <script src="boost/docs/assets/js/ie-emulation-modes-warning.js"></script>
	<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    
	changeYear: true,
	changeMonth:true,
	dateFormat: "yy-mm-dd",
	yearRange: "1900:2012",
	defaultDate:'1900-01-01'
	
});
	
  } );
  </script>
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
                        <a class="navbar-brand" href="index.php">Safe-O-Meter</a>
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


<!--------------------->
<div class="container">

 <div id="login-form">
    <form method="post" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="">One more step to your health</h2>
            </div>
			
			   <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
			
			
			
		<table class="table">
			<tr>
				<td><div class="form-group">
				    <label>Username:</label>
					<input type="text" name="username" minlength="4" maxleng = "16" required /></div></td>
				<td><div class="form-group">
				<label>Gender:</label><br/>
				<select name = "gender">
					  <option value="male">male</option>
					  <option value="female">female</option>					 
					</select></div>
				</td>
			</tr>
				
			<tr>
				<td>
				<div class="form-group">
				<label data-toggle="tooltip" title="Input your weight in kilos">Weight(kg):</label><br/>
				<select name="weight">
					<?php
						for ($i=10; $i<=500; $i++)
						{
							?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php
						}
					?>
				</select>
				    </div></td>
				<td>
				<div class="form-group">
				<label data-toggle="tooltip" title="Choose your birthday via calendar">DOB:</label><br/>
					<input type="text" id="datepicker" name="dob" readonly="readonly" required />
				</div>
				</td>
			</tr>
			
			<tr >
				<td><div class="form-group">
				    <label>Email:</label>
					<input type="email" name="email" id ="uemail" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required placeholder="Enter a valid email address" /></div></td>
				<td></td>
			</tr>
			
            
			<tr class="form-group">
				<td><div class="form-group">
				    <label>Password:</label>
					<input type="password" id = "mypassword" name="pwd" minlength="4" maxlength="20" required /></div>
					</td>
				<td><label>Confirm Password:</label><input type="password" id = "confirm_password" name="cpwd" required /></td>
				</td>
			</tr>
			
			<tr class="form-group">
				<td>
			<div class="form-group">
             <button type="reset" class="btn btn-block btn-primary" name="btn-cancel">Cancel</button></div></td>
				<td><div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Submit</button>
            </div></td>
			</tr>
            
            </table>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="login.php">Sign in Here...</a>
            </div>
        </form>
        </div>
   
    
    </div> 
</div>

<script>
	var password = document.getElementById("mypassword")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>





</body>
</html>