<?php
include "DBconnection.php";


$username = $_POST['username'];
$old = $_POST['old'];
$new  = $_POST['new'];

$sql = "SELECT username FROM login WHERE username = '$username' and password = '$old'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $sql1 = "UPDATE login set password = '$new' where username = '$username'";
        
        if(mysqli_query($conn, $sql1)){
            header("Location: ../ProjectTest.php");
        }
}
?>