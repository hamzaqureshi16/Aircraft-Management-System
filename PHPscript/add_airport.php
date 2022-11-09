<?php

include "./DBconnection.php";

session_start();
$code =  $_POST['code'];
$naam = $_POST['naam'];
$runways =  $_POST['runways'];
$charges = $_POST['charges'];
$location = $_POST['location'];
$ils = $_POST['ils'];
$sql= "INSERT INTO airports (Airport_code, airport_name, airport_runways,airport_handling_charges,airport_location,ILS_availability) VALUES ('$code', '$naam', '$runways','$charges','$location','$ils');";
if (mysqli_query($conn, $sql))
{
    echo "<script>alert('Record Added');</script>";
    header("Location: ../ProjectTest_admin.php");

        }
else{
    echo "Error updating record: " . mysqli_error($conn);
}

?>