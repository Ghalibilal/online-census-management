<?php
$id=$_GET['id'];
include_once('../../connection.php');
$sql="DELETE FROM birth WHERE id='$id'";
if(mysqli_query($conn,$sql))
{
   echo "<script>
   alert('birth record has been deleted');
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








?>