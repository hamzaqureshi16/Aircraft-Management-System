<?php
include "DBconnection.php";

$query = "SELECT * FROM aircraft";
$result = mysqli_query($conn,$query);


?>
<!DOCTYPE html>
<html>

    <title>get operation</title>
    <body>

    <table class="tablestyle">
            <tr>
                <th>aircarft Registration</th>
                <th>Manufacturer</th>
                <th>type</th>
                <th>age</th>
                <th>msn</th>
                <th>loc</th>
            </tr>

            <?php
            while($rows = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td>
                        <?php echo $rows['Aircraft_registration'] ?>
                    </td>
                    <td>
                        <?php echo $rows['Aircraft_manufacturer'] ?>
                    </td>
                    <td>
                        <?php echo $rows['Aircraft_type'] ?>
                    </td>
                    <td>
                        <?php echo $rows['Aircraft_age'] ?>
                    </td>
                    <td>
                        <?php echo $rows['Aircraft_MSN'] ?>
                    </td>
                    <td>
                        <?php echo $rows['Aircraft_loc']  ?>
                    </td>

                </tr>
                <?php
            }?>
        </table>
    </body>
</html>

