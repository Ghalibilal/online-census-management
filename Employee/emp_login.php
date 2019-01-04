<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['cnic']) || empty($_POST['password'])) {
$error = "cnic or Password is invalid";
}
else
{
// Define $username and $password
$cnic=$_POST['cnic'];
$password=$_POST['password'];
// Establishing Connection with Database server
$connection = mysqli_connect("localhost", "root", "","CENSUS");
// To protect MySQL injection for Security purpose
$username = stripslashes($cnic);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$cnic);
$password = mysqli_real_escape_string($connection,$password);
// Selecting Database
$db = mysqli_select_db($connection,"CENSUS");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select * from employee where password='$password' AND cnic='$cnic'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$cnic; // Initializing Session
header("location: employee.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>