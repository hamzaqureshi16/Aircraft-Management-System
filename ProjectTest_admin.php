<?php 

include "PHPscript/DBconnection.php";
session_start();

if(isset($_POST['add_submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $passw=$_POST['passw'];
    $role=$_POST['role'];
    $address=$_POST['address'];
    $cnic=$_POST['cnic'];
    $salary=$_POST['salary'];
    $teamid=$_POST['teamid'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $sql= "INSERT INTO login (username, password, role) VALUES ('$firstname', '$passw', '$role')";
    if (mysqli_query($conn,$sql))
    {
        if($role=="engineer")
        {
            $sql2= "INSERT INTO engineers (engineers_Fname, engineers_Lname, engineers_address,engineers_CNIC,engineers_salary,engineers_DOB,engineering_team_id) VALUES ('$firstname', '$lastname', '$address','$cnic','$salary','$dob','$teamid')";
            if (!mysqli_query($conn,$sql2))
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
     echo "<script>alert('Record Added!');</script>";
    }
    else
    {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

   
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
                <button id="adduser">Add user</button>
                <button id="fleet">Fleet overview</button>
                <button id="popup-trigger">Buy Aircraft</button>
                <button id="engineering">Engineering</button>
                <button id="maintainence">Maintainence</button>
                <button id="fuelreserves">See Fuel Reserves</button>
                <button id="route">Routes</button>
                <button id="lo">Lessors/Owners</button>
                <button id="airports">Airports</button>
                <button id="parts">Parts</button>
                <button id="finances">Financials</button>
                <button id="addairport">Add Airport</button>
                <button id= "cv"> See Applicants</button>
                <button id="deluser">See User</button>
                        </tbody>
                      </table>
            </div>
         </div>
       </main>
       <div>
       <div class="overlay" id="adduserovelay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                    <h3>Add User</h3>

                    <form action="ProjectTest_admin.php" method="post">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" style="padding: 10px;"  required>

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" style="padding: 10px;"  required>

                    <label for="passw">Password</label>
                    <input type="password" id="passw" name="passw"  style="padding: 10px;" required>

                    <label for="role">Role</label>
                    <select name="role" id="role">
                    <option value="user">User</option>
                    <option value="engineer">Engineer</option>
                    </select>
                    <br>
                    <div id="engineer_info">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" style="padding: 10px;" >

                    <label for="cnic">CNIC</label>
                    <input type="text" id="cnic" name="cnic" style="padding: 10px;"  >

                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" style="padding: 10px;"  >
                    <label for="dob">DOB</label>
                    <input type="date" id="dob" name="dob" style="padding: 10px;" >

                    <label for="teamid">Team Id</label>
                    <input type="text" id="teamid" name="teamid" style="padding: 10px;" >
                    </div>
                    <br>
                    <input type="submit" value="Submit"  name = "add_submit" style="padding: 10px;" >
                </form>
                        </div>
                    </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                    <script src="js/add_user.js"></script>
        
                </div>

            <div>


        <div class="overlay" id="fleetoverlay">
            <div class="overlay-background" id="overlay-background"></div>
                <div class="overlay-content" id="overlay-content">
                    <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
           
                    
                    <?php
                    
                    $query = "SELECT * FROM adminfleet";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Aircraft Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>Aircraft_registration</th>
                            <th>Aircraft_manufacturer</th>
                            <th>Type</th>
                            <th>Config</th>
                            <th>Location</th>
                            <th>Range</th>
                            <th>Next Route</th>
                            <th>Owners</th>
                            <th>Purchase Price</th>
                            <th>selling price</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
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
                                   <a href=""> <?php echo $rows['Aircraft_loc'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_range'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_route'] ?></a>
                                </td>
                                
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_lessor_owner'] ?></a>
                                </td>
                                
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_lessor_owner'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['Aircraft_sellingprice'] ?></a>
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
        <div>

            <div class="overlay" id="overlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM orderairc";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Buy Aircraft</h3>
                    <form action="./change_data/buyairc.php" method="post">
                    <table class="tablestyle">

<tr>
    <th>Registraton</th>
    <th>Manufacturer</th>
    <th>Owner</th>
    <th>price</th>
</tr>
    <?php
    while($rows = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td>
              <input type="text" name="id" value="<?php echo  $rows['order_aircraft_reg']; ?>">
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
            <td>
                
            </td>

        </tr>
        <?php
    }?>
</table>
                    </form>
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
                    
                    $query = "SELECT * FROM adminengineer";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Engineers Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Engineers_address</th>
                            <th>Salary</th>
                            <th>Engineer Team Id</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['Engineers_id'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_Fname'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_Lname'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_address'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_salary'] ?></a>
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
                            <th>Facility Name</th>
                            <th>Location</th>
                            <th>Parts Vendor</th>
                            <th>Check Availability</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                               <form action="./change_data/change_maintenance.php" method="post">
                                    <td>
                                   <input type="text" name="<?php echo 'naam'.$rows['maintainance_facility_id']; ?>" value="<?php echo $rows['maintanance_facility_name'] ?>"> 
                                </td>
                                <td>
                                    <input type="text" name="<?php echo 'location'.$rows['maintainance_facility_id']; ?>" value="<?php echo $rows['maintainanace_facility_location'] ?>">
                                  </td>
                                <td>
                                <input type="text" name="<?php echo 'partsvendor'.$rows['maintainance_facility_id']; ?>" value="<?php echo $rows['maintancance_facility_partsvendor'] ?>" readonly>
                                 </td>
                                <td>
                                <input type="text" name="<?php echo 'availability'.$rows['maintainance_facility_id']; ?>" value="<?php echo $rows['next_check_availability'] ?>">
                                </td>
                                <td>
                                <input type="submit" value="Change"  name="<?php echo $rows['maintainance_facility_id']; ?>">
                                        </td>
                                    </form>
                                
                                
                                
            
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
                            <th>Price per gallon</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Companies id</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                
                                    
                                <td>
                                <?php echo $rows['fuel_pricepergallon'] ?> 
            
                                </td>
                                <td>
                                    
                                <?php echo $rows['fuel_quantity'] ?> 
                                  
                                </td>
                                <td>
                                <?php echo $rows['fuel_totalprice'] ?>
                                  
                                   </td>
                                <td>
                                <?php echo $rows['fuel_companies_id'] ?> 
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
                            <th>Route</th>
                            <th>Distance</th>
                            <th>Time</th>
                            <th>Required Fuel</th>
                            
                        </tr>
            
                        <?php
                        $i=1;
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <form action="./change_data/change_routes.php" method="post">
                                <td>
                                <input type="text" name="<?php echo 'naam'.$i; ?>" value="<?php echo $rows['route_name'] ?>" readonly>
                                </td>
                                <td>
                                    
                                <input type="text" name="<?php echo 'distance'.$i; ?>" value="<?php echo $rows['route_distance'] ?>">
                                </td>
                                <td>
                                    
                                <input type="text" name="<?php echo 'time'.$i; ?>" value="<?php echo $rows['route_time'] ?>">
                                </td>
                                <td>
                                    
                                <input type="text" name="<?php echo 'reqfuel'.$i; ?>" value="<?php echo $rows['route_reqfuel'] ?>">
                                 </td>
                                 <td>
                                 <input type="submit" name="<?php echo ''.$i++; ?>" value="Change">
                                 </td>
                                 </form>
                                
            
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
                        $i=1;
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <form action="./change_data/change_lessor.php" method="post">
                                <td>
                                <input type="text" name="<?php echo 'naam'.$i; ?>" value="<?php echo $rows['lessor_name'] ?>" readonly>
                                
                                </td>
                                <td>
                                <input type="text" name="<?php echo 'location'.$i; ?>" value="<?php echo $rows['lessor_loaction'] ?>">
                                </td>
                                <td>
                                <input type="text" name="<?php echo 'outstad'.$i; ?>" value="<?php echo $rows['lessor_outstadingamount'] ?>">
                                   </td>
                                   <td>
                                 <input type="submit" name="<?php echo ''.$i++; ?>" value="Change">
                                 </td>
                                </form>
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

            <div class="overlay" id="deluseroverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM login";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Airports</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Role</th>
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                               <form action="./PHPscript/deluser.php" method="post">
                               <td>
                                <input type="text" name="id" value="<?php echo $rows['id'] ?>" style = "text-align:center;" readonly>
                                </td>
                               
                                <td>
                                   <a href=""> <?php echo $rows['username'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['role'] ?></a>
                                </td>
                                <td>
                                <input type="submit" value="Delete User" name="delete">
                                </td>
                               </form>
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/deluser.js"></script>
        
        </div>
        




        <div>

            <div class="overlay" id="cvoverlay">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM cv";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Airports</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                               <form action="./change_data/deleteApplicant.php" method="post">
                               <td>
                                <input type="text" name="id" value="<?php echo $rows['id'] ?>" style = "text-align:center;" readonly>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['fname'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['lname'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['email'] ?></a>
                                </td>
                               <td>
                                <input type="submit" value="delete" name="delete">
                               </td>

                               </form>
            
                            </tr>
                            <?php
                        }?>
                    </table>
                    </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                <script src="js/cvoverlay.js"></script>
        
        </div>
        <div>
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
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['part_name'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['part_price'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['part_manufacturer'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['part_aircraft_type'] ?></a>
                                </td>
                                
            
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
        <div>

            <div class="overlay" id="add_port">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM order_aircraft";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Add Airport</h3>
                    <form action="./PHPscript/add_airport.php" method="post">
                    <label for="code">Airport Code</label>
                    <input type="text" id="code" name="code" style="padding: 10px;" >
                    <label for="naam">Airport Name</label>
                    <input type="text" id="naam" name="naam" style="padding: 10px;" >
                    <label for="runways">Airport Runways</label>
                    <input type="text" id="runways" name="runways" style="padding: 10px;" >
                    <label for="charges">Airport Handling Charges</label>
                    <input type="text" id="charges" name="charges" style="padding: 10px;" >
                    <label for="location">Airport Location</label>
                    <input type="text" id="location" name="location" style="padding: 10px;" >
                    <label for="ils">ILS Availability</label>
                    <select name="ils" id="ils" style="padding: 10px;">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                   <br>
                    <br>
                    <input type="submit" value="Add Details"  name = "prt" style="padding: 10px;" >
                </form>
                        </div>
                    </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                    <script src="js/airport_add.js"></script>
        
                </div>
    </body>
    
</html>