<?php

  include_once('Admin/connection.php');
 


  if(isset($_POST['submit']))
  {
    $to=strtolower($_POST['email']);
    $subject=$_POST['name'];
    $message=$_POST['message'];
    $sql="INSERT INTO message(sender_email,reciever_email,subject,message,reading,sender) VALUES('$to','admin@census.com','$subject','$message','off','user')";
    if(mysqli_query($conn,$sql)){
      echo "<script>alert('Message is successfully send');</script>";
      
    }
    else
    {
      echo "ERROR:".mysqli_error($conn);
    }
  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online census</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      
      border-radius:0px;
      background:black;
      border: 0px;

      font-weight: bold;
      font-style: italic;
      font-size: 15px;
      

    }
    .top{
      height:150px;
    }
    
    .navbar ul li a:hover{
      text-decoration: underline;
      
    }
    .bod{
        background:#F8F8F8;
        height: 800px;
    }
    #body{
        background:white;
        height: 500px;

        /*border: 1px solid #2E2E2E;*/
        /*border-radius: 5px;*/

    }
    .cont{
      
       padding: 0px;
       margin: 0px;
    }
    .top{
      background: white;
    }
    footer{
      background:black;
      min-height: 100px;
      

    }
    header{
      min-height: 200px;



    }
    ul li{
      text-transform: uppercase;
    }

    
  </style>
  <script>

</script>
</head>
<body>
  <div class='container-fluid bod'>
   <header class='container top'>
        
  <img src="image/flag1.png"  class="img-responsive">
      </header>   

<nav class="navbar navbar-inverse container">
  
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav ul">
        <li><a  href="index.php"><span class=' glyphicon glyphicon-home'></span>Home</a></li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">Reports
    <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu" >
      <li role="presentation"><a role="menuitem" tabindex="-1" href="employement.php">Employement</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="education.php">Education</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="bdrate.php">Birth & Death Rate</a></li>
      
    </ul>
  </a></li>
       
        <li><a href="#">About Us</a></li>
        <li class='active'><a href="#">Contact</a></li>
        <li><a href="population.php">Population census 2018</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="Employee/index.php"> Employee login<span class="glyphicon  glyphicon-log-in"></span></a></li>
        
      </ul>
    
  
</nav>
 <div class="container" id="body">
          <div class="contact_form row">

         <div class="col-sm-6 col-md-6 col-xm-2 col-md-offset-3">
          <h1 style="font-family: Italic;">Hello</h1>
            <h2 style="font-family: Italic;">We are always ready to serve you</h2>
            <form id="contact_form" method="post" action="">
            <input type="text" name="name" class="form-control" placeholder="your name" pattern="[A-Za-z\s]+" required><br>
             <input type="email" name="email" class="form-control" placeholder="your email" required><br>
             <textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea></br>
             <input type="submit" name="submit" class="form-control submit btn btn-success" value="Send Message">
            
          </form>
          
         </div>
        </div>
 
      
  

  




</body>
</html>  