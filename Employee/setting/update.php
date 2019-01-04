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
	$email=strtolower($_POST['email']);
	$phone=$_POST['phone'];
	$password=rand(10000,99999);

	if (!empty($name)||!empty($father)||!empty($cnic)||!empty($area)||!empty($phone)||!empty($password)) {
		$sql = "UPDATE employee SET name='$name',father_name='$father_name',cnic='$cnic',area='$area', tehsil='$tehsil',district='$district',province='$province',email='$email',phone='$phone',password='$password' WHERE id='$update_id'";

if (mysqli_query($conn, $sql)) {
    echo "record Updated successfully.......<br>";
    echo "<script>alert('record updated')</script>";
    header("refresh:3;url='../employee.php'");
} else {
    echo "Error: "."<br>" . mysqli_error($conn);
    echo "<script>alert('fill all field')</script>";
    header("refresh:3;url='../employee.php'");
}
}

		
	
	else
	{
		echo "Please enter all field";
	}

}











?>