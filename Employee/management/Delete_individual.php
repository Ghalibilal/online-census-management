<?php
include_once('../session.php');
include_once('../connection.php');
$delete_id=@$_GET['delete'];

	
	    $sql="DELETE FROM people WHERE serial_no='$delete_id'";
	    if(mysqli_query($conn,$sql)){
	    	$sql1="DELETE FROM individual where individual_id='$delete_id'";
	    	if(mysqli_query($conn,$sql1)){
           echo "<script>alert('Deleted Successfully')</script>"; 
      header("refresh:0;url='../individual/individual_view.php'"); 
	    }
	    	
	    	}
	   

else{
	echo mysqli_error($conn);
}










?>