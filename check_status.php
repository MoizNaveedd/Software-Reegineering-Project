<?php
$con = mysqli_connect("localhost","root","ashy1234$");
if(!$con){
    echo "couldn't connect to server";
    die();
}
$DB = mysqli_select_db($con,"home_vices");
if (!$DB){
    echo"Couldn't select database";
    die();
}
$booking_id = $_POST['booking_id'];

$result = mysqli_query($con, "SELECT booking_status FROM schedule WHERE scheduleID='$booking_id'");
$row = mysqli_fetch_assoc($result);

if ($row) {
    $status = $row['booking_status'];
    
    // Apply different styles based on booking status
    if ($status === 'accepted') {
        echo "<div style='background-color: green; color: white; padding: 10px; border-radius: 5px;'>
                <h2><b>Your booking status is: $status</b></h2>
              </div>";
    } elseif ($status === 'rejected') {
        echo "<div style='background-color: red; color: white; padding: 10px; border-radius: 5px;'>
                <h2><b>Your booking status is: $status</b></h2>
              </div>";
    } else {
        echo "<div style='background-color: yellow; color: black; padding: 10px; border-radius: 5px;'>
                <h2><b>Your booking status is: $status</b></h2>
              </div>";
    }
} else {
    echo "Booking not found.";
}


