<!DOCTYPE html>
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
<h1 style="text-align: center;">Add new facility</h1>
<form action = "processFacility.php" method="POST" class = center>
	<input type = "text" name="facilityId" placeholder="Enter Facility Id">
	<br><br><input type = "text" name="name" placeholder="Enter Name">
	<br><br><input type = "text" name="category" placeholder="Enter Category">
	<br><br><input type = "number" name="capacity" placeholder="Enter capacity">
	<br><br><input type = "text" name="facilityDetail" placeholder="Enter facility detail">
	<br><br><input type = "number" name="ratePerDay" placeholder="Enter rate per day" step="0.01">
	<br><br><input type = "text" name="status" placeholder="Enter status">
	<br><br><input type = "date" name="Date" >
	<br><br><input type = "submit" name="saveFacilityButton" value="Save">
	<br><br><a href="../staffMenu.php"><input type ="button" value="Back To Staff Menu"> </a>
	
</form>


</html>