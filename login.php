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

if(isset($_POST['log']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is registered one or not
    $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        // Email is already registered
        echo '<script>alert("Email is not registered Or incorrect password. Please register or enter correct password!"); window.location.href = "login.html";</script>';
    } else {
        // Email is not registered, proceed with registration
        $insertQuery = "INSERT INTO login(email,password) VALUES ('$email','$password')";
        if (mysqli_query($conn, $insertQuery)) {
            echo '<script>alert("Login Successfully :) ");</script>';
            header("Location: home.html");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            header("location: login.html");
            exit();
        }
    }

    /*$sql_query = "INSERT INTO login(email,password) VALUES ('$email','$password')";

    if(mysqli_query($conn, $sql_query))
    {
        // Set the success message in a session variable
        session_start();
        $_SESSION['success_message'] = "Form submitted successfully!";

        // Redirect back to the HTML form
        header("Location: login.html");
        exit(); // Make sure to exit after the redirect
    }
    else{
        echo "Error : ".$sql_query. "" .mysqli_error($conn);
        header("location: login.html");
        exit();
    }*/
}
/*if (isset($_POST['save']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    //sql to select if there's the details in the database
    $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";

    // execute the query
    $result = mysqli_query($conn, $sql);

    // count the number of account with same email and password

    $count = mysqli_num_rows($result);

    // put the count results into one associate array

    $row = mysqli_fetch_assoc($result);

    // check if there's at least one account in the database
    if($count == 1)
    {
        // message to welcome admin to the dashboard

        $_SESSION['login Message'] = '<span class="success">Welcome '.$email.'</span>';
        header("location: login.html");
        exit();
    }
    else{
        // message if the admin account is not in the database

        $_SESSION['login Message'] = '<span class="failed">'.$email.' is not registered!</span>';
        header("location: login.html");
        exit();
    }

}*/

?>