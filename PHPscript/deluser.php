<?php

include "../PHPscript/DBconnection.php";
session_start();
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM login WHERE id = '$id'";

    if (mysqli_query($conn,$sql))
    {
    
        echo "<script>alert('Record Deleted!');</script>";
        header("Location: ../ProjectTest_admin.php");
    }
    else
    {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>