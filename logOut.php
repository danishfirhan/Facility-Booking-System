<?php
include "user.php";
deleteID();
session_start(); 
session_destroy();
header('Location:../login.php');
?>
	
