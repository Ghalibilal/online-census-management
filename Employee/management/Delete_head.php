<?php
include_once('../session.php');
include_once('../connection.php');
$delete_id=@$_GET['delete'];
$sql="SELECT * FROM family WHERE head_id='$delete_id'";
if($res=mysqli_query($conn,$sql))
{
	if(mysqli_num_rows($res)>0)
	{
		
      echo mysqli_num_rows($res);
      echo "<h3><script>alert('Not deleted.First delete family member then try again')</script></h3>"; 
      header("refresh:0;url='../people_view.php'"); 
	}
	else
	{
	    $sql="DELETE FROM people WHERE serial_no='$delete_id'";
	    if(mysqli_query($conn,$sql)){
	    	$sql1="DELETE FROM head_family where head_id='$delete_id'";
	    	if(mysqli_query($conn,$sql1)){
           echo "<script>alert('Deleted Successfully')</script>"; 
      header("refresh:0;url='../people_view.php'"); 
	    }
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