
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
        <li  class="active"> 


  <a href=""><?php 
         include_once('connection.php');
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='admin@census.com'";
$result = mysqli_query($conn, $sqll);

if(mysqli_num_rows($result)>0){
echo "<span class='badge'>".mysqli_num_rows($result)."</span>";

} else{

}
?>Message <span class="glyphicon glyphicon-envelope"></span></a></li>


        <li><a href="change_pwd.php">change password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    <div class="rightside">
     
       
       <div class=' col-sm-8'>
         <ul class="nav nav-pills" style='margin-left:100px;'>
  <li class="active"><a href="#"> <span class="glyphicon glyphicon-inbox"></span>  Inbox</a></li>
  <li ><a href="message.php" style='border:1px solid black;border-radius:50%;padding:10px;'> <span class="glyphicon glyphicon-plus"></span>Compose</a></li>
  
</ul>
<h3>Unread Messages</h3>
 <table style='height:auto;' class="table table-striped table-bordered  text-capitalize bg-info text-primary">
       
    

      
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Sender</th>
        <th>sender Email</th>
        <th>Read it</th>
         <?php 
         include_once('connection.php');
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='admin@census.com'";
$result = mysqli_query($conn, $sqll);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $id=$row['id'];
      static $i=0;
      $i++;
          
       ?>
    <tbody>
      <tr>
      
        <td><?php echo $i;?></td>
         <td><?php echo $row['subject'];?></td>
           <td><?php echo $row['sender'];?></td>
        <td><?php echo $row['sender_email'];?></td>
      
        <td ><a class='btn btn-danger' href="reading.php?view=<?php echo $row['id'];?>">Read it</a></td>
      

    <?php }} ?>
       

      </tr>
    </table>
    <h3>Read messages</h3>
    <table class='table table-bordered table-striped'>
      <tr>
        <td>Email</td>
        <td>Sender</td>
        <td colspan='2'>Message</td>
        <td>Reply</td>
        <td>Delete</td>
      </tr>  
    <?php 
     include_once('connection.php');
         if(isset($_GET['page']))
      {
        $page=$_GET['page'];
      }
      else
      {
        $page=1;
      }
      if($page==''|| $page==1){
        $page1=0;
      }
      else
      {
        $page1=($page*5)-5;
      }
      
      $sql = "SELECT * from message where reading='on' and reciever_email='admin@census.com' order by id DESC LIMIT ".$page1.",5";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $id=$row['id'];
      ?>
    <tbody>
      <tr>
      
       

        <td><?php echo $row['sender_email'];?></td>
        <td><?php echo $row['sender'];?></td>
         <td colspan='2'><?php echo $row['message'];?></td>
        <td><a class='btn btn-success' href="reply.php?view=<?php echo $row['sender_email'];?>">Reply</a></td>
         <td><a class='btn btn-danger' href="deletesms.php?delete=<?php echo $id;?>">Delete</a></td>
        

      
      
      </tr>
      <?php     }
} else {
    echo "0 results";
}
?>
 </tbody>
  </table>

  <?php
 $sql = "SELECT * FROM message where reading='on' and reciever_email='admin@census.com' ";
$data=mysqli_query($conn,$sql);
$record=mysqli_num_rows($data);
$record_pages=ceil($record/5);
$prev=$page-1;
$next=$page+1;
echo "<ul class='pagination'>";
if($prev>=1)
{
   echo '<li><a href="?page='.$prev.'">prev</a></li>';
}

if($record_pages>=2){
  for ($i=1; $i <=$record_pages ; $i++) { 
   
    echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
    # code...
  }
}
if($next<=$record_pages&&$next>=2)
{
   echo '<li><a href="?page='.$next.'">next</a></li>';
}
echo "</ul>";
mysqli_close($conn);

?>
</div>
      









    </div>
  </body>
  </html>
 










  