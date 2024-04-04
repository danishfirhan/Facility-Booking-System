<style>
	body{
		 background-color:#e6fff2;
	}
	#set {
	 margin:auto;
	 width:50%;
	 text-align:center;

	 }
</style>

<?php
//updateCustomerForm.php
include "customer.php";
$custNo=$_POST['custNoToUpdate'];
$qry = getListOfCustomer($custNo);//call function to get detail customer data
$row = mysqli_fetch_assoc($qry);
//assign data to variable
$custName = $row['custName'];
$Address =$row['address'];
$sex =$row['sex'];
$phoneNo =$row['phoneNo'];

echo '<div id ="set" style="line-height: 1.8;">';
echo '<form action="processCustomer.php" method="post">';
echo '<fieldset><legend>Customer Information Update:</legend>';
echo 'custNo:';
echo "<input type='text' name='newCust_no' value='$custNo' required>";
echo "<input type='hidden' name='custNo' value='$custNo' >";
echo '<br>Customer Name :';
echo "<input type='text' name='custName' value='$custName'>";
echo '<br>Address :';
echo "<input type='text' name='address' value='$Address'>";

echo '<br>Sex :';
echo "<input type='text' name='sex' value='$sex' >";
echo '<br>Phone No :';
echo "<input type='text' name='phoneNo' value='$phoneNo' >";
echo '<br><br><input type="submit" name="updateThisCustomerButton" value="Save">';
echo '<input type ="reset" name="resetButton" value="reset">';

echo '<a href="../customerMenu.php"><input type ="button" value="Back To Customer Menu"> </a>';

echo '</fieldset>';
echo '</form>';
echo '</div>';
?>