<?php
include_once('connection.php');

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
	$sqll="SELECT cnic FROM employee WHERE cnic='$cnic'";
         $ress=mysqli_query($conn,$sqll);
         if(mysqli_num_rows($ress)>0){
            $error='This cnic is already register, enter another cnic';
            header("location:admin.php?error=$error");
        exit();
         }
         
$sqll1="SELECT email FROM employee WHERE email='$email'";
         $ress1=mysqli_query($conn,$sqll1);
         if(mysqli_num_rows($ress1)>0){
            $error='This email is already register, enter another email';
            header("location:admin.php?error=$error");
        exit();
         }
         
	if(empty($name) || !preg_match("/^[a-zA-Z\s]+$/",$name)){
		$error='Please fill  the field  Name.Name must contain alphabet ';
		header("location:admin.php?error=$error");
		exit();
	}
	if(empty($father_name) || !preg_match("/^[a-zA-Z\s]+$/",$father_name)){
		$error='Please fill  the field  Father Name. Father Name must contain alphabet ';
		header("location:admin.php?error=$error");
		exit();
	}
	if(empty($cnic) || !preg_match("/^[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}$/",$cnic))
	{
		$error='Please fill  the field  CNIC.CNIC must contain 12203-4449404-1 this format ';
		header("location:admin.php?error=$error");
		exit();
	}
	if(empty($area))
	{
		$error='Please fill  the field Area';
		header("location:admin.php?error=$error");
		exit();
	}
	if (!empty($email) &&!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error = "Invalid email format"; 
  header("location:admin.php?error=$error");
		exit();
}
	if(empty($phone) || !preg_match("/^[0]{1}[3]{1}[0-4]{1}[0-9]{8}$/",$phone))
	{
		$error='Please fill  the field Phone.Phone must contain 03489089697 format';
		header("location:admin.php?error=$error");
		exit();
	}
	
		
           
		$sql = "INSERT INTO employee (name, father_name,cnic,area,tehsil,district,province,email,phone,password,region)
		VALUES ('$name', '$father_name', '$cnic','$area','$tehsil','$district','$province','$email','$phone','$password','$region')";

if (mysqli_query($conn, $sql)) {
	 include_once('PHPMailer/index.php');
    echo "New record created successfully.......<br>";
    echo "<script>alert('New record inserted')</script>";
    header("refresh:0;url='admin.php'");
} else {
    echo "Error: "."<br>" . mysqli_error($conn);
    echo "<script>alert('fill all field')</script>";
   header("refresh:1;url='admin.php'");
}

}












?>