<!DOCTYPE html>
<html>

<head>
    <title>Job</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/slick.css">
    <link rel="shortcut icon" type="image/png" href="images/fav.png" />
<script type="text/javascript" src="https://me.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=G9FfbKWnuX2LV_Q73ux_F6rgaSE0r8op1Z1qouqX_vl6AmI8lXIo4TXlMTE183sIQ0lT6scRxNJdlvOLfBs4i8wNsTaEdFCW90VRzEkDkrZaoYA6kaIRkZRd3TAAtXx-uHyxLYi34yg4KSZsV9bQsAPTq1wdZgWIX90-yTIn0rDCCaApDXqU-lj9drpHmqnduf4RLmKNx04thPp7n6JtsvxRuOcDVBnj-VCGHwDO0QY" charset="UTF-8"></script></head>

<body>
    <div class="wholepage" id="top">
        <header id="header">
            <div class="container">
              <nav
                class="navbar navbar-expand-md nav-control my_navbar"
                id="navbar"
              >
                <!-- Brand -->
                <a href="index.html" class="brand-logo">
                  <img src="images/logo1.png" alt="headerlogo" />
                </a>
                <!-- Toggler/collapsibe Button -->
                <button
                  class="navbar-toggler"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapsibleNavbar"
                >
                  <span class="hamspan"></span>
                  <span class="hamspan"></span>
                  <span class="hamspan"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto nav-menu">
                    <!--li class="active"><a href="products.html">Products</a></li -->
                    <li>
                      <a href="#">Solutions <i class="fas fa-caret-down"></i></a>
                      <ul class="sub_menu">
                        <li>
                          <a href="dataLabeling.html"
                            >Data Labelling</a
                          >
                        </li>
                        <li>
                          <a href="annotationDataLake.html"
                            >Annotation Data Lake</a
                          >
                        </li>
                        <li>
                          <a href="solution_ml.html">AI Solutions</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">Who We Are <i class="fas fa-caret-down"></i></a>
                      <ul class="sub_menu">
                        <li><a href="about_us.html">About Us</a></li>
                        <li><a href="careers.html">Careers </a></li>
                        <li><a href="process.html">Process </a></li>
                      </ul>
                    </li>
                    <li><a href="use_cases.html">Use Cases</a></li>
                    <li><a href="contact.html">Contact</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </header>
        <section class="careers_section">
          <div class="container">
            <div class="about_title">
                <h1>Current Job Openings at Objectway</h1>
                <span class="border_bar uc_bar"></span>
            </div>
          </div>



    <div class="json_container">
        <div class="json_title">
            <!-- <h1>Current Job Openings at Objectway</h1> -->
        </div>
        <div class="json_filter">
            <?php 
                $string = file_get_contents("https://wprevamp.com/wp/directory7/website/json/data.json");
                if ($string === false) {
                    echo "<p>No Data Fetch</p>";
                }
                $json_a = json_decode($string, true);
                if ($json_a === null) {
                    echo "<p>No Data available</p>";
                }

                // this is for department
                $array_departments = [];
                foreach($json_a as $arrays) {
                    foreach ($arrays as $keys) {
                        array_push($array_departments, $keys['department']);
                    }
                }
                $unique_departments = array_unique($array_departments);
                $department_select = '<div class="dep_wrapper"> <select class="department"><option data-department="all">All</option>';
                foreach($unique_departments as $unique_department) {
                    $temp_man =  preg_replace('/[^A-Za-z0-9]/', "", $unique_department);
                    $temp_man = strtolower($temp_man);                         
                    $department_select .= '<option data-department="'.$temp_man.'">' . $unique_department . '</option>';
                }
                $department_select .= '</select></div>';


                // this is for location
                $array_locations = [];
                foreach($json_a as $arrays) {
                    foreach ($arrays as $keys) {
                        array_push($array_locations, $keys['location']);
                    }
                }
                $unique_locations = array_unique($array_locations);
                $location_select = '<div class="dep_wrapper"><select class="location"><option data-location="all">All</option>';
                foreach($unique_locations as $unique_location) {
                    $temp_loc =  preg_replace('/[^A-Za-z0-9]/', "", $unique_location);
                    $temp_loc = strtolower($temp_loc);    
                        $location_select .= '<option data-location="'.$temp_loc.'">' . $unique_location . '</option>';
                }
                $location_select .= '</select></div>';


                echo $department_select;
                echo $location_select;
                ?>
            </div>
                <?php 




                $unique_departments = array_unique($array_departments);
                $unique_locationt = array_unique($array_locations);
                // var_dump($array_departments);
                // var_dump($array_locations);
                $temp_html ='<div class="whole_wrapper">';
                foreach ($unique_departments as $unique_department) {
                    $temp_man =  preg_replace('/[^A-Za-z0-9]/', "", $unique_department);
                    $temp_man = strtolower($temp_man); 
                    $temp_html .= '<div class="each_department" data-department="'.$temp_man.'" ><h3 class="department_title">' . $unique_department . '</h3>';
                    foreach($json_a as $arrays) {
                        foreach ($arrays as $keys) {
                            if($unique_department == $keys['department'] ){
                                $temp_html .= '<div class="each_job"><div class="designation">' . $keys['designation1'] ;
                                $temp_html .= ', ' . $keys['designation2'] ;

                                $loc = $keys['location'];
                                $temp_loc =  preg_replace('/[^A-Za-z0-9]/', "", $loc);
                                $temp_loc = strtolower($temp_loc); 
                                $temp_html .= '</div><div class="location" data-location ="'.$temp_loc.'">' . $keys['location'] . '</div></div>' ;
                            }
                        }
                    }
                    $temp_html .= '</div>' ; //each_department_end
                }
                $temp_html .= '</div>' ; //whole_wrapper_end
                echo $temp_html;


                // foreach($json_a as $arrays) {
                //     foreach ($arrays as $keys) {
                //         echo  "<br>" . $keys['department'] . "<br>";
                //         echo $keys['designation1'] . "<br>";
                //         echo $keys['designation2'] . "<br>";
                //         echo $keys['location'] . "<br><br>";
                //     }
                // }
             ?>
 
        </div>
        </section>
       <footer id="footer">
                   <div class="footer_container">
                     <div class="footer-row row">
                       <div class="col-sm-3">
                         <div class="footer-list-div">
                           <h5>Solutions</h5>
                           <span class="border_bar_footer"></span>
                           <ul class="footer-list">
                             <li><a href="dataLabeling.html">Data Labeling</a></li>
                             <li><a href="annotationDataLake.html">Annotation Data Lake</a></li>
                             <li><a href="mlandai.html">AI Solutions</a></li>
                           </ul>
                         </div>
                       </div>
                       <div class="col-sm-3">
                         <div class="footer-list-div">
                           <h5>Company</h5>
                           <span class="border_bar_footer"></span>
                           <ul class="footer-list">
                             <li><a href="about_us.html">About Us</a></li>
                             <li><a href="social_impact.html">Social Impact</a></li>
                             <li><a href="blog.html">Blog</a></li>
                             <li><a href="security.html">Security</a></li>
                             <li><a href="privacy_policy.html">Privacy Policy</a></li>
                             <li><a href="terms_condition.html">Terms and Conditions</a></li>
                           </ul>
                         </div>
                       </div>
                       <div class="col-sm-3">
                         <div class="footer-list-div">
                           <h5>Social</h5>
                           <span class="border_bar_footer"></span>
                           <ul class="footer-list">
                            <li><a href="https://twitter.com/objectways">Twitter</a></li>
                            <li><a href="https://www.linkedin.com/company/objectways">Linkedin</a></li><br>
                            <h5>Contact US</h5>
                           <span class="border_bar_footer"></span>
                             <li><p>+1-800-619-1584</p></li>
                             <li><p>sales@objectways.com</p></li>
                           </ul>
                         </div>
                       </div>
                       <div class="col-sm-3">
                         <div class="footer-list-div">
                           <h5>US Office</h5>
                           <span class="border_bar_footer"></span>
                           <ul class="footer-list"> 
                             <li><p>20715 N Pima Road</p></li>
                             <li><p>Scottsdale, AZ 85255</p></li><br>
                             <h5>India  Office</h5>
                             <span class="border_bar_footer"></span>
                             <li><p>29 B, K.P.Nagar</p></li>
                             <li><p>Karur, TN, India - 639002</p></li>
                              <li><p></p></li>
                            
                           </ul>
                         </div>
                       </div>
                     
                       
                     </div>
                     <p></p>
                   </div>
                 </footer>


        <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5f8585af4704467e89f702e9/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
        <div class="popup_contact">
            <div class="overlay"></div>
        <div class="contact_part contact_partss">
            <span class="close_popup">╳</span>
             <h3>Contact Us</h3>
             <div class="form_sec">
                 <div class="myform contactform">
                    <input type="hidden" name="contact_form" id="contact_form" value="1">
                     <div class="twocol_form">
                         <div class="form_controls">
                             <label>first name</label>
                             <input type="text" name="fname" placeholder="Your First Name" id="firstName">
                             <span id="firstName-info" class="info"></span>
                         </div>
                         <div class="form_controls">
                             <label>last Name</label>
                             <input type="text" name="lname" placeholder="Your Last Name" id="lastName">
                             <span id="lastName-info" class="info"></span>
                         </div>
                     </div>
                       <div class="form_controls">
                             <label>email address</label>
                             <input type="email" name="email" placeholder="Where can we email you?" id="userEmail">
                             <span id="userEmail-info" class="info"></span>
                         </div>
                           <div class="form_controls">
                             <label>Phone Number</label>
                             <input type="text" name="phone" placeholder="What's the best number to reach you?" id="userPhone">
                             <span id="userPhone-info" class="info"></span>
                         </div>
                           <div class="form_controls">
                             <label>Message</label>
                           <textarea placeholder="How can we help you?" name="message" id="userMessage"></textarea>
                           <span id="userMessage-info" class="info"></span>
                         </div>
                         <div class="form_controls but_right">
                              <button class="self_btn btnAction" type="submit" name="submit" onClick="sendContact();">Send Message</button>
                              <div id="mail-status"></div>
                         </div>
                 </div>
             </div>
         </div>
    </div>
    </div>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/bootstrap.min.js"></script>


