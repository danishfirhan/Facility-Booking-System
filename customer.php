<?php

//addFacilityCustomer function==================
function addNewCustomer()
{
	$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
	if(!$con)
	{
	echo mysqli_connect_error();
	exit;
	}
	$custNo = $_POST['custNo'];
	$checkQuery = "SELECT * FROM customer WHERE custNo = '$custNo'";
		mysqli_query($con, $checkQuery);
 //collect data from post array
 $custNo = $_POST['custNo'];
 $custName = $_POST['custName'];
 $address = $_POST['address'];
 $sex = $_POST['sex'];
 $phoneNo = $_POST['phoneNo'];
	
	$sql="INSERT INTO customer(custNo, custName,address,sex,phoneNo)VALUES ('$custNo','$custName','$address','$sex','$phoneNo')";
	mysqli_query($con,$sql); 
}

//getListOfCustomer function ==================
function getListOfCustomer()
{
//create connection
$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql = 'select * from customer';
$qry = mysqli_query($con,$sql);//run query
return $qry;  //return query
}



//delete function ==================
function deleteCustomer()
{
	$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
	if(!$con)
	{
	echo mysqli_connect_error();
	exit;
	}

 $custNo = $_POST['custNoToDelete'];//get selected custNo to delete
  
  $sql="delete from customer
		where custNo ='".$custNo."'";
		echo $sql;
	$qry = mysqli_query($con,$sql);

}

//================updateCustomerInformation
function updateCustomerInformation()
{
//create connection
$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
//get the data to update
 $custNo = $_POST['custNo'];
 $custName = $_POST['custName'];
 $address = $_POST['address'];
 $sex = $_POST['sex'];
 $phoneNo = $_POST['phoneNo'];
 
$sql = "update customer set custName = '$custName', address = '$address', sex = '$sex', phoneNo = '$phoneNo' WHERE custNo = '$custNo'";
echo $sql;
$qry = mysqli_query($con,$sql);
}

//searchByCustomerNo function ==================
function searchByCustNo()
{
//create connection
$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql = 'select * from customer where custNo ="'.$_POST['searchValue'].'"';
//echo $sql;
$qry = mysqli_query($con,$sql);//run query
return $qry;  //return query
}

//findCustomerByName function ==================
function findCustomerByCustomerName()
{
//create connection
$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql = "select * from customer where custName like '%".$_POST['searchValue']."%'";
echo $sql;
$qry = mysqli_query($con,$sql);//run query
return $qry;  //return query
}
/*
//findCustomerByFacility function ==================
function findCustomerByCustomerFacility()
{
//create connection
$con=mysqli_connect("localhost","Webs392024","Webs392024","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
$sql = "select * from customer where facilityName like '%".$_POST['searchValue']."%'";
echo $sql;
$qry = mysqli_query($con,$sql);//run query
return $qry;  //return query
}
*/

//============getCustomerInformation
function getCustomerInformation($custNo)
{
//create connection
$con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}else{
$sql = "select * from customer where custNo = '".$custNo."'";
$qry = mysqli_query($con,$sql);//run query
if(mysqli_num_rows($qry) == 1)
	{
	$row=mysqli_fetch_assoc($qry);
	return $row;
	}
else
	return false;
	
}
	}

?>

