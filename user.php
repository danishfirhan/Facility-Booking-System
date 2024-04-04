<?php 

function validatePassword($username,$password)
{
	$con = mysqli_connect("localhost","webs392024","webs392024","facilitydb"); if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql= "SELECT * FROM user where userId = '".$username ."' and password ='".$password."'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count == 1){
	return true;
}
else
	{
	return false; 
	}
}
function AddcurentUser($username)
{
	$con = mysqli_connect("localhost","webs392024","webs392024","facilitydb"); if(!$con)
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql= "INSERT INTO current(ID)VALUES ('".$username."')";
mysqli_query($con,$sql);
}
function getUserType($username)
{
	$con = mysqli_connect("localhost","webs392024","webs392024","facilitydb"); if(!$con)
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql= "SELECT * FROM user where UserId = '".$username ."'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count == 1){
	$row = mysqli_fetch_assoc($result);
	$userType=$row['userType'];
	return $userType;
	}
 }
 
 
function deleteID()
{
//create connection
$con = mysqli_connect("localhost","webs392024","webs392024","facilitydb"); if(!$con)
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}

$sql = 'DELETE FROM current;';
$qry = mysqli_query($con,$sql);//run query

}
?>