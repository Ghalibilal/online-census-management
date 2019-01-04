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
      height:200px;
    }
    
    .navbar ul li a:hover{
      text-decoration: underline;
      
    }
    .bod{
        background:#F8F8F8;
        height: auto;
    }
    #body{
        background:white;
        height: 700px;

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
      margin:auto;
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
    <div class="collapse navbar-collapse " id="myNavbar">
      <ul class="nav navbar-nav ul">
        <li  class='active'><a   href=""><span class=' glyphicon glyphicon-home'></span>Home</a></li>
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
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="population.php">Population census 2018</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="Employee/index.php"> Employee login<span class="glyphicon  glyphicon-log-in"></span></a></li>
        
      </ul>
    
  
</nav>
 <div class="container" id="body">
          <h3 style='color:green;'>Population Census</h3>
          <h3 style='color:green;'>INTRODUCTION</h3>
          <p style='color:green;' class='text-justify'>The census organization was established in 1950 as a part 
            and parcel of Ministry of Home Affairs and first three censuses were conducted 
            by this organization while working under that Ministry. After 1972 Census, 
            Census Organization was established on a permanent footing and was made an 
            attached department of Ministry of Interior, so as to maintain expertise,
             experience and continuity which used to be lost after every census as was 
             the case in 1951 and 1961. With the creation of Registration organization in
              1973, as an attached department of Ministry of Interior and also headed by 
              Census Commissioner, both the departments were merged in 1976 to be called 
              “Census & Registration Organization”. In March 1978, the “Census & Registration Organization” 
              was split into two separate departments and Population Census Organization was placed under 
              the Statistics Division which remains as such thereafter due to promulgation of General Statistics
               (Re-organization) Act, 2011. The conduct of Census is the responsibility of Pakistan Bureau of Statistics.</p>

           <h3 style='color:green;'>History of Census </h3>
            <p style='color:green;'  class='text-justify'>Pakistan has a long history of Census taking and the first regular Population Census
             in the area now comprising Pakistan
              was held in 1881. Since then regular censuses
               have been conducted after every ten years 
               in the year ending at one. After independence,
                the first census of Pakistan was conducted in 1951,
                 the second in 1961 while the third census was held
                  in 1972 instead of 1971 due to political environment 
                  in the country and war with India.
                   The fourth census was held in March 1981 and fifth
                    one which was due in 1991 could be held in March,
                     1998 due to specific circumstances.</p>
                     <h3 style='color:green;'>Census Methodology </h3>

             <p style='color:green;' class='text-justify'>
              There are two approaches of census enumeration:<br> 
(a) De-jure – in which persons are counted at their usual place of residence and<br> 
(b) De-fecto– in which persons are counted where they are found on the census data.<br> In 1998 census both the approaches were applied simultaneously during enumeration,<br> but the data was tabulated and published on de-jure basis for comparability of data over time.</p>
    
        </div>
        </div>
      </div>
    </div>
 
      <footer class='container-fluid' style='color:white;'>
        
          <div class='col-sm-4'>
          
          </div>
          <div class='col-sm-4'>
               <h5>Email Address: Census@admin.com</h5>
          <h5>All copyright reserved<sup> &copy</sup></h5>
    
          </div>
          <div class='col-sm-4'>
                
          </div>
       
      </footer>
  

  




</body>
</html>  