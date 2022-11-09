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
        $availability=$_POST['availability'.''.$i];
        $sql = "UPDATE maintaincefacilty SET maintanance_facility_name='".$naam."',maintainanace_facility_location='".$location."',next_check_availability='".$availability."' where maintainance_facility_id='".$i."'";

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