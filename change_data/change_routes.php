<?php

include "../PHPscript/DBconnection.php";
session_start();

$i=1;
while($i)
{
    if(isset($_POST[$i]))
    {
        $naam=$_POST['naam'.''.$i];
        $distance=$_POST['distance'.''.$i];
        $time=$_POST['time'.''.$i];
        $reqfuel=$_POST['reqfuel'.''.$i];
        $sql = "UPDATE routes SET route_distance='".$distance."',route_time='".$time."',route_reqfuel='".$reqfuel."' where route_name ='".$naam."'";

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