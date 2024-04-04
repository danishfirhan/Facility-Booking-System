<?php
include "facility.php";
print_r($_POST);
if(isSet($_POST['saveFacilityButton']))
	{
	echo 'nak add new rec';
	addNewFacility();
	header('Location:facilityList.php');
	}
	else if(isSet($_POST['deleteFacilityButton']))
	{
		$facilityIdToDelete=$_POST['facilityIdToDelete'];
		echo"nak delete $facilityIdToDelete";
		deleteFacility();
		header('Location:facilityList.php');
	}
	else 
		if(isSet($_POST['updateFacilityButton']))
	{
		$regNumberToDelete=$_POST['updateFacilityButton'];
		echo'nak save update';
		updateFacility();
		header('Location:facilityList.php');
	}
?>