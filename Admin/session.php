<?php
// Establishing Connection with Database
include('connection.php');
// Selecting Database

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn,"select cnic from admin where cnic='$user_check'");

$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['cnic'];
if(!isset($login_session)){

	
mysqli_close($conn); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>