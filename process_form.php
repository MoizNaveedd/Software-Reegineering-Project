<?php
// Database connection and selection
function db_connect() {
    $con = mysqli_connect("localhost", "root", "pass");
    if (!$con) {
        die("Couldn't connect to server");
    }
    if (!mysqli_select_db($con, "home_vices")) {
        die("Couldn't select database");
    }
    return $con;
}

$con = db_connect();
echo "<h2>Connected and database selected successfully</h2>";

// Function to sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Process POST request for service selection and client data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedOption = sanitizeInput($_POST["service"]);
    $cname = sanitizeInput($_POST['name']);
    $cphone = sanitizeInput($_POST['phone']);
    $cemail = sanitizeInput($_POST['email']);
    $cadd = sanitizeInput($_POST['address']);
    $bt = sanitizeInput($_POST['booking_time']);
    $quantity = sanitizeInput($_POST['quantity']);
    $hours = sanitizeInput($_POST['hours']);

    // Check for valid service selection
    if (empty($selectedOption)) {
        die("No service selected");
    } else {
        echo "Selected option: $selectedOption";
    }

    // Insert client data into the client table
    $clientInsert = "INSERT INTO client (clientName, clientPhone, clientEmail, clientAddress) 
                     VALUES ('$cname', '$cphone', '$cemail', '$cadd')";
    if (!mysqli_query($con, $clientInsert)) {
        die("Couldn't add client record");
    }
    echo "<br>Client record added.<br>";

    // Fetch the rate from the service table
    $rate = fetchServiceRate($con, $selectedOption);

    // Fetch the client ID
    $cid = fetchLatestID($con, 'client', 'clientID');

    // Fetch the worker ID for the selected service
    $wid = fetchWorkerID($con, $selectedOption);

    // Insert booking into the schedule table
    insertBooking($con, $cid, $wid, $quantity, $hours, $rate, $bt);

    // Show confirmation with client name and total price
    showBookingConfirmation($con);
}

// Function to fetch service rate
function fetchServiceRate($con, $serviceName) {
    $query = "SELECT serviceRate FROM service WHERE serviceName = '$serviceName'";
    $result = mysqli_query($con, $query);
    return ($result->num_rows > 0) ? mysqli_fetch_assoc($result)['serviceRate'] : null;
}

// Function to fetch latest ID from a given table and column
function fetchLatestID($con, $table, $column) {
    $query = "SELECT $column FROM $table ORDER BY $column DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    return ($result->num_rows > 0) ? mysqli_fetch_assoc($result)[$column] : null;
}

// Function to fetch worker ID for a selected service
function fetchWorkerID($con, $serviceName) {
    $query = "SELECT workerID FROM worker_services WHERE serviceName = '$serviceName'";
    $result = mysqli_query($con, $query);
    return ($result->num_rows > 0) ? mysqli_fetch_assoc($result)['workerID'] : null;
}

// Function to insert booking into the schedule table
function insertBooking($con, $cid, $wid, $quantity, $hours, $rate, $bt) {
    $bookingQuery = "INSERT INTO schedule (clientID, workerID, quantity, hours, rate, booking_time, booking_status) 
                     VALUES ($cid, $wid, '$quantity', '$hours', $rate, '$bt', 'waiting')";
    if (mysqli_query($con, $bookingQuery)) {
        echo "Booking added with status: waiting.<br>";
    } else {
        die("Couldn't add booking");
    }
}

// Function to show booking confirmation
function showBookingConfirmation($con) {
    $query = "SELECT client.clientName, schedule.total_price 
              FROM client, schedule 
              WHERE client.clientID = schedule.clientID 
              ORDER BY scheduleID DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>Client NAME: " . $row['clientName'] . "<br>Your total Price is: " . $row['total_price'] . "<br>";
        }
    } else {
        echo "No record found.<br>";
    }
}

// PHPMailer setup and email sending
function sendConfirmationEmail($cName, $cEmail, $service, $booking_id) {
    $accept_link = "http://localhost:80/weblabs/lab12/sendermail/homevice/Home-Vices-main/Project/update_status.php?id=$booking_id&status=accepted";
    $reject_link = "http://localhost:80/weblabs/lab12/sendermail/homevice/Home-Vices-main/Project/update_status.php?id=$booking_id&status=rejected";

    $subject = "Confirm Your Booking";
    $message = "Dear $cName,\n\nThank you for choosing our service. You have booked the following service:\n\nService: $service and your booking ID is $booking_id. You can use it to check booking status.\n\nPlease confirm your booking by clicking one of the options below:\n\nAccept: $accept_link\nReject: $reject_link\n\nRegards,\nHome Vices";

    require 'path_to_phpmailer/PHPMailer.php';
    require 'path_to_phpmailer/SMTP.php';
    require 'path_to_phpmailer/Exception.php';

    $mail = new PHPMailer(true);
    try {
        // Setup SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sarahsk002@gmail.com';
        $mail->Password = 'nxqyplvnwdsildln';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email content
        $mail->setFrom('sarahsk002@gmail.com', 'Home Vices');
        $mail->addAddress($cEmail, $cName);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();
        echo 'Email sent successfully!<br>';
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}<br>";
    }
}

// Fetch the scheduleID after booking
$booking_id = fetchLatestID($con, 'schedule', 'scheduleID');
if ($booking_id) {
    sendConfirmationEmail($cname, $cemail, $selectedOption, $booking_id);
} else {
    echo "Error fetching booking ID.<br>";
}
?>
