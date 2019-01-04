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
      
      border-radius: 0;
    }
    .bod{
        background: #f2f2f2;
        height: 750px;
    }
    #body{
        background:white;
        height: 750px;
        border: 1px solid #2E2E2E;
        border-radius: 5px;

    }
    /* Remove the jumbotron's default bottom margin */ 
     
   
    /* Add a gray background color and some padding to the footer */
    
  </style>
</head>
<body>


  <div class="container text-center">
      <span><img src="image/census.jpg" height="50px"></span>   <h4>Online Census</h4>      
     

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
        <li class="active"><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="#">Population 2018</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="Employee/index.php"> Employee login<span class="glyphicon  glyphicon-log-in"></span></a></li>
        
      </ul>
    </div>
  </div>
</nav>
        <div class="container-fluid bod">  
        <div class="container" id="body">
            this is about page
            
    
        </div>
        </div>


    


</body>
</html>
