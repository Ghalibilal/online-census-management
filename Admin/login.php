

<?php
include("connection.php");

session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['cnic']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$cnic=$_POST['cnic'];
$password=$_POST['password'];
// Establishing Connection with Database server

// To protect MySQL injection for Security purpose
$cnic = stripslashes($cnic);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn,$cnic);
$password = mysqli_real_escape_string($conn,$password);
// Selecting Database

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($conn,"select * from admin where password='$password' AND cnic='$cnic'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$cnic; // Initializing Session
header("location: admin.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>