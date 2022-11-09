<?php 

session_start();
?>
<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="css/homepage.css">
    <title>AMS-Home Page</title>
    <body>
    
        <nav>
        <div class="topnav">
            
            <p class="title"><strong>Aircraft Management System</strong></p>
    
        
        <ul >
            <li><a href="HomePage.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#reviews">Reviews</a></li>
            <li><a href="#whoweare">Who we are</a></li>
            <li><a href="#quotes">Get a quote</a></li>
            <?php   
            if ($_SESSION['role'] == 'user'){
                echo '<li><a href="ProjectTest.php"> Portal </a></li>';
            } else if ($_SESSION['role'] == 'engineer') {
              echo '<li><a href="ProjectTest_engineer.php"> Portal </a></li>';
            }
            else{
              echo '<li><a href="ProjectTest_admin.php"> Portal </a></li>';
            }
            ?>
            <li><a href="./PHPscript/logout.php" onclick="logout()" title="Logout"> <?php echo ''. $_SESSION['username']; ?> </a></li>
            
        </ul>

        
        </div>
        </nav>
        

        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="images/aircraft.png" style="width:100%">
              <div class="text">Aircraft in Hangar</div>
            </div>
          
            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="images/aircraft-fleet.jpg" style="width:100%">
              <div class="text">Aircraft fleet</div>
            </div>
          
            
          
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
          <br>
          
          <!-- The dots/circles -->
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>


            <script>
            let slideIndex = 0;
                showSlides();
                
                function showSlides() {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                  }
                  slideIndex++;
                  if (slideIndex > slides.length) {slideIndex = 1}
                  slides[slideIndex-1].style.display = "block";
                  setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
                </script>
          </div>  

          <div class="intro" id="about">
            <h1>Introduction</h1>
            <p>Operators/CAMO, MROs, maintenance shops organizations within the General and Business Aviation, Commercial Aviation Industry and Military are relying on us to ensure minimum A/C downtime, streamline maintenance processes and increase staff productivity.

We have a solution that is tailored to your operations and fleet, whether you manage fixed-wing, rotary-wing or a mix fleet of any size!

AMS also offers a wide range of professional services; consulting, training, migration services, IT expertise, features customization and responsive customer care to make sure you get the most out of your maintenance tracking system!
             </p>

          </div>

          <div class="reviews" id="whoweare">
              <h1>Who we are</h1>
            <div id="cust1" class="rev">
              <h2>We have solutions that is tailored to your operations and fleet, whether you manage fixed-wing, rotary-wing or a mix fleet of any size!

AMS also offers a wide range of professional services; consulting, training, migration services, IT expertise, features customization and responsive customer care to make sure you get the most out of your maintenance tracking system!</h2>
            </div>
            <div id="cust2" class="rev">
              <img src="images/craft.jpg" height="100%" width="100%" alt="">
            </div>
            <div id="cust3" class="rev">
              <h2>This mix of competences is taking part in the constant evolution of our programs but also intervene in different services helping you improve your own efficiency. Users and auditors are insured that AMS is compliant to the requirements of the aeronautical authorities.</h2>
            </div>
          </div>

          <div class="reviews" id="reviews">
              <h1>Customer Reviews</h1>
            <div id="cust1" class="rev">
              <h2>Aeroflot</h2>
              <p><strong>We've been using Icare AMS for a few months now and we really like how it's helping us 
                improve out productivity and efficiency. As an organization which manages a lot of aircraft
                , this software has helped us gain time on out daily operations. It's also helped with our inventories, allowing us
                 to stock less products and save money in the long run.</strong></p>
            </div>
            <div id="cust2" class="rev">
              <h2>Vueling</h2>
              <p>
              <strong>
              Easy to use - A good basic layout for the different steps
               - Easy to install and log in to different databases - Good compatibility on older and newer PC's (also Mac using Parallells)
                - We have the ability to improve the software through the AMS Support portal.
              </strong>
              </p>
            </div>
            <div id="cust3" class="rev">
              <h2>PIA</h2>
              <p>
              <strong>
              Since we have started using AMS at our company, we were able to increase the efficiency of our daily work processes.
               No more excel files to compile different data views. We use AMS for the MRO Part145 management and it made our live a
                whole lot easier; We easily track engineers realised handle quotes and customer orders seperatly on each aircraft
                , Parts in Store are tightly followed and much more. Our teams and clients really appreciate how AMS has simplified 
                tedious tasks, giving them more time to focus on the most important activities. Everybody does their normal tasks,
                 no more extra typing of the same data across softwares, then AMS show the right data in the right places for everyone else.
                  This is only possible because AMS completely covers all aspects and departments in the MRO. AMS is a great tool for any 
                  company that is looking unify their IT solutions.
              </strong>

              </p>
            </div>
          </div>
<br><br><br><br>
<div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_center   o-medias-fullWidth">
		
		<figure class="wpb_wrapper vc_figure ">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img id = "bottomimg1" width="1440" height="388" src="https://aircraftms.com/wp-content/uploads/2020/07/image_apropossep.png" class="vc_single_image-img attachment-full" alt="" loading="lazy" title="image_apropossep" srcset="https://aircraftms.com/wp-content/uploads/2020/07/image_apropossep.png 1440w, https://aircraftms.com/wp-content/uploads/2020/07/image_apropossep-300x81.png 300w, https://aircraftms.com/wp-content/uploads/2020/07/image_apropossep-1024x276.png 1024w, https://aircraftms.com/wp-content/uploads/2020/07/image_apropossep-768x207.png 768w" sizes="(max-width: 1440px) 100vw, 1440px"></div>
		</figure>
	</div>
</div>

<hr>
<div  class= "bottom">

<h3>Get a Quote today!</h3>
    <form action="PHPscript/quotes.php" method="post"  id="quotes" >
        
        
        <label for="orgname"><strong>Organizatation's name</strong></label>
        <input type="text" name="orgname">
        <br>
        <label for="fleetsize"><strong>Your current Fleet Size</strong></label>
        <input type="number" name="fleetsize">
        <br>
        <label for="budget"><strong>Please Enter your budget</strong></label>
        <input type="number" name="budget">
        <br>
        <button name="submit" type="submit"><strong>Submit</strong></button>
      </form>
      

    
      


    </div>

    <div id = "work">
      <h3>Work with us!!</h3>
     <form action="PHPscript/cv.php" method="POST" enctype="multipart/form-data">
     <label for="fname"><strong>Enter your first name</strong></label>
     <input type="text" name="firstname" id="fn">
     <label for="lname" id="quotes"><strong>Enter your last name</strong></label>  
     <input type="text" name="lastname" id="ln"> 
     <label for="email"><strong>Enter your Email</strong></label>
     <input type="text" name="email" id="email">
     <label><strong>Email your CV at <strong>m.hamzaqureshi15@gmail.com</strong></strong></label>
 
        
    <button name="submit" type="submit"><strong>Submit</strong></button>
      </form>
     </div>
    </body>
         
    </html>