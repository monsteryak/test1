<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
$userprofile = $_SESSION['username'];

if ($userprofile==true) {
	
}
else{
	header('location:login.php');
}


$query = "SELECT * FROM users WHERE username='$userprofile'";
$results = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($results);

?>
<h1><?php echo "Welcome"." ".$data['fname']." ".$data['lname'] ; ?></h1>