<!-- this js is for filter of json data stars here-->
    <script>
         jQuery(document).ready(function() {
            jQuery(".json_container .json_filter select.department, .json_container .json_filter select.location").change(function(){
                var data_depart =  jQuery(".json_container .json_filter select.department option:selected").attr("data-department")

                var data_loc = jQuery(".json_container .json_filter select.location option:selected").attr("data-location");
                
                if(data_loc =="all"){
                    jQuery(".json_container .whole_wrapper .each_department").each(function(){
                        var data = jQuery(this).attr("data-department");
                        if(data_depart =="all"){
                            jQuery(".json_container .whole_wrapper .each_department").show();
                        }
                        else if(data_depart == data){
                            jQuery(".json_container .whole_wrapper .each_department").hide();
                            jQuery(this).show();
                        }
                    });
                }
                else if(data_depart =="all"){
                    jQuery(".json_container .whole_wrapper .each_department").each(function(){
                        var data = jQuery(this).attr("data-location");
                        if(data_loc =="all"){
                            jQuery(".json_container .whole_wrapper .each_department").show();
                        }
                        else if(data_loc == data){
                            jQuery(".json_container .whole_wrapper .each_department").hide();
                            jQuery(this).show();
                        }
                    });
                }
                else{
                    jQuery(".json_container .whole_wrapper .each_department").each(function(){
                        var data_d = jQuery(this).attr("data-department");
                        var data_l = jQuery(this).attr("data-location");
                        if(data_depart == data_d && data_loc == data_l){
                            // jQuery(".json_container .whole_wrapper .each_department").hide();
                            jQuery(this).show();
                            jQuery(this).addClass("testing");
                        }
                        else{
                            jQuery(this).hide();
                            // jQuery(".json_container .whole_wrapper .each_department").hide();
                        }                   
                    });
                }

            });


            //this is for adding location attribute to parents from child starts here
            jQuery(".json_container .whole_wrapper .each_department").each(function(){
                var location = jQuery(this).find(".location").attr("data-location");
                jQuery(this).attr("data-location", location);
            });
            //this is for adding location attribute to parents from child end here


            // jQuery.getJSON('http://wprevamp.com/wp/directory2/json/test.json', function(data) {
            //      jQuery.each(data.items, function(key, val) {
                     // alert(val.department);
                     // alert(val.designation1);
                     // alert(val.designation2);
                     // alert(val.location);
            //      });
            // });
      });
    </script> 
