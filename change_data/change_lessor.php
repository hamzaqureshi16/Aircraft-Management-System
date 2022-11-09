<?php

include "../PHPscript/DBconnection.php";
session_start();

$i=1;
while($i)
{
    if(isset($_POST[$i]))
    {
        $naam=$_POST['naam'.''.$i];
        $location=$_POST['location'.''.$i];
        $outstad=$_POST['outstad'.''.$i];
        $sql = "UPDATE lessor_owners SET lessor_loaction='".$location."',lessor_outstadingamount='".$outstad."' where lessor_name='".$naam."'";

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