<?php
//booking.php
// Include your database connection or move it to a separate file for better organization

// Function to add a new booking record
function addNewBookingRecord()
{
    // Include your database connection or move it to a separate file for better organization
    $con = mysqli_connect("localhost","web2","web2","facilitydb");
    if(!$con)
    {
        echo mysqli_connect_error();
        exit;
    }
    
    // Collect data from post array or system
    $Cust_no = $_POST['custIdToBook'];
    $regNumber = $_POST['facilityIdToBook'];
    $Date_Reserved = date("Y-m-d");
    $dateRentStart = $_POST['dateRentStart'];
    $Booking_reference = $Cust_no . $regNumber . $dateRentStart;
    $dateRentEnd = $_POST['dateRentEnd'];
    $Rental_period = getDayDiff($dateRentStart, $dateRentEnd);
    $total = $Rental_period * $_POST['capacity'];
    $tax = 0.06 * $total;
    $Amount_due = $tax + $total;
    
    // Prepare and execute SQL query
    $sql = "INSERT INTO bookings (bookingReference, custNo, reservedBy, dateReserved, dateRentStart, dateRentEnd,
    facilityId, rentalPeriod, amountDue)
            VALUES ('$Booking_reference', '$Cust_no', '$Cust_no', '$Date_Reserved', '$dateRentStart', '$dateRentEnd', '$regNumber', '$Rental_period', '$Amount_due')";
    $qry = mysqli_query($con, $sql); 
    if(mysqli_affected_rows($con) != 0)
        return true;
    else
        return false;
}

// Function to get list of future booking by customer
function getListOfFutureBookingByCustomer($custId)
{
    // Include your database connection or move it to a separate file for better organization
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
    if(!$con)
    {
        echo mysqli_connect_error(); 
        exit;
    }
    
    // Get list of future or active bookings, sort by date start
    $sql = "SELECT * FROM bookings WHERE custNo = '$custId' AND (dateRentStart >= CURDATE() OR dateRentEnd >= CURDATE()) ORDER BY dateRentStart";
    $qry = mysqli_query($con, $sql);
    return $qry; 
}

// Function to get list of past bookings by customer
function getListOfPastBookingByCustomer($custId)
{
    // Include your database connection or move it to a separate file for better organization
    $con=mysqli_connect("localhost","webs392024","webs392024","facilitydb");
    if(!$con)
    {
        echo mysqli_connect_error(); 
        exit;
    }
    
    // Get list of past bookings
    $sql = "SELECT * FROM bookings WHERE custNo = '$custId' AND (dateRentStart < CURDATE() AND dateRentEnd < CURDATE()) ORDER BY dateRentStart";
    $qry = mysqli_query($con, $sql);
    return $qry; 
} 

// Function to calculate the difference in days between two dates
function getDayDiff($dateRentStart, $dateRentEnd)
{
    $date1 = date_create($dateRentStart);
    $date2 = date_create($dateRentEnd);
    $diff = date_diff($date1, $date2);
    $x = $diff->format("%R%a"); // R - -ve and +ve symbol
    if($x >= 1)
        $x = $diff->format("%a");
    return $x;
}
?>