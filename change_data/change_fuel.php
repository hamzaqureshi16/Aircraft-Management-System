<?php 
include "../PHPscript/DBconnection.php";
session_start();

$i=1;
while($i)
{
    if(isset($_POST[$i]))
    {
        $price=$_POST['price'.''.$i];
        $quantity=$_POST['quantity'.''.$i];
        $total_price=$_POST['total_price'.''.$i];
        $id=$_POST['id'.''.$i];
        $sql = "UPDATE fuel SET fuel_pricepergallon='".$price."',fuel_quantity='".$quantity."',fuel_totalprice='".$total_price."' where fuel_lot_id='".$i."'";

        if(mysqli_query($conn, $sql))
        {
            echo "<script>alert('Record Updated');</script>";
            header("Location: ../ProjectTest_admin.php");
        }
        else{
            echo "Error updating record: " . mysqli_error($conn);
        }
        
        break;
    }
    $i++;
}


?>