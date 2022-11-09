<?php 

include "PHPscript/DBconnection.php";
session_start();


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
                 <button id="regist">Change password</button>
                <button id="fleet">Fleet overview</button>
                <button id="popup-trigger">Aircraft available for sale</button>
                <button id="engineering">Engineering</button>
                <button id="maintainence">Maintainence</button>
                <button id="fuelreserves">See Fuel Reserves</button>
                <button id="route">Routes</button>
                <button id="lo">Lessors/Owners</button>
                <button id="airports">Airports</button>
                <button id="parts">Parts</button>
               
                        </tbody>
                      </table>
            </div>
         </div>
       </main>
       <div>

       <div class="overlay" id="aircraft_reg">
                <div class="overlay-background" id="overlay-background"></div>
                    <div class="overlay-content" id="overlay-content">
                        <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
                        <?php
                    
                    $query = "SELECT * FROM login where username = '".$_SESSION['username']."'";
                    $result = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_assoc($result);
                    $yourname=$rows['username'];
                    $yourlastname=$rows['password'];
                    
                    
                    ?>
                    <h3>Edit Your Details</h3>
                    <form action="PHPscript/edituser.php" method="post">
                    <label for="fname">UserName</label>
                    <input type="text" id="fname" name="username" style="padding: 10px;" required>

                    <label for="lname">old password</label>
                    <input type="text" id="lname" name="old" style="padding: 10px;"  required>
                    
                    <label for="lname">new password</label>
                    <input type="text" id="lname" name="new" style="padding: 10px;"  required>
                    
                    
                    <input type="submit" value="Submit"  name = "edit_submit" style="padding: 10px;" >
                </form>
                        </div>
                    </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
                    <script src="js/aircraft_reg.js"></script>
        
                </div>

            <div>

        <div class="overlay" id="fleetoverlay">
            <div class="overlay-background" id="overlay-background"></div>
                <div class="overlay-content" id="overlay-content">
                    <div class="fa fa-times fa-lg overlay-close" id="overlay-close"></div>
           
                    
                    <?php
                    
                    $query = "SELECT * FROM userview";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Aircraft Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>Registration</th>
                            <th>Manufacturer</th>
                            <th>Type</th>
                            <th>Age</th>
                            <th>Selling Price</th>
                            
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
                                   <a href=""> <?php echo $rows['Aircraft_age'] ?></a>
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
                    
                    $query = "SELECT * FROM userengineer";
                    $result = mysqli_query($conn,$query);
                    
                    
                    ?>
                    <h3>Engineers Details</h3>
                    <table class="tablestyle">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Team Id</th>
                            
                        </tr>
            
                        <?php
                        while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_Fname'] ?></a>
                                </td>
                                <td>
                                   <a href=""> <?php echo $rows['engineers_Lname'] ?></a>
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
                            <th>maintanance_facility_name</th>
                            <th>maintainanace_facility_location</th>
                            <th>maintancance_facility_partsvendor</th>
                            <th>next_check_availability</th>
                            
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
    </body>
    
</html>