<?php

include_once('../connection.php');
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$fatherName=$_POST['father_name'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
    $date=date("Y-m-d");
    $h_id=$_GET['h_id'];
    $employee_cnic=$_SESSION['login_user'];
	$sqll="SELECT id FROM employee where cnic='$employee_cnic'";
	 $result=mysqli_query($conn,$sqll);
	 while ($row=mysqli_fetch_assoc($result))
	 {
	 $emp_id=$row['id'];

	 }
if (!empty($name)&&!empty($fatherName)&&!empty($age))
	 {
		if($age<=$date)
		{
                

		$sql = "INSERT INTO birth(emp_id,head_id,name,father_name,gender,birthday) 
		VALUES(' $emp_id',' $h_id','$name','$fatherName','$gender','$age')";
if (mysqli_query($conn, $sql)) 
{       $h_id=$_GET['h_id'];
	  echo "<script>alert('birth record has updated')</script>";
                 header("refresh:0;url='view_birth.php?h_id=$h_id'");

    
    	

    
    
   


   
		
	}
	else{
		 echo "Error: "."<br>" . mysqli_error($conn);
	}
}
else{
	echo "<font color='red'>birthday must be less or equal to current date</font>";
}
}
else
	{
		echo "<font color='red'>Please enter all field</font>";
	}










}

?>