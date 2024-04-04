 <!DOCTYPE html>
<!-- bookingList.php -->
<html>
<head>
    <title>Booking List</title>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {font-family: "Lato", sans-serif}
body{
		 background-color:#BBF7F2;
	}
.mySlides {display: none}
.center { 
  text-align: center;
          margin: auto;
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
		html,body,h1,h2,h3,h4,h5,h6,p,.result {font-family: "Roboto", sans-serif}


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
    <link rel="stylesheet" href="../lib/w3.css">
</head>
<body>
<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
    header("Location: ../mainMenu.php");
}

include "../customer/customer.php";
include "../facilityInformation/facility.php";
include "booking.php";

echo '<div class="w3-container" style="width:80%; margin:0 auto;">';

$custId = $_SESSION['username'];
displayCustomerInformation($custId);

echo '<div class="w3-container">';
$qryActiveAndFutureList = getListOfFutureBookingByCustomer($custId);
$qryPastBooking = getListOfPastBookingByCustomer($custId);
showBookingList($qryActiveAndFutureList, "Active/Future Booking");
showBookingList($qryPastBooking, "Completed Booking");
echo '</div>';
echo '</div>';
?>

<?php
function displayCustomerInformation($custId)
{echo '<form action="login/checkLogin.php" method="POST" class="center">';
	echo '<fieldset style="width:100%" class="center">';
    echo '<div>';
    $customerInfo = getCustomerInformation($custId);
    echo '<div style="width:100%; margin:0 auto;">';
    echo '<fieldset><legend><h2>Customer info:</h2></legend>';
    echo '<br>Name :' . $customerInfo['custName'];
    echo '<br>Contact :' . $customerInfo['phoneNo'];
    echo '</fieldset>';
    echo '</div>';
	echo '</form >';
	echo '</fieldset >';
}

function showBookingList($qryBookingList, $listType)
{
    $noOfBookingRecord = mysqli_num_rows($qryBookingList);

    echo '<div style="width:100%; margin:0 auto;">';
    if ($noOfBookingRecord == 0) {
        echo '<br><br>There is no record for ' . $listType . ' found';
        return;
    }
    echo '<br>List of ' . $listType . '. ' . $noOfBookingRecord . ' record/s found';
    echo '<table border=1 class="w3-table w3-bordered w3-striped w3-small w3-hoverable w3-card-4 width:100%;">';
    echo '<tr class="w3-light-blue">
            <td>No</td>
            <td>RegNo</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Charges RM</td>
        </tr>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($qryBookingList)) {
        $dateRentStart = date_create($row['dateRentStart']);
        $dateRentEnd = date_create($row['dateRentEnd']);

        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . $row['facilityId'] . '</td>';
        echo '<td>' . date_format($dateRentStart, "d/m/Y") . '</td>';
        echo '<td>' . date_format($dateRentEnd, "d/m/Y") . '</td>';
        echo '<td>' . number_format($row['amountDue'], 2) . '</td>';
        echo '</tr>';
        $i++;
    }
	echo '<br><br><a href="../customerMenu.php"><button> Back To Customer Menu</button></a><br><br>';
    echo '</table>';
    echo '</div>';
}
?>
</body>
</html>