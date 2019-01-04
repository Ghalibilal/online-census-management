<?php
$id=$_GET['id'];
include_once('../connection.php');
$query="UPDATE people SET death_status='No'";
if(mysqli_query($conn,$query)){

$sql="DELETE FROM death WHERE id='$id'";
if(mysqli_query($conn,$sql))
{
   echo "<script>
   alert('death record has been deleted');
function goBack() {
    window.history.back();
}
goBack();
</script>";
}
else
{
	echo "Error: ".mysqli_error($conn);
}

}
else
{
       echo "Error: ".mysqli_error($conn);	
}






?>