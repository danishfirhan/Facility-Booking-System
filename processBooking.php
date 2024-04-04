<?php
session_start();

include "booking.php";

if (isset($_POST['bookFacilityButton_x'])) { // Check if the bookFacilityButton was clicked
    $success = addNewBookingRecord(); // Attempt to add a new booking record

    if ($success) { // If booking was successful
        echo '<script>
            alert("Your booking has been updated.");
            window.location = "../bookFacility/bookingList.php";
        </script>';

    } else { // If there was an error in processing the booking
        echo '<script>
            alert("There is an error in processing your booking. Kindly contact our customer service.");
            window.location = "../customerMenu.php";
        </script>';
    }
}
?>