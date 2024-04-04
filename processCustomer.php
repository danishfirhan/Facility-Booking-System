<?php
include "customer.php";
if(isSet($_POST['addCustomerButton']))
	{
	header('Location: addCustomer.php');
	}
else if(isSet($_POST['saveNewCustomerButton']))
	{
	addNewCustomer();
	header('Location: customerList.php');
	}
else if(isSet($_POST['deleteCustomerButton']))
	{
	deleteCustomer();
	echo "<script>";
	echo " alert('Customer Record has been deleted.');
		</script>";
	header( "refresh:1; url=customerList.php" );
	}
else if(isSet($_POST['updateCustomerButton']))
	{
	updateCustomerInformation();
	header( "refresh:1; url=customerList.php" );
	}
	else if(isSet($_POST['updateThisCustomerButton']))
	{
	updateCustomerInformation();
	header( "refresh:1; url=customerUpdate.php" );
	}


?>