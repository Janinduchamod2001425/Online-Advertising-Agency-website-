<?php

// Retrieve the data from the POST request
$card_number = $_POST['card_number'];
$cvv_number = $_POST['cvv_number'];
$expirationYear = $_POST['expirationYear'];
$expirationMonth = $_POST['expirationMonth'];

// Perform database connection and store the data

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "online_advertising_agency";

/*create a connection*/

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$database_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the database query
    $stmt = $conn->prepare("INSERT INTO payment_details (cardNumber, cvv, expirationYear, expirationMonth) VALUES (?, ?, ?, ?)");
    $stmt->execute([$card_number, $cvv_number, $expirationYear, $expirationMonth]);

    header("Location: paymentGateway.html");
    exit(); // exit after the redirect
} catch(PDOException $e) {
    header("Location: paymentGateway.html");
    exit(); //exit after the redirect
}
$conn = null;
?>
