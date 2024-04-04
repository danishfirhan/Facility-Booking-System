<!DOCTYPE html>
<!--mainMenu.php-->
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
body {font-family: "Lato", sans-serif}
body{
		 background-color:#BBF7F2;
	}
	.center { 
  text-align: center;
          margin: auto;
  width: 60%;
  border: 3px solid #359DB5;
  padding: 10px;
    }
</style>
<body>	

	<div class="w3-container">
	<h1 style="text-align: center;">Update facility List</h1>
<?php
include "facility.php";

echo '<h1 style="text-align: center;">Update Facility Information</h1>';
$facilityId=$_POST['facilityIdToUpdate'];
$facilityQry=getFacilityInformation($facilityId);
$facilityRecord = mysqli_fetch_assoc($facilityQry);
$name = $facilityRecord['name'];
$category = $facilityRecord['category'];
$capacity = $facilityRecord['capacity'];
$facilityDetail = $facilityRecord['facilityDetail'];
$ratePerDay = $facilityRecord['ratePerDay'];
$status = $facilityRecord['status'];
$Date = $facilityRecord['Date'];
	echo "<form action='processFacility.php'method='POST' class = center>";
	echo "Facility Id: <br><input type='text' name='facilityId' value='$facilityId' readonly>";
    echo "<br>Facility Name:<br> <input type='text' name='name' value='$name'>"; 
    echo "<br>Type: <br><input type='text' name='category' value='$category'>";
    echo "<br>Capacity: <br><input type='text' name='capacity' value='$capacity'>";
	echo "<br>Facility Detail: <br><input type='text' name='facilityDetail' value='$facilityDetail'>";
    echo "<br>Rate Per Day: <br><input type='text' name='ratePerDay' value='$ratePerDay'>";
    echo "<br>Status: <br><input type='text' name='status' value='$status'>";
	echo "<br>Date: <br><input type='date' name='Date' value='$Date'>";
	
	echo"<br><br><input type='submit' value= 'save' name='updateFacilityButton'>";
	echo"</form>"
?>
	</div>
	</body>
</html>