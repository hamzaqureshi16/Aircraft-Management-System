<?php

include "../PHPscript/DBconnection.php";

if(isset($_POST['buy'])){
    $id = $_POST['id'];
    $num = $_POST['number'];
    
   
    $sql1=  "UPDATE aircraft_accounts set aircraft_account_balance = aircraft_account_balance-(select part_price*'$num' from parts where part_name = '$id') where aircraft_account_balance= (select MAX(aircraft_account_balance) from aircraft_accounts)";
    mysqli_query($conn,$sql1);
    header("Location: ../ProjectTest_engineer.php");
}

?>