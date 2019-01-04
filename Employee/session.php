<?php
// Establishing Connection with Database
$connection = mysqli_connect("localhost", "root", "","CENSUS");
// Selecting Database

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"select * from employee where cnic='$user_check'");

$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['cnic'];
if(!isset($login_session)){

	
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
//SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='lower dir'
}
?>