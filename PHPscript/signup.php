<?php
$username = $_POST['uname'];
$password = $_POST['psw'];

$conn = new mysqli('localhost','root','','logintest');

if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);

}else{
    $stmt  = $conn->prepare("insert into login_table(username, password) values (?,?)");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    echo "successfull";
    $stmt->close();
    $conn->close();
}

?>