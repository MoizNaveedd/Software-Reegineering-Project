<?php
$conn = mysqli_connect("localhost","root","ashy1234$");
if(!$conn){
    echo "couldn't connect to server";
    die();
}
$DB = mysqli_select_db($conn,"home_vices");
if (!$DB){
    echo"Couldn't select database";
    die();
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

var_dump($_GET['id']);

if (isset($_GET['id']) && isset($_GET['status'])) {
    $booking_id = $_GET['id'];
    $status = $_GET['status'];

    // Debug: Show the received parameters
    echo "Received Booking ID: $booking_id<br>";
    echo "Received Status: $status<br>";

    // Continue with the rest of your code...
} else {
    echo "No booking ID or status provided.";
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $booking_id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);

    // Update the booking status in the Schedule table
    $update_sql = "UPDATE schedule SET booking_status='$status' WHERE scheduleID='$booking_id'";
    
    if (mysqli_query($conn, $update_sql)) {
        echo "Booking status updated to: " . $status;
    } else {
        echo "Error updating booking status: " . mysqli_error($conn);
    }
} else {
    echo "No booking ID or status provided.";
}


?>
