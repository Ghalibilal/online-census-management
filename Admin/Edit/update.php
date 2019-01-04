<?php
include_once('../connection.php');
$update_id=$_GET['edit_id'];

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$father_name=$_POST['father_name'];
	$cnic=$_POST['cnic'];
	$area=strtolower($_POST['area']);
	$tehsil=strtolower($_POST['tehsil']);
	$district=strtolower($_POST['district']);
	$province=strtolower($_POST['province']);
	$region=strtolower($_POST['region']);
	
	$email=strtolower($_POST['email']);
	$phone=$_POST['phone'];
	$password=rand(100000,999999);
	if(empty($name) || !preg_match("/^[a-zA-Z\s]+$/",$name)){
		echo '<font color="red">Please fill  the field  Name.Name must contain alphabet </font>';
	
		exit();
	}
	if(empty($father_name) || !preg_match("/^[a-zA-Z\s]+$/",$father_name)){
		echo '<font color="red">Please fill  the field  Father Name. Father Name must contain alphabet</font> ';
		
		exit();
	}
	if(empty($cnic) || !preg_match("/^[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}$/",$cnic))
	{
		echo '<font color="red">Please fill  the field  CNIC.CNIC must contain 12203-4449404-1 this format </font>';
		
		exit();
	}
	if(empty($area))
	{
		echo '<font color="red">Please fill  the field Area</font>';
	
		exit();
	}
	if (!empty($email) &&!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<font color='red'>Invalid email format</font>"; 

		exit();
}
	if(empty($phone) || !preg_match("/^[0]{1}[3]{1}[0-4]{1}[0-9]{8}$/",$phone))
	{
		echo '<font color="red">Please fill  the field Phone.Phone must contain 03489089697 format</font>';
	
		exit();
	}
	

	if (!empty($name)||!empty($father)||!empty($cnic)||!empty($area)||!empty($phone)) {
		include_once('../PHPMailer/index.php');
		$sql = "UPDATE employee SET name='$name',father_name='$father_name',cnic='$cnic',area='$area', tehsil='$tehsil',district='$district',province='$province',region='$region',email='$email',phone='$phone',password='$password' WHERE id='$update_id'";

if (mysqli_query($conn, $sql)) {
    echo "record Updated successfully.......<br>";
    echo "<script>alert('record updated')</script>";
    header("refresh:0;url='../emp_view.php'");
} else {
    echo "Error: "."<br>" . mysqli_error($conn);
    echo "<script>alert('fill all field')</script>";
    header("refresh:1;url='../admin.php'");
}
}

		
	
	else
	{
		echo "Please enter all field";
	}

}












?>