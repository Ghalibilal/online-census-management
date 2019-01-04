<?php
include_once('../connection.php');
$update_id=$_GET['edit_he'];

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$father_name=$_POST['father_name'];
	$cnic=$_POST['cnic'];
	$gender=strtolower($_POST['gender']);
	$birthday=$_POST['birthday'];
	$martial_status=strtolower($_POST['martial_status']);
	$religion=strtolower($_POST['religion']);
	$tongue=strtolower($_POST['tongue']);
	$qualification=strtolower($_POST['qualification']);
	
	
	 $job=$_POST['job'];
	 $education=$_POST['education'];
	
	if (!empty($name)||!empty($father_name)||!empty($cnic)||!empty($cnic)||!empty($date)) {
		$sql = "UPDATE people SET name='$name',fatherName='$father_name',cnic='$cnic',gender='$gender', age='$birthday',martial_status='$martial_status',religion='$religion',tongue='$tongue',qualification='$qualification',job='$job',education_status='$education' WHERE serial_no='$update_id'";
	}

if (mysqli_query($conn, $sql)) {
    echo "record Updated successfully.......<br>";
    echo "<script>alert('record updated')</script>";
    header("refresh:1;url='../peopleView.php'");
} 
else {
    echo "Error: "."<br>" . mysqli_error($conn);
    echo "<script>alert('fill all field')</script>";
    header("refresh:1;url='edit_head.php'");
}
}

		
	
	else
	{
		echo "Please enter all field";
	}














?>