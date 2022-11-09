<?php
$organization = $_POST['orgname'];
$fleet = $_POST['fleetsize'];
$budget = $_POST['budget'];


$conn = new mysqli('localhost','root','','aircraft_managment_system');

if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);

}else{
    $stmt  = $conn->prepare("insert into quote(organization_name, fleet_size, budget,
    submission_date) values(?,?,?,current_date());");
    $stmt->bind_param("sii",$organization,$fleet,$budget);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<script>alert('You'll be contacted soon');</script>";
    header("Location: ../Homepage.php");
}

?>