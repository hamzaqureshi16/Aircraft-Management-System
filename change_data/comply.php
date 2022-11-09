<?php

include "../PHPscript/DBconnection.php";
session_start();
if(isset($_POST['comply'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM bulletins WHERE id = '$id'";

    if (mysqli_query($conn,$sql))
    {
    
        echo "<script>alert('Record Added!');</script>";
        header("Location: ../ProjectTest_engineer.php");
    }
    else
    {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else if($_POST['all']){
    if(mysqli_query($conn,"TRUNCATE bulletins")){
        echo "<script>alert('complied all!');</script>";
        header("Location: ../ProjectTest_engineer.php");
    
    }
}
?>