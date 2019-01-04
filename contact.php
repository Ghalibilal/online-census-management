
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online census</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="contact_style.css">
  
</head>
<body>


  <div class="container text-center">
      <span><img src="image/census.jpg" height="50px"></span>   <h4 style="color: white;">Online Census</h4>      
     

</div>
    <div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Online Census</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">Reports
    <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu" >
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Employement</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Education</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Birth Rate</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Death Rate</a></li>
    </ul>
  </a></li>
        <li><a href="#">Jobs</a></li>
        <li><a href="about.php">About Us</a></li>
        <li class="active"><a href="contact.php">Contact</a></li>
        <li><a href="#">Population 2018</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="Employee/index.php"> Employee login<span class="glyphicon  glyphicon-log-in"></span></a></li>
        
      </ul>
    </div>
  </div>
</nav>
        <div class="contact-title">  
            <h1 style="font-family: Italic;">Hello</h1>
            <h2 style="font-family: Italic;">We are always ready to serve you</h2>
            
        </div >
        <div class="contact_form row">
         <div class="col-sm-4 col-md-4 col-xm-2 col-md-offset-4">
            <form id="contact_form" method="post" action="">
            <input type="text" name="name" class="form-control" placeholder="your name" pattern="[A-Za-z\s]+" required><br>
             <input type="email" name="email" class="form-control" placeholder="your email" required><br>
             <textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea></br>
             <input type="submit" name="submit" class="form-control submit" value="Send Message">
            
          </form>
          
         </div>
        </div>


    


</body>
</html>
