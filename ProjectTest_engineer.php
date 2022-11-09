<?php 

include "PHPscript/DBconnection.php";
session_start();
if (isset($_POST['edit_submit'])) {
$first_name =  $_POST['firstname'];
$last_name = $_POST['lastname'];
$address =  $_POST['address'];
$cnic = $_POST['cnic'];
$dob = date('Y-m-d', strtotime($_POST['dob']));
$sql = "UPDATE engineers SET engineers_Fname='".$first_name."',engineers_Lname='".$last_name."',engineers_address='".$address."',engineers_CNIC='".$cnic."',engineers_DOB='".$dob."' where engineers_Fname='".$_SESSION['username']."'";
$sql2 = "UPDATE login  SET username='".$first_name."' where username='".$_SESSION['username']."'";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) ) {
    echo "<script>alert('Record Updated');</script>";
    $_SESSION['username']=$first_name;
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  unset($_POST['edit_submit']);
}

if (isset($_POST['aircraft_manu'])) {
    $facility= $_POST['facility'];
    $manufact=$_POST['manufact'];
    $from_date=date('Y-m-d', strtotime($_POST['fromdate']));
    $to_date=date('Y-m-d', strtotime($_POST['todate']));
    $manu_type=$_POST['manu_type'];
    $sql= "INSERT INTO maintenance_check (maintanance_facility_name, Aircraft_registration, from_date,to_date,Maintenance_Type) VALUES ('$facility', '$manufact', '$from_date','$to_date','$manu_type')";
    $sql2 = "UPDATE aircraft SET Aircraft_airworthy=1 where Aircraft_registration='".$manufact."'";
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) ) {
        echo "<script>alert('Record Updated');</script>";
    }
    else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      unset($_POST['aircraft_manu']);
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/overlaycss.css">    
<link rel="stylesheet" href="css/ProjectTest.css">   
    <title>
        Aircraft Management System
    </title>

    <body>
       <main>
        <div class="topnav" id="navabar" >
            <img src="images/aviation-logo-vector-20.png" width="100" height="100" >
            <button><a href="./PHPscript/logout.php">Log Out</a></button>
        </div>
        <div class="grid"> 
            <div>
                <button id="editengineer">Edit Details</button>
                <button id="maint">Maintenance Check</button>
                <button id="fleet">Fleet overview</button>
                <button id="engineering">Engineering</button>
                <button id="maintainence">Maintainence</button>
                <button id="fuelreserves">See Fuel Reserves</button>
                <button id="route">Routes</button>
                <button id="lo">Lessors/Owners</button>
                <button id="airports">Airports</button>
                <button id="parts">Parts</button>
                <button id="bulletins">Service Bulletins</button>
                        </tbody>
                      </table>
            </div>
         </div>
       </main>
       <div>

       <div class="overlay" id="maintenance_check">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT maintanance_facility_name FROM maintaincefacilty";
                    $query2 = "SELECT Aircraft_registration FROM aircraft";
                    $result1 = mysqli_query($conn,$query);
                    $result2 = mysqli_query($conn,$query2);
                    $maint_name=array();
                    $manufact=array();
                    while($rows = mysqli_fetch_assoc($result1))
                    {
                        array_push($maint_name,$rows['maintanance_facility_name']);
                    }
                    while($rows2 = mysqli_fetch_assoc($result2))
                    {
                        array_push($manufact,$rows2['Aircraft_registration']);
                    }
                    
                    ?>
                    <h3>Add Aircraft for Maintenance</h3>
                    <form action="ProjectTest_engineer.php" method="post">
                    <label for="facility">Maintenance Facility</label>
                    <select name="facility" id="facility" style="padding:10px;">
                        <?php
                        
                        // Iterating through the product array
                        foreach($maint_name as $main){
                            echo "<option value='$main'>$main</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="manufact">Aircraft_Registration</label>
                    <select name="manufact" id="manufact" style="padding:10px;">
                        <?php
                        
                        // Iterating through the product array
                        foreach($manufact as $manu){
                            echo "<option value='$manu'>$manu</option>";
                        }
                        ?>
                    </select>
                    <label for="fromdate">From Date</label>
                    <input type="date" id="fromdate" name="fromdate" style="padding: 10px;" >
                    <label for="todate">To Date</label>
                    <input type="date" id="todate" name="todate" style="padding: 10px;" >
                    <label for="manu_type">Manufacturer Type</label>
                    <select name="manu_type" id="manu_type" style="padding: 10px;">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                   <br>
                    <br>
                    <input type="submit" value="Submit"  name = "aircraft_manu" style="padding: 10px;" >
                </form>
                        </div>
                    </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                    <script src="js/maintenance.js"></script>
        
                </div>

            <div>


            <div class="overlay" id="engineer_overlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM engineers where engineers_Fname = '".$_SESSION['username']."'";
                    $result = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_assoc($result);
                    $yourname=$rows['engineers_Fname'];
                    $yourlastname=$rows['engineers_Lname'];
                    $youraddress=$rows['engineers_address'];
                    $yourcnic=$rows['engineers_CNIC'];
                    
                    ?>
                    <h3>Edit Your Details</h3>
                    <form action="ProjectTest_engineer.php" method="post">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" style="padding: 10px;" value="<?php echo $yourname ?>" required>

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" style="padding: 10px;" value="<?php echo $yourlastname ?>" required>

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address"  style="padding: 10px; width:100%;" value="<?php echo $youraddress ?>" required>

                    <label for="cnic">CNIC</label>
                    <input type="text" id="cnic" name="cnic"  style="padding: 10px; width:80%;" value="<?php echo $yourcnic ?>" required>
                    
                    <label for="dob">Your DOB</label>
                    <input type="date" id="dob" name="dob" style="padding: 10px;" required>
                    <br>
                    <input type="submit" value="Submit"  name = "edit_submit" style="padding: 10px;" >
                </form>
                        </div>
                    </div>

       <div class="overlay" id="engineer_overlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM engineers where engineers_Fname = '".$_SESSION['username']."'";
                    $result = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_assoc($result);
                    $yourname=$rows['engineers_Fname'];
                    $yourlastname=$rows['engineers_Lname'];
                    $youraddress=$rows['engineers_address'];
                    $yourcnic=$rows['engineers_CNIC'];
                    
                    ?>
                    <h3>Edit Your Details</h3>
                    <form action="ProjectTest_engineer.php" method="post">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" style="padding: 10px;" value="<?php echo $yourname ?>" required>

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" style="padding: 10px;" value="<?php echo $yourlastname ?>" required>

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address"  style="padding: 10px; width:100%;" value="<?php echo $youraddress ?>" required>

                    <label for="cnic">CNIC</label>
                    <input type="text" id="cnic" name="cnic"  style="padding: 10px; width:80%;" value="<?php echo $yourcnic ?>" required>
                    
                    <label for="dob">Your DOB</label>
                    <input type="date" id="dob" name="dob" style="padding: 10px;" required>
                    <br>
                    <input type="submit" value="Submit"  name = "edit_submit" style="padding: 10px;" >
                </form>
                        </div>
                    </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                    <script src="js/edit_engineer.js"></script>
        
                </div>

            <div>

        <div class="overlay" id="fleetoverlay" >
            <div class="overlay-background" id="overlay-background"></div>
                <div class="overlay-content" id="overlay-content">
                    <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
           
                    
                    <?php
                    
                    $query = "SELECT * FROM aircraft";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?><h3>Aircraft Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>Aircraft_registration</th>
                            <th>Aircraft_manufacturer</th>

                            <th>Type</th>
                            <th>Config</th>
                            <th>MSN</th>
                            <th>Hexcode</th>
                            <th>Delivery Date</th>
                            <th>Location</th>
                            <th>Eng. Team</th>
                            <th>Range</th>
                          
                            <th>Engine</th>
                            
                            <th>Age</th>
                           
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td >
                                   <a href=""> <?php echo $rows['Aircraft_registration'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_manufacturer'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_type'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_seatconfig'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_MSN'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_hexcode'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_deliverydate'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_loc'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_engineering_team'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_range'] ?></a>
                                </td>
                                
                               
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_engine'] ?></a>
                                </td>

                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_age'] ?></a>
                                </td>
                                
                               
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
            
                </div>
            </div>
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

            <script>(function () {
                var calculateHeight;
              
                calculateHeight = function () {
                  var $content, contentHeight, finalHeight, windowHeight;
                  $content = $('#overlay-content');
                  contentHeight = parseInt($content.height()) + parseInt($content.css('margin-top')) + parseInt($content.css('margin-bottom'));
                  windowHeight = $(window).height();
                  finalHeight = windowHeight > contentHeight ? windowHeight : contentHeight;
                  return finalHeight;
                };
              
                $(document).ready(function () {
                  $(window).resize(function () {
                    if ($(window).height() < 560 && $(window).width() > 600) {
                      $('#overlay').addClass('short');
                    } else {
                      $('#overlay').removeClass('short');
                    }
                    return $('#overlay-background').height(calculateHeight());
                  });
                  $(window).trigger('resize');
              
                  // open
                  $('#fleet').click(function () {
                    return $('#fleetoverlay').addClass('open').find('.signup-form input:first').select();
                  });
              
                  // close
                  return $('#overlay-background,#overlay-close').click(function () {
                    return $('#fleetoverlay').removeClass('open');
                  });
                });
              
              }).call(this);
                     </script>
    
    </div>

    <div class="overlay" id="bulletin_overlay">
            <div class="overlay-background" id="overlay-background"></div>
                <div class="overlay-content" id="overlay-content">
                    <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
           
                    
                    <?php
                    
                    $query = "SELECT * FROM bulletins";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Aircraft Details</h3>

                    
                    
                    <table class="tablestyle">
                        <tr>
                            <th>ID</th>
                            <th>Manufacturer</th>
                            <th>Type</th>
                            <th>Implement till</th>
                            <th>Details</th>
                            <th>Status</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                            <form action="./change_data/comply.php" method="post">
                                <td>
                                    <input type="text" name="id" value="<?php echo $rows['id'] ?>" style = "text-align:center;" readonly>
                                </td>
                                <td>
                                    <?php echo $rows['Manufacturer'] ?>
                                </td>
                                <td>
                                <?php echo $rows['type'] ?>
                                </td>
                                <td>
                                    <?php echo $rows['imptill'] ?>
                                </td>
                              <td>
                                    <?php echo $rows['details'] ?>
                                </td> 
                                <td>
                                <input type="submit" value="Implemented"  name="comply">
                                </td>

                                </form>
                            </tr>
                            <?php
                        }?>
                        <tr>
                            <form action="./change_data/comply.php" method="post">
                            <td>
                                <input type="submit" value="Comply All" name ="all">
                            </td>
                            </form>
                        
                        </tr>
                    </table>
            
                    
                </div>
            
            </div>
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="js/bulletin_overlay.js"></script>
    
    </div>
        <div>

            <div class="overlay" id="overlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM order_aircraft";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Buy Aircraft</h3>
                    <table class="tablestyle">
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                  <?php echo ''. $rows['order_aircraft_reg']; ?>
                                </td>
                                <td>
                                  <?php echo ''. $rows['order_aircraft_manufacturer']; ?>
                                </td>
                                <td>
                                  <?php echo ''. $rows['order_aircraft_from']; ?>
                                </td>
                                <td>
                                  <?php echo ''. $rows['order_aircraft_budget']; ?>
                                </td>
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                        </div>
                    </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                    <script src="js/editairc.js"></script>
        
                </div>

            <div>

            <div class="overlay" id="engoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM engineers";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Engineers Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>Engineer Name</th>
                            <th>Engineers_address</th>
                            <th>Engineer Team Id</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_Fname'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_address'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineering_team_id'] ?></a>
                                </td>
                                
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/engineeringoverlay.js"></script>
        
        </div>

        <div>

            <div class="overlay" id="maintoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
               
                        <?php
                    
                    $query = "SELECT * FROM maintaincefacilty";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Maintenance Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Vendor</th>
                            <th>Next check available</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['maintanance_facility_name'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['maintainanace_facility_location'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['maintancance_facility_partsvendor'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['next_check_availability'] ?></a>
                                </td>
                                
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/maintoverlay.js"></script>
        
        </div>
        <div>

            <div class="overlay" id="fuelresoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM fuel";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Fuel Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>fuel_pricepergallon</th>
                            <th>fuel_quantity</th>
                            <th>fuel_totalprice</th>
                            <th>fuel_companies_id</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['fuel_pricepergallon'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['fuel_quantity'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['fuel_totalprice'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['fuel_companies_id'] ?></a>
                                </td>
                                
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/fueloverlay.js"></script>
        
        </div>
        <div>

            <div class="overlay" id="routeoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM routes";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Routes</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>route_name</th>
                            <th>route_distance</th>
                            <th>route_time</th>
                            <th>route_reqfuel</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['route_name'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['route_distance'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['route_time'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['route_reqfuel'] ?></a>
                                </td>
                                
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/routeoverlay.js"></script>
        
        </div>
        <div>

            <div class="overlay" id="lo_overlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM lessor_owners";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Lessors/Owners</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>lessor_name</th>
                            <th>lessor_loaction</th>
                            <th>lessor_outstadingamount</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['lessor_name'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['lessor_loaction'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['lessor_outstadingamount'] ?></a>
                                </td>
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/lo_overlay.js"></script>
        
        </div>
        <div>

            <div class="overlay" id="airportoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM airports";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Airports</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>Airport_code</th>
                            <th>airport_name</th>
                            <th>airport_runways</th>
                            <th>airport_handling_charges</th>
                            <th>airport_location</th>
                            <th>ILS_availability</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['Airport_code'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['airport_name'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['airport_runways'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['airport_handling_charges'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['airport_location'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['ILS_availability'] ?></a>
                                </td>
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/airportoverlay.js"></script>
        
        </div>
        <div>

            <div class="overlay" id="partsoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM parts";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Parts</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>part_name</th>
                            <th>part_price</th>
                            <th>part_manufacturer</th>
                            <th>part_aircraft_type</th>
                            
                        </tr>
            
                        <form action="./PHPscript/orderparts.php" method="post">
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <input type="text" name="id" value="<?php echo $rows['part_name']?>" readonly>
                                </td>
                                <td>
                                   <input type="text" value="<?php echo $rows['part_price'] ?>" name ="price" readonyl>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['part_manufacturer'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['part_aircraft_type'] ?></a>
                                </td>
                                <td>
                                    <input type="number_format" name= "number">
                                </td>
                               <td>
                                <input type="submit" value="Buy" name="buy">
                               </td>
                        </form> 
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/partsoverlay.js"></script>
        
        </div>
        <div>

            <div class="overlay" id="financeoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM aircraft_accounts";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Aircraft Accounts</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>aircraft_account_number </th>
                            <th>aircraft_account_balance</th>
                            <th>aircraft_account_owner</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['aircraft_account_number'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['aircraft_account_balance'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['aircraft_account_owner'] ?></a>
                                </td>
                                
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/financesoverlay.js"></script>
        
        </div>
    </body>
    
</html>