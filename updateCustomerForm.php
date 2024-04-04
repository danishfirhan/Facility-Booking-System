<style>
        /* Custom styles */
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-input {
            margin-bottom: 10px;
        }

        .form-input input[type="text"],
        .form-input input[type="password"],
        .form-input input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-input input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-input input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

<?php
//updateCustomerForm.php
include "customer.php";
$custNo=$_POST['custNoToUpdate'];
$qry = getCustomerInformation($custNo);//call function to get detail customer data
$row = mysqli_fetch_assoc($qry);
//assign data to variable
$custName = $row['custName'];
$Address =$row['Address'];
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
echo "<input type='text' name='address' value='$address'>";

echo '<br>Sex :';
echo "<input type='text' name='sex' value='$sex' >";
echo '<br>Phone No :';
echo "<input type='text' name='phoneNo' value='$phoneNo' >";
echo '<br><br><input type="submit" name="updateCustomerButton" value="Save">';
echo '<input type ="reset" name="resetButton" value="reset">';

echo '<a href="../staffMenu.php"><input type ="button" value="Back To Staff Menu"> </a>';

echo '</fieldset>';
echo '</form>';
echo '</div>';
?>