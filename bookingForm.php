<!DOCTYPE html>
<!-- bookingForm.php -->
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

    <title>Book Facility</title>
	
    <style>
	
body {font-family: "Lato", sans-serif}
body{
		 background-color:#BBF7F2;
	}
.mySlides {display: none}
.center { 
  text-align: center;
          
  width: 60%;
  border: 3px solid #359DB5;
  padding: 10px;
    }


body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.center { 
        text-align:center; 
        width:100%; 
    }
	        /* Common CSS styles */
		html,body,h1,h2,h3,h4,h5,h6,.result {font-family: "Roboto", sans-serif}


        header {
			font-family: "Roboto", sans-serif;
            background-color: #D3D3D3; 
            color: black;
            text-align: center;
            padding: 20px 0;
            position: relative; /* Position the header relative for absolute positioning of elements inside */
        }

        nav {
            background-color: #E0E0E0; 
            color: black;
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #fff;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: black;
            text-decoration: none;
            font-weight: bold; /* Added font-weight */
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {

            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000; /* Text color */
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
button {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

button:hover {

  background-color: #04AA6D;
  color: white;
  }
  .button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}



.button4 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button4:hover {
  background-color: #555555;
  color: white;
}	
    </style>
    <script>
        function validateForm() {
            var start = document.forms["bookingForm"]["dateRentStart"].value;
            var end = document.forms["bookingForm"]["dateRentEnd"].value;

            if (start >= end) {
                alert("Start date is after/same as the end date. Select correct date");
                return false;
            }
        }
    </script>

<body>
<?php
session_start();
include "../customer/customer.php";
include "../facilityInformation/facility.php";
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    header("Location: ../mainMenu.php");
}
echo '<div style="width:90%; margin:0 auto;" class="w3-container">';

$custNo = $_SESSION['username'];
echo '<div style="width:300px; margin:auto;">';
displayCustomerInformation($custNo);
echo '</div>';
if (isset($_POST['searchByDate'])) {
    $dateRentStart = $_POST['dateRentStart'];
    $dateRentEnd = $_POST['dateRentEnd'];
    $qryAvailable = getAvailableFacilityOnTheseDate($dateRentStart, $dateRentEnd);
    if (mysqli_num_rows($qryAvailable) > 0)
        showAvailableFacilityOnThisDate($qryAvailable);
    else
        echo 'No facility available between ' . $dateRentStart . ' and ' . $dateRentEnd;
} else {
    echo '<div style="width:300px; margin:auto;">';
    displayBookingDateOption();
    echo '</div>';
}
echo '</div>';
?>

<?php
//to display the search menu
function displayCustomerInformation($custNo)
{
    $customerInfo = getCustomerInformation($custNo);
    echo '<div style="width:300px; margin:auto;">';
    echo '<div style="width:100%;">';
    echo '<fieldset class = center><legend>Customer info:</legend>';
    echo '<br>Name :' . $customerInfo['custName'];
    echo '<br>phoneNo :' . $customerInfo['phoneNo'];

    echo '</fieldset>';
    echo '</div>';
}

function displayBookingDateOption()
{
    echo '<div>';
    echo '<div>';
    echo '
        <form action="" method="post" onsubmit="return validateForm()" name="bookingForm" >
            <fieldset class = center><legend>Select date to book</legend>
                <table class="w3-table-all">
                    <tr><td> Start Date : </td><td><input type=date name=dateRentStart><br></td></tr>
                    <tr><td> End Date : </td><td><input type=date name=dateRentEnd></td></tr>
                </table>
                <br><input type=submit class="w3-btn w3-light-blue" name = searchByDate value="Show Available Facility">
				<br><br><a href="../customerMenu.php"><input type ="button" class="w3-btn w3-light-blue" value="Back To Customer Menu"> </a><br><br>
            </fieldset>
        </form>';
    echo '</div>';
    echo '</div>';
}

function showAvailableFacilityOnThisDate($qryAvailable)
{
    $custNo = $_SESSION['username'];
    $dateRentStart = $_POST['dateRentStart'];
    $dateRentEnd = $_POST['dateRentEnd'];

    echo '<div style="width:100%; margin: auto;">';
    echo '<br>List of facility available from ' . $dateRentStart . ' to ' . $dateRentEnd;
    echo '<table border=1 style="width:20%;" class="w3-table w3-bordered w3-striped w3-large w3-hoverable w3-card-4">';
    echo '<tr class="w3-light-blue">
            <td>No</td>
            <td>Facility Id</td>
            <td>Name</td>
            <td>Category</td>
			<td>Capacity</td>
            <td>Facility Detail</td>
            <td>Rate Per Day</td>
			<td>Charges RM</td>
			<td>Book The Facility</td>
        </tr>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($qryAvailable)) {
        $facilityId = $row['facilityId'];
        $capacity = $row['capacity'];

        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . $row['facilityId'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['category'] . '</td>';
        echo '<td>' . $row['capacity'] . '</td>';
		echo '<td>' . $row['facilityDetail'] . '</td>';
		echo '<td>' . $row['ratePerDay'] . '</td>';
		
        
        $Rental_period = getDayDiff($dateRentStart, $dateRentEnd);
        $total = $Rental_period * $row['capacity'];
        $tax = 0.06 * $total;
        $Amount_due = $tax + $total;

        echo '<td>Total RM: ' . number_format($total, 2) . '<br>Tax RM: ' . number_format($tax, 2) . '<br>Amount Due RM: ' . number_format($Amount_due, 2) . '</td>';
        
        echo '<td>';
        echo '<form action="processBooking.php" method="post">';
        echo "<input type='hidden' value='$facilityId' name='facilityIdToBook'>";
        echo "<input type='hidden' value='$custNo' name='custIdToBook'>";
        echo "<input type='hidden' value='$dateRentStart' name='dateRentStart'>";
        echo "<input type='hidden' value='$dateRentEnd' name='dateRentEnd'>";
        echo "<input type='hidden' value='$capacity' name='capacity'>";
        echo "<input type='image' name='bookFacilityButton' src='6416353.gif' width='100'
     height='100' title='Click to choose this facility' alt='Choose this facility'>";
        echo '</form>';
        echo '</td>';
        echo '</tr>';

        $i++;
    }
    echo '</table>';
    echo '</div>';
}

function getDayDiff($dateRentStart, $endDate)
{
    $date1 = date_create($dateRentStart);
    $date2 = date_create($endDate);
    $diff = date_diff($date1, $date2);
    $x = $diff->format("%R%a");//R - -ve and +ve symbol
    if ($x >= 1)
        $x = $diff->format("%a");
    return $x;
}
?>
</body>
</html>