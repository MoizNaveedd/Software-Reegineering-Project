<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email =$_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['Message'];


$con = mysqli_connect("localhost","root","ashy1234$");
if(!$con){
    echo "couldn't connect to server";
    die();
}
else{
    echo "<h2>Connected successfully";
}
$DB = mysqli_select_db($con,"home_vices");
if (!$DB){
    echo"Couldn't select database";
}
else{
    echo "<h2>Database selected sucessfully</h2>";
}
$q = "INSERT INTO Contact(first_name, last_name, email, phone, message) VALUES('$fname','$lname','$email',$phone, '$message')";
$res = mysqli_query($con,$q);

// After successfully inserting the record
if ($res == True){
    session_start();
    $_SESSION['message'] = " Message sent successfully! &#10004";
    $_SESSION['timestamp'] = time();
} else{
    session_start();
    $_SESSION['message'] = "Meesage not sent";
}

header("Location: contact.php"); 
exit;

?>

