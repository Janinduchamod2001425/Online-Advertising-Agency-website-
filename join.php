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

    if(isset($_POST['save']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $password = $_POST['password'];
        $position = $_POST['position'];
        $phone_number = $_POST['phone_number'];
        $city = $_POST['city'];
        $confirm_password = $_POST['confirm_password'];
        $gender = $_POST['gender'];

        // Check if the email is already registered
        $query = "SELECT * FROM registration WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Email is already registered
            echo '<script>alert("Email already registered. Please choose an alternative email or try logging in."); window.location.href = "join.html";</script>';
        } else {
            // Email is not registered, proceed with registration
            $insertQuery = "INSERT INTO registration(name,email,country,password,position,phone_number,city,confirm_password,gender) VALUES ('$name','$email','$country','$password','$position','$phone_number','$city','$confirm_password','$gender')";
            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Registered Successfully");</script>';
                header("Location: join.html");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
                header("location: join.html");
                exit();
            }
        }


        /*// sql connection

        $sql_query = "INSERT INTO registration(name,email,country,password,position,phone_number,city,confirm_password,gender) VALUES ('$name','$email','$country','$password','$position','$phone_number','$city','$confirm_password','$gender')";

        if(mysqli_query($conn, $sql_query))
        {
            header("Location: join.html");
            exit();
        }
        else{
            echo "Error : ".$sql_query. "" .mysqli_error($conn);
            header("location: join.html");
            exit();
        }*/
    }
?>



