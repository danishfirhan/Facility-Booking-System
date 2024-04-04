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

<?php

include "customer.php";
echo '<h1> List of customer available.</h1>';

//===================== search form=====
displaySearchOption();
if(isSet($_POST['searchByCustNo']))
	$qry = searchByCustNo(); //call function in customer.php
else if(isSet($_POST['searchBycustName']))
	$qry = findCustomerByCustomerName(); //call function in customer.php
else if(isSet($_POST['searchByfacilityName']))
	$qry = findCustomerByCustomerFacility(); //call function in customer.php
else
	$qry = getListOfCustomer();//display all customer

/*
//add customer menu
echo '<form action = "processCustomer.php" method ="POST">';
	echo '<br><input type = "submit" name="addCustomerButton" value ="Add Facility Customer">';
echo '</form>';
*/
//display customer info	
echo '<br>No of customer:'.mysqli_num_rows($qry);
echo '<table class="w3-table-all">';
echo '<tr>
		<td>No</td>
		<td>Customer No</td>
		<td>Customer Name</td>
		<td>Address</td>
		<td>Sex</td>
		<td>Phone No</td>
		<td>Delete</td>
		<td>Update</td>
	</tr>';
$i=1;
while($row=mysqli_fetch_assoc($qry))//Display customer information
  {

  echo '<tr>';
  echo '<td>'.$i.'</td>';
  echo '<td>'.$row['custNo'].'</td>';
  echo '<td>'.$row['custName'].'</td>';
  echo '<td>'.$row['address'].'</td>';
  echo '<td>'.$row['sex'].'</td>';
  echo '<td>'.$row['phoneNo'].'</td>';
  $custNo = $row['custNo'];

  //delete menu
  echo '<td>';
			echo '<form action="processCustomer.php" method="post" >';
			echo "<input type='hidden' value='$custNo' name='custNoToDelete'>";
			echo '<input type="submit" name="deleteCustomerButton" value="Delete">';
			echo '</form>';
  echo '</td>';

   //update menu
  echo '<td>';
			echo '<form action="updateCustomerForm.php" method="post" >';
			echo "<input type='hidden' value='$custNo' name='custNoToUpdate'>";
			echo '<input type="submit" name="updateCustomerButton" value="Update">';
			echo '</form>';
  echo '</td>';
  echo '</tr>';  
  $i++;
  }
	  
echo '</table>';
?>
<?php
//to display the search menu
function displaySearchOption()
{
 echo '<div class="w3-container">
<form action="" method="post" >
<br>
<fieldset style ="width:70%;" class= center><legend>Search Option</legend>
<table  class="w3-table-all">
<tr><td> Customer No : </td><td><input type=text name=searchValue><br></td></tr>
<td></td><td><input type=submit name = searchByCustNo value="By custNo">
<input type=submit name = searchBycustName value="By Customer Name">
</div>'
;
//<input type=submit name = searchByfacilityName value="By Facility Name">
echo '<input type=submit name = displayAll value="Display All"></td>
</table>
</fieldset>
</form>';
}
?>
<html>
<br><br><a href="../staffMenu.php"><button> Back To Staff Menu</button></a>
</html>