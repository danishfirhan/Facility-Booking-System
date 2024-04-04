<!DOCTYPE html>
<!--mainMenu.php-->
<html>
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
body{
		 background-color:#BBF7F2;
	}
.mySlides {display: none}
.center { 
  text-align: center;
          margin: auto;
  width: 60%;
  border: 3px solid #359DB5;
  padding: 10px;
  
    }
</style>
	<?php
	echo'

	<title>Facility Booking System</title>
	<h1  class="center">Welcome to Group 6 Facility Booking System</h1>
	
	<form action="login/checkLogin.php" method="POST" class="center">
	<fieldset style="width:15%" class="center">
	<legend>Login</legend>
	<label for="username">Username: </label><input type="text" name="username" id="username" placeholder="Enter Username"><br><br>
	<label for="password">Password :  </label><input type="password" name="password" id="password" placeholder="Enter Password"><br><br>
	<button type="submit" name="loginButton">Login</button>
	<a href="login/Register/ReCustomerForm.php">Register</a>
	</fieldset>
	</form>
	';
	?>
</html>