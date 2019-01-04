<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMPLOYEE VIEW</title>
  
  <?php include_once('ad_material/main_style.php');?>
</head>
<body>
  <footer class="container-fluid text-center ">
  <p>Admin Dashboard</p>
</footer>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <br>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="admin.php">Insert Employee</a></li>
        <li ><a href="emp_view.php">View Employee</a></li>
        <li ><a href="peopleView.php">View People</a></li>
        <li><a href="individualView.php">View Individual people</a></li>
        <li><a href="deathView.php">Death Information</a></li>
        <li><a href="birthView.php">Birth Information</a></li>
        <li  class="active"><a href="inbox.php"><?php 
         include_once('connection.php');
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='admin@census.com'";
$result = mysqli_query($conn, $sqll);

if($no=mysqli_num_rows($result)>0){
echo "<span class='badge'>".mysqli_num_rows($result)."</span>";


} else{
  
}
?>Message <span class="glyphicon glyphicon-envelope"></span></a></li>


        <li><a href="change_pwd.php">change password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    <div class="rightside">
     
       
       <div class='col-sm-8'>
         <ul class="nav nav-pills" style='margin-left:100px;'>
  <li class="active"><a href="inbox.php"> <span class="glyphicon glyphicon-inbox"></span>  Inbox</a></li>
  <li ><a href="message.php" style='border:1px solid black;border-radius:50%;padding:10px;'> <span class="glyphicon glyphicon-plus"></span>Compose</a></li>
  
</ul>
<?php  $id=@$_GET['view'];
 include_once('connection.php');
$sql="SELECT * FROM message Where id='$id'";
 if($res=mysqli_query($conn,$sql)){
 while($row=mysqli_fetch_assoc($res)){

   $message=$row['message'];
   $sender=$row['sender_email'];
   ?>
   <div style='border:1px solid black;width:320px; height:auto'>
    <table  style='width:320px'>
      
      <tr>
        <td>Message:</td>
        <td><?php echo $message."<br>".$sender."<br>";?></td>
       

      </tr>
      <tr><td></td>
         <td><a class='btn' href="reply.php?view=<?php echo $sender;?>">Reply</a></td>
       </tr>
     </table>
      
   </div> 
   <?php
 }
 $query="UPDATE message SET reading='on' WHERE id='$id'";
 mysqli_query($conn,$query);
 }
 else
 {
  echo "error:".mysqli_error($conn);
 }


?>
       
        
      
       
</div>
</body>
</html>
      