<!-- this js is for filter of json data stars here-->

    <!-- for slick slider  -->
    <script>
        jQuery(document).ready(function () {
            jQuery('.carrer_slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: false,
                prevArrow:"<i class='fas fa-arrow-left'></i>",
                nextArrow:"<i class='fas fa-arrow-right'></i>",
                responsive: [{
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                ]

            });
        });
    </script>

    <script>
        jQuery(document).ready(function () {
            jQuery('.text_slider').slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 3000,
                arrows: true,
                prevArrow:"<i class='fas fa-arrow-left'></i>",
                nextArrow:"<i class='fas fa-arrow-right'></i>"
            });
        });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function(){
          jQuery('.contact_popup').click(function(){ 
            // jQuery('body').css('overflow','hidden');
            jQuery('.popup_contact').fadeIn();
          });
          jQuery('.close_popup').click(function(){ 
            jQuery('.popup_contact').fadeOut();
            jQuery("#firstName").val("");
            jQuery("#lastName").val("");
            jQuery("#userEmail").val("");
            jQuery("#userPhone").val("");
            jQuery("#userMessage").val("");
            // jQuery('body').css('overflow','visible');
          });
      });
    </script>
           
                <script>
                function sendContact() {
                var valid;  
                valid = validateContact();
                if(valid) {
                    jQuery.ajax({
                    url: "contact_mail.php",
                    data:'fname='+$("#firstName").val()+'&lname='+$("#lastName").val()+'&email='+$("#userEmail").val()+'&phone='+$("#userPhone").val()+'&message='+$("#userMessage").val(),
                    type: "POST",
                    success:function(data){
                    $("#mail-status").html(data);
                    },
                    error:function (){}
                    });
                }
               }
               function validateContact() {
                var valid = true;   
                $(".demoInputBox").css('background-color','');
                $(".info").html('');
                if(!$("#firstName").val()) {
                    $("#firstName-info").html("Please provide your first name");
                    $("#firstName-info").css('color','red');
                    valid = false;
                }
                if(!$("#lastName").val()) {
                    $("#lastName-info").html("Please provide your last name");
                    $("#lastName-info").css('color','red');
                    valid = false;
                }
                if(!$("#userEmail").val()) {
                    $("#userEmail-info").html("Please provide your email address");
                    $("#userEmail-info").css('color','red');
                    valid = false;
                }
                if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                    $("#userEmail-info").html("Please re-enter your valid email address");
                    $("#userEmail-info").css('color','red');
                    valid = false;
                }
             /*   if(!$("#userPhone").val()) {
                    $("#userPhone-info").html("Please provide your Phone Number.");
                    $("#userPhone-info").css('color','red');
                    valid = false;
                }
                if(!$("#userMessage").val()) {
                    $("#userMessage-info").html("Please write a message.");
                    $("#userMessage-info").css('color','red');
                    valid = false;
                }*/
                return valid;
               }
               </script>
</body>

</html>