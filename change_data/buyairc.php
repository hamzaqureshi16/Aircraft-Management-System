<?php

include "../PHPscript/DBconnection.php";
session_start();
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    
    
    $sql0 = "UPDATE aircraft_accounts set aircraft_account_balance as aircraft_account_balance-(select order_aircraft_budget where order_aircraft_reg = '$id');"
    $sql1 = "INSERT INTO aircraft(aircraft_registration, aircraft_seatconfig, aircraft_manufacturer, aircraft_age,aircraft_lessor_owner, aircraft_type, aircraft_MSN, aircraft_hexcode,aircraft_range, aircraft_engine, aircraft_location) select * from order_aircraft where order_aircraft_reg = '$id';"
    $sql2 = "DELETE from order_aircraft where order_aircraft_reg ='$id'";

    if(mysqli_query($conn,$sql0)){
        if(mysqli_query($conn,$sql1)){
            if (mysqli_query($conn,$sql2))
            {
            
                echo "<script>alert('Record Added!');</script>";
                header("Location: ../ProjectTest_engineer.php");
            }
            else
            {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

   
}
else if($_POST['all']){
    if(mysqli_query($conn,"TRUNCATE bulletins")){
        echo "<script>alert('complied all!');</script>";
        header("Location: ../ProjectTest_engineer.php");
    
    }
}
?>