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
//addCustomer.php

echo '<div id ="set" style="line-height: 1.8;">';

echo '<form action="processCustomer.php" method="post">';
echo '<fieldset class = center><legend>Enter Customer Information:</legend>';
echo 'Customer No:';
echo '<input type="text" name="custNo" required>';
echo '<br>Customer Name:';
echo '<input type="text" name="custName">';
echo '<br>Address :';
echo '<input type="text" name="address">';

echo '<br>Sex :';
echo '<input type="text" name="sex">';
echo '<br>Phone No :';
echo '<input type="text" name="phoneNo">';
echo '<br><br><input type="submit" name="saveNewCustomerButton" value="Save">';
echo '<input type ="reset" name="resetButton" value="reset">';
echo '<a href="../staffMenu.php"><input type ="button" value="Back To Staff Menu"> </a>';

echo '</fieldset>';
echo '</form>';
echo '</div>';
?>