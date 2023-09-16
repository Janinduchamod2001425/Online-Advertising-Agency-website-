<?php

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "online_advertising_agency";

$conn = mysqli_connect($server_name,$username,$password,$database_name);

// check the connection

if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}

// Insert data into database

if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message = $_POST['message'];

    // sql connection

    $sql_query = "INSERT INTO contacts(name,email,phone_number,message) VALUES ('$name','$email','$phone_number','$message')";

    if(mysqli_query($conn, $sql_query))
    {
        // Set the success message in a session variable
        session_start();
        $_SESSION['success_message'] = "Form submitted successfully!";

        /*echo "<h1 class='Confirmation_message' style='text-align: center; margin: 50px 0 0 200px; color: blue'>New Details Entry inserted successfully !</h1>";*/
        // Redirect back to the HTML form
        header("Location: ContactUs.html");
        exit(); // Make sure to exit after the redirect
    }
    else{
        echo "Error : ".$sql_query. "" .mysqli_error($conn);
        header("location: ContactUs.html");
        exit();
    }
}
?><?php
