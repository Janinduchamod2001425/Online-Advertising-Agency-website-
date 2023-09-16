<?php

/*connect the database*/
$con = new mysqli("localhost", "root", "", "online_advertising_agency");

/*check the database connection*/
if($con->connect_error)
{
    die("Connection Failed: ".$con->connect_error);
}

?>
