<?php

// Retrieve the data from the POST request
$name = $_POST['name'];
$price = $_POST['price'];
$duration = $_POST['duration'];
$total = $_POST['total'];
$client = $_POST['client'];
$date = $_POST['date'];

// Perform database connection and store the data
// using PDO:
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "online_advertising_agency";

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$database_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the database query
    $stmt = $conn->prepare("INSERT INTO invoice (name, price, duration, total, client, date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $price, $duration, $total, $client, $date]);

    echo "Data stored successfully.";
    header("location: paymentGateway.html");
    exit();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    header("location: paymentGateway.html");
    exit();
}
$conn = null;

?>
