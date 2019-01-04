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
      position: sticky;
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
        height: auto;
    }
    #body{
        background:white;
        height: auto;

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
        <li><a href="index.php"><span class=' glyphicon glyphicon-home'></span>Home</a></li>
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
        <li class='active'><a href="#">Population census 2018</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="Employee/index.php"> Employee login<span class="glyphicon  glyphicon-log-in"></span></a></li>
        
      </ul>
    
  
</nav>
 <div class="container" id="body">
           <h2>Population 2018</h2>
  <p>Click on the Provinces to open and close the district.</p>
  <div class="panel-group" id="accordion1">
    <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapseOne1">
             <h4 class="panel-title"><span class=" glyphicon glyphicon-triangle-right">KHYBER PUKHTUNKHWA</span></h4>

        </div>
        <div id="collapseOne1" class="panel-collapse collapse">
            
        <div class="panel-body"><ul class="list-group">
        <li><a href="census.php?district=<?php echo 'lower dir'?>" target="_blank">Dir Lower</a></li>
        <li><a href="census.php?district=<?php echo 'upper dir'?>" target="_blank">Dir UPPER</a></li>
        <li><a href="census.php?district=<?php echo 'malakand protected area'?>" target="_blank">MALAKAND</a></li>
        <li><a href="census.php?district=<?php echo 'abbotabad'?>" target="_blank">Abbotabad</a></li>
        <li><a href="census.php?district=<?php echo 'bannu'?>" target="_blank">Bannu</a></li>
        <li><a href="census.php?district=<?php echo 'battagram'?>" target="_blank">Battagram</a></li>
        <li><a href="census.php?district=<?php echo 'buner'?>" target="_blank">Buner</a></li>
        <li><a href="census.php?district=<?php echo 'chitral'?>" target="_blank">Chitral</a></li>
        <li><a href="census.php?district=<?php echo 'charsadda'?>" target="_blank">Charsadda</a></li>
        <li><a href="census.php?district=<?php echo 'dera Ismail Khan'?>" target="_blank">Dera Ismail Khan</a></li>
        <li><a href="census.php?district=<?php echo 'hangu'?>" target="_blank">Hangu</a></li>
        <li><a href="census.php?district=<?php echo 'haripur'?>" target="_blank">Haripur</a></li>
        <li><a href="census.php?district=<?php echo 'karak'?>" target="_blank">Karak</a></li>
        <li><a href="census.php?district=<?php echo 'kohat'?>" target="_blank">Kohat</a></li>  
        <li><a href="census.php?district=<?php echo 'kolai pallas kohistan'?>" target="_blank">Kolai Pallas Kohistan</a></li>
        <li><a href="census.php?district=<?php echo 'upper kohistan'?>" target="_blank">Upper Kohistan</a></li>
        <li><a href="census.php?district=<?php echo 'lower kohistan'?>" target="_blank">Lower Kohistan</a></li>
        <li><a href="census.php?district=<?php echo 'lakki marwat'?>" target="_blank">Lakki Marwat</a></li>
        <li><a href="census.php?district=<?php echo 'mansehra'?>" target="_blank">Mansehra</a></li>
        <li><a href="census.php?district=<?php echo 'mardan'?>" target="_blank">Mardan</a></li>
        <li><a href="census.php?district=<?php echo 'nowshera'?>" target="_blank">Nowshera</a></li>
        <li><a href="census.php?district=<?php echo 'peshawar'?>" target="_blank">Peshawar</a></li>
        <li><a href="census.php?district=<?php echo 'swat'?>" target="_blank">Swat</a></li>
        <li><a href="census.php?district=<?php echo 'shangla'?>" target="_blank">Shangla</a></li>
        <li><a href="census.php?district=<?php echo 'swabi'?>" target="_blank">Swabi</a></li>
        <li><a href="census.php?district=<?php echo 'tank'?>" target="_blank">Tank</a></li>
        <li><a href="census.php?district=<?php echo 'torghar'?>" target="_blank">torghar</a></li>

    

      </ul></div>
        
      </div>
    </div>
    
    <div class="panel-group" id="accordion2">
    <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapse2">
             <h4 class="panel-title"><span class=" glyphicon glyphicon-triangle-right">PUNJAB</span></h4>

        </div>
        <div id="collapse2" class="panel-collapse collapse">
            
        <div class="panel-body"><ul class="list-group">
    
     <li><a target="_blank" href='census.php?district=<?php echo 'attock';?>'>Attock</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo 'bahawalnagar';?>'>Bahawalnagar</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'bahawalpur';?>'>Bahawalpurr</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'bhakkar';?>'>Bhakkar</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'chakwal';?>'>Chakwal</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'chiniot'?>'>Chiniot</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'dera Ghazi khan';?>'>Dera Ghazi Khan</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'faisalabad';?>'>Faisalabad</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'gujranwala';?>'>Gujranwala</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'gujrat';?>'>Gujrat</a></li>

   <li> <a target="_blank" href='census.php?district=<?php echo'hafizabad';?>'>Hafizabad</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'jhang';?>'>Jhang</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'jhelum'?>'>Jhelum</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'kasur';?>'>Kasur</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'khanewal';?>'>Khanewal</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'khushab';?>'>Khushab</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'lahore';?>'>Lahore</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'layyah';?>'>Layyah</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'lodhran';?>'>Lodhran</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'mandi Bahauddin';?>'>Mandi Bahauddin</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'mianwali'?>'>Mianwali</a></li>    
     <li><a target="_blank" href='census.php?district=<?php echo'multan';?>'> Multan</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'muzaffargarh';?>'>Muzaffargarh</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'narowal';?>'>Narowal</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'nankana sahib';?>'>Nankana Sahib</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'okara';?>'>Okara</a></li>
    <li><a target="_blank" href'census.php?district=<?php echo'pakpattan';?>'>Pakpattan</a>
    
   <li> <a target="_blank" href='census.php?district=<?php echo'rahim Yar Khan';?>'>Rahim Yar Khan</a>
    <li><a target="_blank" href='census.php?district=<?php echo'rajanpur';?>'>Rajanpur</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'rawalpindi';?>'>Rawalpindi</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'sahiwal';?>'>Sahiwal</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'sargodha';?>'>Sargodha</a></li>
    <li> <a target="_blank" href='census.php?district=<?php echo'sheikhupura';?>'>Sheikhupura</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'sialkot';?>'> Sialkot</a></li>
   <li> <a target="_blank" href='census.php?district=<?php echo'toba tek singh';?>'>Toba Tek Singh</a></li>
    <li><a target="_blank" href='census.php?district=<?php echo'vehari';?>'>Vehari</a></li>
      </ul></div>
        
      </div>
    </div>
     <div class="panel-group" >
    <div class="panel-group" id="accordion3">
    <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapse3">
             <h4 class="panel-title"><span class=" glyphicon glyphicon-triangle-right">SINDH</span></h4>

        </div>
        <div id="collapse3" class="panel-collapse collapse">
            
        <div class="panel-body"><ul class="list-group">
        <li><a href="census.php?district=<?php echo 'Badin'?>" target="_blank">Badin</a></li>
        <li><a href="census.php?district=<?php echo 'Dadu'?>" target="_blank">Dadu</a></li>
        <li><a href="census.php?district=<?php echo 'Ghotki'?>" target="_blank">Ghotki</a></li>
        <li><a href="census.php?district=<?php echo 'Hyderabad'?>" target="_blank">Hyderabad</a></li>
        <li><a href="census.php?district=<?php echo ' Jacobabad'?>" target="_blank">Jacobabad</a></li>
        <li><a href="census.php?district=<?php echo 'Jamshoro'?>" target="_blank">Jamshoro</a></li>
        <li><a href="census.php?district=<?php echo 'Karachi Central'?>" target="_blank">Karachi Central</a></li>
        <li><a href="census.php?district=<?php echo 'Kashmore'?>" target="_blank">Kashmore</a></li>
        <li><a href="census.php?district=<?php echo 'Khairpur'?>" target="_blank">Khairpur</a></li>
        <li><a href="census.php?district=<?php echo 'Larkana'?>" target="_blank"> Larkana</a></li>
        <li><a href="census.php?district=<?php echo 'Matiari'?>" target="_blank">Matiari</a></li>
        <li><a href="census.php?district=<?php echo 'Mirpur Khas'?>" target="_blank">Mirpur Khas</a></li>
        <li><a href="census.php?district=<?php echo 'Naushahro Firoze'?>" target="_blank">Naushahro Firoze</a></li>
        <li><a href="census.php?district=<?php echo 'Shaheed Benazirabad'?>" target="_blank">Shaheed Benazirabad</a></li>  
        <li><a href="census.php?district=<?php echo 'Qambar Shahdadkot'?>" target="_blank">Qambar Shahdadkot</a></li>
        <li><a href="census.php?district=<?php echo 'Sanghar'?>" target="_blank">Sanghar</a></li>
        <li><a href="census.php?district=<?php echo 'Shikarpur'?>" target="_blank">Shikarpur</a></li>
        <li><a href="census.php?district=<?php echo 'Sukkur'?>" target="_blank">Sukkur</a></li>
        <li><a href="census.php?district=<?php echo ' Tando Allahyar'?>" target="_blank">Tando Allahyar</a></li>
        <li><a href="census.php?district=<?php echo 'Tando Muhammad Khan'?>" target="_blank">Tando Muhammad Khan</a></li>
        <li><a href="census.php?district=<?php echo 'Tharparkar'?>" target="_blank">Tharparkar</a></li>
        <li><a href="census.php?district=<?php echo 'Thatta'?>" target="_blank">Thatta</a></li>
        <li><a href="census.php?district=<?php echo 'Umerkot'?>" target="_blank">Umerkot</a></li>
        <li><a href="census.php?district=<?php echo 'Sujawal'?>" target="_blank">Sujawal</a></li>
        <li><a href="census.php?district=<?php echo 'Karachi East'?>" target="_blank">Karachi East</a></li>
        <li><a href="census.php?district=<?php echo 'Karachi South'?>" target="_blank">Karachi South</a></li>
        <li><a href="census.php?district=<?php echo 'Karachi West'?>" target="_blank">Karachi West</a></li>
        <li><a href="census.php?district=<?php echo 'Korangi'?>" target="_blank">Korangi</a></li>
        <li><a href="census.php?district=<?php echo 'Malir'?>" target="_blank">Malir</a></li>
    

      </ul>
        
    </div>
        
      </div>
    </div>
     <div class="panel-group" >
    <div class="panel-group" id="accordion4">
    <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapse4">
             <h4 class="panel-title"><span class=" glyphicon glyphicon-triangle-right">BALOCHISTAN</span></h4>

        </div>
        <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><ul class="list-group">
        <li><a href="census.php?district=<?php echo 'Awaran'?>" target="_blank">Awaran</a></li>
        <li><a href="census.php?district=<?php echo 'Barkhan'?>" target="_blank">Barkhan</a></li>
        <li><a href="census.php?district=<?php echo 'Kachhi'?>" target="_blank">Kachhi</a></li>
        <li><a href="census.php?district=<?php echo 'Chagai'?>" target="_blank">Chagai</a></li>
        <li><a href="census.php?district=<?php echo 'Dera Bugti'?>" target="_blank">Dera Bugti</a></li>
        <li><a href="census.php?district=<?php echo 'Gwadar'?>" target="_blank">Gwadar</a></li>
        <li><a href="census.php?district=<?php echo 'Harnai'?>" target="_blank">Harnai</a></li>
        <li><a href="census.php?district=<?php echo 'Jafarabad'?>" target="_blank">Jafarabad</a></li>
        <li><a href="census.php?district=<?php echo 'Jhal Magsi'?>" target="_blank">Jhal Magsi</a></li>
        <li><a href="census.php?district=<?php echo 'Kalat'?>" target="_blank">Kalat</a></li>
        <li><a href="census.php?district=<?php echo 'Kech'?>" target="_blank">Kech</a></li>
        <li><a href="census.php?district=<?php echo 'Kharan'?>" target="_blank">Kharan</a></li>
        <li><a href="census.php?district=<?php echo 'Kohlu'?>" target="_blank">Kohlu</a></li>
        <li><a href="census.php?district=<?php echo 'Khuzdar'?>" target="_blank">Khuzdar</a></li>  
        <li><a href="census.php?district=<?php echo 'Killa Abdullah'?>" target="_blank">Killa Abdullah</a></li>
        <li><a href="census.php?district=<?php echo 'Killa Saifullah'?>" target="_blank">Killa Saifullah</a></li>
        <li><a href="census.php?district=<?php echo 'Lasbela'?>" target="_blank">Lasbela</a></li>
        <li><a href="census.php?district=<?php echo 'Loralai'?>" target="_blank">Loralai</a></li>
        <li><a href="census.php?district=<?php echo 'Mastung'?>" target="_blank">Mastung</a></li>
        <li><a href="census.php?district=<?php echo 'Musakhel'?>" target="_blank">Musakhel</a></li>
        <li><a href="census.php?district=<?php echo 'Nasirabad'?>" target="_blank">Nasirabad</a></li>
        <li><a href="census.php?district=<?php echo 'Nushki'?>" target="_blank">Nushki</a></li>
        <li><a href="census.php?district=<?php echo 'Panjgur'?>" target="_blank">Panjgur</a></li>
        <li><a href="census.php?district=<?php echo 'Pishin'?>" target="_blank">Pishin</a></li>
        <li><a href="census.php?district=<?php echo 'Quetta'?>" target="_blank">Quetta</a></li>
        <li><a href="census.php?district=<?php echo 'Sherani'?>" target="_blank">Sherani</a></li>
        <li><a href="census.php?district=<?php echo 'Sibi'?>" target="_blank">Sibi</a></li>
        <li><a href="census.php?district=<?php echo 'Washuk'?>" target="_blank">Washuk</a></li>
        <li><a href="census.php?district=<?php echo 'Zhob'?>" target="_blank">Zhob</a></li>
       <li><a href="census.php?district=<?php echo 'Ziarat'?>" target="_blank">Ziarat</a></li>
        <li><a href="census.php?district=<?php echo 'Lehri'?>" target="_blank">Lehri</a></li>
       <li><a href="census.php?district=<?php echo 'Sohbatpur'?>" target="_blank">Sohbatpur</a></li>
       <li><a href="census.php?district=<?php echo 'Duki'?>" target="_blank">Duki</a></li>
       <li><a href="census.php?district=<?php echo 'Shaheed Sikandarabad'?>" target="_blank"> Shaheed Sikandarabad</a></li>


    

      </ul></div>
        
      </div>
    </div>
     <div class="panel-group" >
    <div class="panel-group" id="accordion5">
    <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapse5">
             <h4 class="panel-title"><span class=" glyphicon glyphicon-triangle-right">GILGIT BALTISTAN</span></h4>

        </div>
        <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
      <ul class="list-group">
        <li><a href="census.php?district=<?php echo 'Ghanche'?>" target="_blank">Ghanche</a></li>
        <li><a href="census.php?district=<?php echo 'Skardu'?>" target="_blank">Skardu</a></li>
        <li><a href="census.php?district=<?php echo ' Shigar'?>" target="_blank"> Shigar</a></li>
        <li><a href="census.php?district=<?php echo 'Kharmang'?>" target="_blank">Kharmang</a></li>
        <li><a href="census.php?district=<?php echo 'Ghizer'?>" target="_blank">Ghizer</a></li>
        <li><a href="census.php?district=<?php echo 'battagram'?>" target="_blank">Gilgit</a></li>
        <li><a href="census.php?district=<?php echo 'Hunza'?>" target="_blank">Hunza</a></li>
        <li><a href="census.php?district=<?php echo 'Nagar'?>" target="_blank">Nagar</a></li>
        <li><a href="census.php?district=<?php echo 'Astore'?>" target="_blank">Astore</a></li>
        <li><a href="census.php?district=<?php echo 'Diamer'?>" target="_blank">Diamer</a></li>
        </ul>
        </div>
        
      </div>
    </div>
     <div class="panel-group" >
    <div class="panel-group" id="accordion6">
    <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapse6">
             <h4 class="panel-title"><span class=" glyphicon glyphicon-triangle-right">ISLAMABAD CAPITAL TERRITORY</span></h4>

        </div>
        <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body"><ul class="list-group">
        <li><a href="census.php?district=<?php echo 'islamabad capital territory'?>">Islamabad Area</a></li>
        
      </ul></div>
        
      </div>
    </div>
   
 













  </div>
</div>



</body>
</html>  