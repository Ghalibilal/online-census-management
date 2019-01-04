<?php
include_once('../session.php');
include_once('../connection.php');



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
	 $date=date("Y-m-d");
	
	 $job=$_POST['job'];
	 $education=$_POST['education'];
	 $relation=$_POST['relation'];
	 
	 $employee_cnic=$_SESSION['login_user'];

	 $sqll="SELECT id FROM employee where cnic='$employee_cnic'";
	 $result=mysqli_query($conn,$sqll);
	 while ($row=mysqli_fetch_assoc($result)){
	 $emp_id=$row['id'];
	}
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
	  $sqll="SELECT cnic FROM people WHERE cnic='$cnic'";
	     $ress=mysqli_query($conn,$sqll);
	     if(mysqli_num_rows($ress)>0|| !preg_match("/^[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}$/",$cnic))
	     {
	     	echo '<font color="red">This cnic is already register, enter correct cnic</font>';
	     
		exit();
	     }
}
	if($birthday>$date){
	 echo '<font color="red">Please enter correct birthday </font>';
		
		exit();	
	}

	 
	if (!empty($name)||empty($father)||empty($birthday))
	 {
		if($birthday<=$date)
		{
                

		$sql = "INSERT INTO people (name, fatherName,gender,cnic,age,martial_status,religion,tongue,qualification,job,education_status,emp_id)
		VALUES ('$name', '$father_name','$gender','$cnic','$birthday','$martial_status','$religion','$tongue','$qualification','$job','$education','$emp_id')";


if (mysqli_query($conn, $sql)) 
{     
	 $h_id=$_GET['h_id'];
	 $last_id = mysqli_insert_id($conn);
	 $sqa="INSERT INTO family(family_id,head_id,relation_head) VALUES('$last_id','$h_id','$relation')";
	if(mysqli_query($conn,$sqa)){
		
	}
	else{
		 echo "Error: "."<br>" . mysqli_error($conn);
	}

	    
    echo "<script>alert('New member has added')</script>";
      header("refresh:0;url='../family_view.php?h_id=$h_id'");

   
    	

    
    
   


 

}


 else
  {
    echo "Error: "."<br>" . mysqli_error($conn);
    echo "<script>alert('fill all field')</script>";
  //  header("refresh:3;url='admin.php'");
}
}

else{
	echo "birthday must be less or equal to current date";
}
}
}


		
	
	else
	{
		
	}














?>