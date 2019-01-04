<?php
include('login.php'); 

if(isset($_SESSION['login_user'])){
header("location: admin.php");
}
?>(
<!DOCTYPE html>
<html>
<head>
	<title>
		login admin
	</title>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script>
   $(document).ready(function(){
    $("#cnic").mask('99999-9999999-9');
   
});

    </script>
<style type="text/css">

/*.bg{background: url("../image/background.jpg") no-repeat; width: 100%;height: 100%;}
.form-container{
	border: 2px solid #blue;
}*/
body{
	background-image: url(../image/background4.jpg);
	background-size: cover;
	color:#fff;
}
.form-container{
	border:1px solid #fff;
	padding: 30px 40px;
	margin-top: 50px;
	border-top-right-radius: 60px;
	border-bottom-left-radius: 60px;

}
.h2{
	border:1px solid #fff;
	color: #fff;
	border-top-right-radius: 60px;
	border-bottom-left-radius: 60px;
	border-color: #4455;
	  text-shadow: 2px 2px #ff0000;

}
</style>
</head>	
<body>
	
	<div class='container'>
		<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4 form-container">
		<h2 class='text-center text-primary h2'>Login</h2>
		<form  method="post">
	<div class='form-group'>
<label>CNIC :</label>
<input  name="cnic" id='cnic' class="form-control" type="text" required pattern='[1-6]{1}[0-9]{4}[\-]\d{7}[\-]\d{1}'  maxlength="15" placeholder="Enter CNIC with dash e.g 15302-0920943-3">
</div>
<div class='form-group'>
<label>Password :</label>
<input id="password" name="password" class='form-control' type="password" maxlength="16"  placeholder='Enter the Password' required>

</div>

<input name="submit" class='form-control bg-warning text-success' type="submit" value="Login">

<span style="color:Red"><?php echo $error; ?></span>
</form>
<br><br>
</div>

		</div>
		</div>


	</body>
</html>