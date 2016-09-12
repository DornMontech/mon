<?php
	ob_start();
	session_start();
	require_once 'db/dbconn.php';
	
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
?>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "safeo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 $cid = $userRow['cid'];
 
// Escape user inputs for security
$drinkName = mysqli_real_escape_string($link, $_POST['drinkName']);
$drinkType = mysqli_real_escape_string($link, $_POST['drinkType']);
$qty = mysqli_real_escape_string($link, $_POST['qty']);
 
// attempt insert query execution
$sql = "INSERT INTO user_drink (user_id,drink_name, qty,drink_type,drink_cost,recorded_time) VALUES ('$cid', '$drinkName','$qty', '$drinkType',0,now())";
if(mysqli_query($link, $sql)){
    echo "Records added successfully. Back in 3 seconds";
	
	header( "refresh:3;url=home.php" );
	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>