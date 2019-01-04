<?php
include_once('session.php');
include_once('connection.php');
$delete_id=@$_GET['delete'];
$sql="SELECT * FROM people WHERE emp_id='$delete_id'";
if($res=mysqli_query($conn,$sql))
{
	if(mysqli_num_rows($res)>0)
	{
		
      
      echo "<h3><script>alert('Not deleted.Edit it to change the employee')</script></h3>"; 
      header("refresh:0;url='emp_view.php'"); 
	}
	else
	{
	    $sql="DELETE FROM employee WHERE id='$delete_id'";
	    if(mysqli_query($conn,$sql)){
           echo "<script>alert('Deleted Successfully')</script>"; 
      header("refresh:0;url='emp_view.php'"); 
	    }	
	    else
	    {
	    	echo "error".mysqli_error($conn);
	    }
		
	}
}
else{
	echo mysqli_error($conn);
}









?>