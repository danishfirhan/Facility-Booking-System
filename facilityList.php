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
</style>
<body>	

	<div class="w3-container">
	<h1>Facility List</h1>
	<?php
	include "facility.php";
	//display search option
	displaySearchOption();
	
	if(isSet($_GET['searchFacilityId']))
		{
			$facilityIdToSearch=$_GET['searchKey'];
			$qryFacilityList=searchByFacilityId($facilityIdToSearch);
		}
		else
			$qryFacilityList = getListOfFacility();
		
	//1.get car List from car table
	//$carListQry=getListOfCar();
	echo'<h3>No of record:'.mysqli_num_rows($qryFacilityList).'</h3>';
	//2.display all the car information
	echo"<table class='w3-table-all'>";
		echo"<tr class = 'w3-yellow'>";
			echo '<tr>
                <th>No</th>
                <th>Facility Id</th>
                <th>Facility Name</th>
                <th>Category</th>
                <th>Capacity</th>
				<th>Facility Detail</th>
                <th>Rate Per Day</th>
                <th>Status</th>
				<th>Date</th>
                <th>Delete</th>
				<th>Update</th>
			</tr>';
		$no =1;
		while($row = mysqli_fetch_assoc($qryFacilityList))
		{
			echo"<tr>";
				echo '<td>'.$no.'</td>';
                    echo '<td>'.$row['facilityId'].'</td>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['category'].'</td>';
                    echo '<td>'.$row['capacity'].'</td>';
					echo '<td>'.$row['facilityDetail'].'</td>';
                    echo '<td>'.$row['ratePerDay'].'</td>';
                    echo '<td>'.$row['status'].'</td>';
					 echo '<td>'.$row['Date'].'</td>';
				$facilityId=$row['facilityId'];
				echo"<td>";//delete option
				echo "<form action='processFacility.php'method='POST'>";//action? method?
					echo"<input type='hidden' name='facilityIdToDelete'value='$facilityId'>";
					echo"<input type='submit' value='Delete'name='deleteFacilityButton'>";
				echo "</form>";
				echo"</td>";
				echo"<td>";
					echo "<form action='updateFacilityForm.php'method='POST'>";//action? method?
						echo"<input type='hidden' name='facilityIdToUpdate'value='$facilityId'>";
						echo"<input type='submit' value='Update'name='updateFacilityButton'>";
					echo "</form>";
				echo"</td>";
				echo"</tr>";
			$no++;
		}
	echo '</table>
	<br><br><a href="../staffMenu.php"><button> Back To Staff Menu</button></a>';
	?>
	<?php
	function displaySearchOption()
	{
	echo '<div class="w3-container">';
		echo '<form action="facilityList.php" method="GET">';
			echo '<input type="text" name="searchKey">';
			echo '<input type="submit" name="searchFacilityId" value="Search Facility Id">';
			echo '<input type="submit"name="showAllButton" value="displayAll">';
		echo '</form>';
	echo '</div>';
	}
	?>
	
	</div>
</html>