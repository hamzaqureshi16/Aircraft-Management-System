<?php
include "DBconnection.php";

if(isset($_POST['submit'])){
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email = $_POST['email'];

    $stmt  = $conn->prepare("insert into cv(fname, lname, email) values(?,?,?);");
    $stmt->bind_param("sss",$first,$last,$email);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<script>alert('You'll be contacted soon');</script>";
    header("Location: ../Homepage.php");}
?>