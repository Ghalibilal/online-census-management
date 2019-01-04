<?php

 $delete=$_GET['delete'];
 include_once('connection.php');
 $sql="DELETE FROM message WHERE id='$delete'";
 if(mysqli_query($conn,$sql))
 {
      echo "<script>alert('Successfully deleted message')</script>";
      header("refresh:0;url='inbox.php'");
 }
 else
 {
 	echo mysqli_error($conn);
 	header("refresh:1;url='inbox.php'");
 }










?>