<?php
// Start the session
session_start();

$con = mysqli_connect("localhost","root","ashy1234$");
if(!$con){
    echo "couldn't connect to server";
    die();
} else {
    echo "<h2>Connected successfully</h2>";
}
$DB = mysqli_select_db($con,"home_vices");
if (!$DB){
    echo "Couldn't select database";
} else {
    echo "<h2>Database selected successfully</h2>";
} 

$name = $_POST['name'];
$review = $_POST['review'];
$service = $_POST['service'];
$rating = $_POST['rating'];
$date = date("Y-m-d");

$cid_get = mysqli_query($con, "SELECT clientID FROM client WHERE clientName = '$name'");
$cid = null;

if($cid_get->num_rows > 0){
    $ros = $cid_get->fetch_assoc();
    $cid = $ros['clientID'];
}

echo "Client ID: $cid <br>";
echo "Service Name: $service <br>";
echo "Review: $review <br>";
echo "Rating: $rating <br>";
echo "Date: $date <br>";
echo "Client Name: $name <br>";

// Insert review into the database
$sql = mysqli_query($con, "INSERT INTO review (clientID, serviceName, review, rating, date, clientName) VALUES($cid, '$service', '$review', $rating, '$date', '$name')");

// Check if the insertion was successful
if ($sql) {
    // Set success message in the session
    $_SESSION['review_message'] = "Your review has been submitted successfully!";
} else {
    // Set failure message in the session (optional)
    $_SESSION['review_message'] = "There was an error submitting your review. Please try again.";
}

// Redirect back to review.php to display the message
header("Location: review.php");
exit();
?>
