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
	$relation=strtolower($_POST['relation']);
	 $head_id=$_POST['head_id'];


	
	 $job=$_POST['job'];
	 $education=$_POST['education'];
	 $date=date("Y-m-d");
	  
	  if(empty($name) || !preg_match("/^[a-zA-Z\s]+$/",$name)){
		echo '<font color="red">Please fill  the field  Name.Name must contain alphabet </font>';
	
		exit();
	}
	if(empty($father_name) || !preg_match("/^[a-zA-Z\s]+$/",$father_name)){
		echo '<font color="red">Please fill  the field  Father Name. Father Name must contain alphabet</font> ';
		
		exit();
	}
	if(!empty($cnic)){
	if(!preg_match("/^[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}$/",$cnic))
	{
		echo '<font color="red">CNIC must contain 12203-4449404-1 this format </font>';
		
		exit();
	}
}
	if($birthday>$date){
	 echo '<font color="red">Please enter correct birthday </font>';
		
		exit();	
	}
	
	
	if (!empty($name)||!empty($father_name)||!empty($cnic)||!empty($cnic)||!empty($date)) {
		$sql = "UPDATE people SET name='$name',fatherName='$father_name',cnic='$cnic',gender='$gender', age='$birthday',martial_status='$martial_status',religion='$religion',tongue='$tongue',qualification='$qualification',job='$job',education_status='$education' WHERE serial_no='$update_id'";
	}

if (mysqli_query($conn, $sql)) {
	$query="UPDATE family SET relation_head='$relation' WHERE family_id='$update_id' ";
	if (mysqli_query($conn, $query)) {
		# code...
    echo "record Updated successfully.......<br>";
    echo "<script>alert('record updated')</script>";
    header("refresh:1;url='../family_view.php?h_id=$head_id'");
}
else
{
	echo "ERROR: ".mysqli_error($conn);
}
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