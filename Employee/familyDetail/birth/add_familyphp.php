<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$father_name=$_POST['father_name'];

	$gender=strtolower($_POST['gender']);
	$birthday=$_POST['birthday'];
	$religion=strtolower($_POST['religion']);
	$tongue=strtolower($_POST['tongue']);
	$qualification=strtolower($_POST['qualification']);
	 $date=date("Y-m-d");
	
	
	 $relation=$_POST['relation'];
	 $emp_id=$_POST['emp_id'];
	 $head_id=$_POST['head_id'];
	 
	 
	$date=date("Y-m-d");
	  
	  if(empty($name) || !preg_match("/^[a-zA-Z\s]+$/",$name)){
		echo '<font color="red">Please fill  the field  Name.Name must contain alphabet </font>';
	
		exit();
	}
	if(empty($father_name) || !preg_match("/^[a-zA-Z\s]+$/",$father_name)){
		echo '<font color="red">Please fill  the field  Father Name. Father Name must contain alphabet</font> ';
		
		exit();
	}
	
	if($birthday>$date){
	 echo '<font color="red">Please enter correct birthday </font>';
		
		exit();	
	}

	 
	if (!empty($name)||empty($father)||empty($birthday))
	 {
		if($birthday<=$date)
		{
                

		$sql = "INSERT INTO people (name, fatherName,gender,age,martial_status,religion,tongue,qualification,job,education_status,emp_id)
		VALUES ('$name', '$father_name','$gender','$birthday','unmarried','$religion','$tongue','$qualification','student','student','$emp_id')";


if (mysqli_query($conn, $sql)) 
{     
	 
	 $last_id = mysqli_insert_id($conn);
	 $sqa="INSERT INTO family(family_id,head_id,relation_head) VALUES('$last_id','$head_id','$relation')";
	if(mysqli_query($conn,$sqa)){
		$id=$_GET['id'];
		$sql="DELETE  FROM birth WHERE id='$id'";
		if(mysqli_query($conn,$sql))
		{
			echo "<script>alert('New member has added')</script>";
      header("refresh:0;url='../../family_view.php?h_id=$head_id'");

		}
		else
		{
			echo mysqli_error($conn);
		}
	}
	else{
		 echo "Error: "."<br>" . mysqli_error($conn);
	}

	    
    

   
    	

    
    
   


 

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