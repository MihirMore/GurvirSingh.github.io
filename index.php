<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Smart Vehicle | Security and Maintenance</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
      <!-- font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <!-- google font -->
      <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
      <script src="main.js"></script>
      <link rel="icon" href="/img/favicon.png" type="image">
    </head>

<style>
body{
    font-family:'Poppins', sans-serif;
}
#con_container{
    height:670px;
    width:100%;
    background-color:#f6f6f6;
}
.slideInLeft{
    animation-duration: 2s;
    animation-delay: 1s;
}

.fadeIn{
    animation-duration: 2s;
    animation-delay: 3s;
}
.flash{
    animation-duration: 1s;
    animation-delay: 4s;
}

/* Style from index*/
.vl {
         border-left: 1px solid #000000;
         margin-left:20px;
        }

        #hover_nav{
            color:#000000;
        }

        #hover_nav:hover{
            color:#5e5e5e;
        }
    
        .nav-item{
            margin-left:35px;
        }

        .jumbotron{
            background-color:white;
        }

        @media screen and (min-width: 571px) and (max-width:1243px){
         #hover_nav{
             font-size:12px;
         }
         .nav-item{
            margin-left:-5px;
        }
        .vl {
         margin-left:2px;
        }
        #logo_disappear{
            font-size:12px;
            margin-top:3px;
        }
        }

        @media screen and (min-width: 633px) and (max-width: 810px) {
            #build_button{
                width:50px;
            }
            .dl_txt{
                display:none !important;
            }
        }

        @media screen and (min-width: 571px) and (max-width: 633px) {
            #build_button{
                display:none !important;
            }
            .dl_txt{
                display:none !important;
            }
        }

        @media screen and (max-width: 573px) {
            .logo1{
            display: block !important;
            }
            #logo_disappear{
                display:none !important;
            }
            .navbar-toggler{
                z-index:100000;
                margin-top:-50px;
            }
        }

        #down_blink {
            color:#333;
            font-size:25px;
            padding:20px;
            border-radius:50%;
            position:fixed;
            bottom:0;
            right:0;
            margin-right:10px;
            z-index:100000;
        }
        @keyframes blinker {
         50% {
            opacity: 0;
            }
        }

        hr{
            background-color:#ededed;
        }

        .logo1{
            display:none;
            position:relative;
            z-index:10000;
            font-size:20px;
            text-align:center;
            width:100%;
        }

        @media screen and (max-width: 517px) {
           #login{
                width:100px !important;
                font-size:12px;
           }

           #signup{
                width:100px !important;
                font-size:12px;
           }

           #down_blink{}

        }

        @media screen and (max-width: 497px) {
           #login{
                width:100px !important;
                font-size:12px;
           }

           #signup{
                width:100px !important;
                font-size:12px;
           }

           #account_lable{
               margin-top:100px;
           }
        }

        @media screen and (max-width: 449px) {
           #login{
                width:100px !important;
                font-size:12px;
           }

           #signup{
                width:100px !important;
                font-size:12px;
           }

           #account_lable{
               margin-top:150px;
           }
        }

        @media screen and (max-width: 406px) {
           #login{
                width:100px !important;
                font-size:12px;
           }

           #signup{
                width:100px !important;
                font-size:12px;
           }

           #account_lable{
               margin-top:180px;
           }
        }

        @media screen and (max-width: 414px) {
           #login{
                width:100px !important;
                font-size:12px;
           }

           #signup{
                width:100px !important;
                font-size:12px;
           }

           #account_lable{
               margin-top:180px;
           }
        }

        @media screen and (min-width: 571px) and (max-width: 762px) {
            #login{
                width:100px !important;
                font-size:12px;
           }

           #signup{
                width:100px !important;
                font-size:12px;
           }

           #account_lable{
               margin-top:50px;
           }
        }

        .bg-4 { 
            background-color: #cecece;
            color:#333;
            padding-top: 70px;
            padding-bottom: 70px;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* End of Index Style */
        .fadeInUp{
            animation-duration: 3s;
        }
        @media screen and (max-width: 1336px){
        #img-vec{
            display:none;
        }
        #div1{
            margin:0 auto !important;
            position:relative !important;
            background-color:#fff !important;
        }
        #div2{
            background-color:#fff !important;
            display:block !important;
        }
        #con_container{
            display:none !important;
            
        }
        }
</style>

<body>

<nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color:#f2f2f2;font-size:15px;letter-spacing:1px;">
      <div class="logo1"><a class="nav-link"  style="color:#333;" href="index.php"><i class="fas fa-motorcycle"></i></i> Smart Vehicle</a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
         <span class="navbar-toggler-icon"></span>
         </button>
         <!-- add div and collapsable -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto" style="padding:5px;">
               <li class="nav-item">
                  <a class="animated fadeInLeft nav-link" id="logo_disappear" style="color:#333;" href="index.php"><i class="fas fa-motorcycle"></i></i> Smart Vehicle</a>
               </li>

               <div class="vl"></div>

               <li class="nav-item" >
                  <a class="animated fadeInLeft nav-link" href="#services"><span id="hover_nav"> Services</u></span></a>
               </li>
               <li class="nav-item" >
                  <a class="animated fadeInLeft nav-link" href="#tech"><span id="hover_nav"> Technology</span></a>
               </li>
               <li class="nav-item" >
                  <a class="animated fadeInLeft nav-link" href="#emergency"><span id="hover_nav"> Location</span></a>
               </li>
               <li class="nav-item" >
                  <a class="animated fadeInLeft nav-link" href="#shop"><span id="hover_nav"> Info</span></a>
               </li>
               <li class="nav-item" >
                  <a class="animated fadeInLeft nav-link" href="#about"><span id="hover_nav"> About</span></a>
               </li>
               <li class="nav-item" >
                  <a class="animated fadeInLeft nav-link" href="#contact"><span id="hover_nav"> Contact</span></a>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a href="app.apk" download><button class="animated fadeInLeft btn btn-bg btn-success" id="build_button"><span class="dl_txt">Download for Android</span> <i class="fab fa-android" style="font-size:22px;"></i></button></a>
               </li>
            </ul>
         </div>
         <div class="animated fadeInLeft" style="//background-color:yellow;width:500px;position:absolute;z-index:1000;margin-left:1000px;width:180px;//margin-top:600px;">
                  <a href="#login"><button class="btn btn-bg btn-primary" style="height:40px;" id="img-vec"><span class="dl_txt1">Log In</span></button></a>
                </div>
      </nav>
      <script>
        $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
        });
     </script>

<script>
if ($(window).width() > 1330){
  $(document).ready(function () {
          // Hide the div
          $("#div1").hide();
          // Show the div after 5s
          $("#div1").delay(4000).fadeIn(100);  
      });   
}
</script>

    
      <!--End of navigation bar-->
     

        <div class="container-fluid animate fadeInUp" id="div1" style="background-color:#f6f6f6;position:absolute;margin-top:100px;max-width:700px;margin-left:320px;">
            <div class="jumbotron jumbotron-fluid" id="div2" style="margin-top:-35px;height:320px;background-color:#f6f6f6;">
                <div class="container text-center">
                  <h1 class="display-3" id="delamate_logo" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-7px;"><br/> Smart Vehicles</h1>
                  <h1 class="display-6" style="font-family: 'Poppins', sans-serif;color:#333;font-size:35px;">Secure and Maintain your Vehicle using IOT and your Smartphone.</h1>
                </div>
                <br/>
            </div>
            </div>



    <div class="container-fluid" id="con_container">
        <div class="row" id="home">

        <div class="col" style="//background-color:black;max-height:600px;width:50px;">
        
            <div class="animated fadeIn flash infinite" style="//background-color:yellow;width:500px;position:absolute;z-index:100;margin-left:145px;width:180px;margin-top:300px;">
                <i class="fas fa-exclamation-circle" id="img-vec" style="font-size:85px;color:#C7372D;"></i>
            </div>

            <div class="animated" style="//background-color:yellow;width:500px;position:absolute;;margin-left:330px;width:180px;margin-top:10px;">
                <img src="img/phone.jpg" id="img-vec"  style="margin-left:-500px;margin-top:103px;">
            </div>
        </div>

            <div class="col" style="//background-color:blue;max-height:600px;">

                <div class="animated fadeIn" style="//background-color:yellow;width:500px;position:absolute;z-index:1000;margin-left:320px;width:180px;margin-top:280px;">
                    <i class="fas fa-wifi" id="img-vec" style="font-size:135px;"></i>
                </div>

                <div class="animated slideInLeft" style="//background-color:blue;max-width:500px;max-height:600px;">
                    <img src="img/mcycle.png" id="img-vec" style="height:450px;width:420px;margin-top:250px;margin-left:230px;">
                </div>

            </div>
        </div>
    </div>
    <div id="login"></div>
<br/><br/>
    <div class="container text-center" style="//background-color:yellow;height:200px;margin-top:70px;">
                    <h1 class="display-4" id="account_lable" style="font-family: 'Poppins', sans-serif;color:#333;font-size:35px;">Account Access</h1>
                    <button type="button" class="btn btn-primary btn-lg" id="login" style="color:white;background-color:#0053db;border:#a44eba;margin-right:20px;width:200px" data-toggle="modal" data-target="#myModal">Login <i class="fas fa-sign-in-alt"></i></button>
                    <button type="button" class="btn btn-primary btn-lg" id="signup" style="color:white;background-color:#0053db;border:#a44eba;width:200px" data-toggle='modal' data-target="#myModal1">Sign Up <i class="fas fa-user-plus"></i></button> <br/><a href="#home"><div class="cover" id="down_blink" style="background-color:#333;height:20px;width:20px;position:fixed;margin-right:21px;margin-bottom:10px;opacity:0.5;"><i class="fas fa-chevron-up" id="down_blink" style="animation: blinker 5s linear infinite;color:white;"></i></div></a>
                     
                </div>

                
    <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Account Login  <i class="fas fa-sign-in-alt"></i></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container">
                                    <form action="insert.php" method="POST">
                                        <div class="form-group">
                                            <label for="text">Contact No</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter Phone No" pattern="[0-9]{10}" title="10 Digit Mobile Number" name="phone">
                                        </div>

                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                                        </div>

                                        <div class="form-group form-check">
                                           <label class="form-check-label">
                                            <a href="mail.php" style="margin-left:-15px;">Forgot Password?</a>
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary" style="width:100%;" name="login">Login</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal footer 
                            <div class="modal-footer">
                            </div>-->
                        </div>
                    </div>
                </div>
                
                    <!-- new modal -->
                    <div class="modal fade" id="myModal1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Account Register <i class="fas fa-sign-in-alt"></i></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="container">
                                            <form action="insert.php" method="POST">
                                                <div class="form-group">
                                                    <label for="text">Name</label>
                                                    <input type="text" class="form-control" id="email" placeholder="Enter full name" required title="Only Characters" name="name">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="text">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required name="email">
                                                </div>

                                                <div class="form-group">
                                                    <label for="text">Phone</label>
                                                    <input type="text" class="form-control" id="pwd" placeholder="Enter Contact No" required pattern="[0-9]{10}" title="10 Digit Mobile Number" name="phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Vehicle Number</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="state" pattern="[A-Z]{2}" required title="State code in Capital (eg: MH)" name="num"/>
                                                        <span class="input-group-addon"> </span>
                                                        <input type="text" class="form-control" placeholder="district no" pattern="[0-9]{2}" required title="District Code (eg:43)" name="num1"/>
                                                        <span class="input-group-addon"> </span>
                                                        <input type="text" class="form-control" placeholder="series" pattern="[A-Z]{2}" required title="Series Code (eg:AQ)" name="num2"/>
                                                        <span class="input-group-addon"> </span>
                                                        <input type="text" class="form-control" placeholder="number" pattern="[0-9]{4}" required title="4 digit Code" name="num3"/>
                                                    </div>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="pwd">Password:</label>
                                                        <input type="password" class="form-control" id="password" required placeholder="Enter password" minlength=6 name="pass">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pwd">Confirm Password:</label>
                                                        <input type="password" class="form-control" id="confirm_password" minlength=6 required placeholder="Enter password again">
                                                    </div>
                                                    <div class="form-group form-check">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" style="width:100%;" value="submit1" name="submit1">Submit</button>
                                                    <script>
                                                        var password = document.getElementById("password")
                                                        , confirm_password = document.getElementById("confirm_password");
                     
                                                        function validatePassword(){
                                                        if(password.value != confirm_password.value) {
                                                        confirm_password.setCustomValidity("Passwords Don't Match");
                                                        } else {
                                                        confirm_password.setCustomValidity('');
                                                        }
                                                        }
                     
                                                        password.onchange = validatePassword;
                                                        confirm_password.onkeyup = validatePassword;
                                                    </script>
                                            </form>
                                        </div>
                                </div>
                                <!-- Modal footer 
                                <div class="modal-footer">
                                </div>-->   
                            </div>
                        </div>
                    </div>
                </div>

                <script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

<!-- Container (Services Section) -->
<div class="container-fluid text-center" id="services" style="background-color:white;color:#333;font-family: 'Poppins', sans-serif"><br/>
<hr/>
    <h1 class="display-3" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-50px; //text-decoration: underline;//text-decoration-color: #017AFD;"><br/> Services</h1>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <i class="fas fa-map-marker-alt" style="font-size:85px;color:#333"></i><br/><br/>
      <h4>Location Tracking</h4>
      <p style="color:#8c8c8c;">Real time location tracking using GPS sensor</p>
    </div>
    <div class="col-sm-4">
      <i class="fas fa-envelope" style="font-size:85px;color:#333"></i><br/><br/>
      <h4>SMS & Call Alerts</h4>
      <p style="color:#8c8c8c;">Malicious activities will be reported directly to your mobile phone</p>
    </div>
    <div class="col-sm-4">
      <i class="fas fa-key" style="font-size:85px;color:#333"></i><br/><br/>
      <h4>Authentication</h4>
      <p style="color:#8c8c8c;">Radio Frequency Identification for maximum security</p>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-sm-4">
      <i class="fas fa-globe-americas" style="font-size:85px;color:#333"></i><br/><br/>
      <h4>Web & Android App Access</h4>
      <p style="color:#8c8c8c;">Access functionalities on Web and Android app</p>
    </div>
    <div class="col-sm-4">
      <i class="fas fa-bell" style="font-size:85px;color:#333"></i><br/><br/>
      <h4>Reminders</h4>
      <p style="color:#8c8c8c;">Document update and Maintenance reminders</p>
    </div>
    <div class="col-sm-4">
      <i class="fas fa-file-alt" style="font-size:85px;color:#333"></i><br/><br/>
      <h4>Document Manager</h4>
      <p style="color:#8c8c8c;">Manage Vehicle Documents on your Android app</p>
    </div>
  </div>
 <!-- <a href="#tech"><i class="fas fa-chevron-down" id="down_blink" style="margin-top:10px;color:#333;font-size:55px;"></i></a> -->
</div>

<div class="container-fluid text-center" id="tech" style="background-color:white;color:#333;font-family: 'Poppins', sans-serif;"><br/>    
<hr/>
<h1 class="display-3" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-50px;overflow-wrap: break-word; max-width : 100%;font-size:55px;"><br/>Technology</h1><br/>
  <div class="row">
    <div class="col-sm-4">
    <h2>Description</h2>
    <i class="far fa-file"  style="color:#333;font-size:88px;padding:10px;"></i>
      <p>This project is an attempt to design and develop a smart system to prevent theft and to
determine the exact location of the vehicle in addition with smart maintenance and monitoring</p>
    </div>
    <div class="col-sm-4"> 
    <h2>Android App</h2>
      <img src="/img/android.png" class="img-responsive" height='100' width='100' style="padding:10px;" alt="Image">
      <p></p><p>The Android Application serves as a primary user interface to get the input and send
the output to the hardware installed to a particular vehicle</p>    
    </div>
    <div class="col-sm-4">
    <h2>Internet of Things</h2>
    <i class="fas fa-wifi" style="font-size:90px;"></i><p></p>
    <p></p><p>The IOT sensors from your vehicle transmits real time data to your Android Application and saves the data in a secure location</p>    
    </div>
    </div>
    </div>
  </div>

<div class="container-fluid" id="emergency">
    <div class="jumbotron text-center">
    <hr/>
            <h1 class="display-3" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-50px;overflow-wrap: break-word; max-width : 100%;"><br/>Track Your Vehicle</h1><br/>
            <h1 class="display-5" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-50px;overflow-wrap: break-word; max-width : 100%;"><br/>1. Use Your Android Device</h1><br/>
            <p style="margin-top:-20px;">Go to your Android Dashboard > Login > Location Tracking</p><br/>
            <h1 class="display-5" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-50px;overflow-wrap: break-word; max-width : 100%;"><br/>2. Use <a href="map.php">Web Tracking -log file</a></h1>
    </div>
    <hr/>
</div>


<div class="container-fluid" id="shop">
    <div class="jumbotron text-center">
    <h1 class="display-3" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-70px;overflow-wrap: break-word; max-width : 100%;"><br/>Package</h1><br/>
    
    <!-- Shop Section -->
<div class="container-fluid" style="background-color:#cccccc;border-radius:15px;padding:35px;box-shadow:1px 1px 4px;">
      <div class="panel panel-default text-center">
        <div class="container-fluid panel-heading">
          <h4>IOT + ANDROID APP + WEB ACCESS</h4>
        </div>
        <div class="panel-body">
          <p><strong>1</strong> Vehicle</p>
          <p><strong></strong> Sensor Installation</p>
          <p><strong></strong> Android Dashboard</p>
          <p><strong></strong> Web Tracking</p>
          <p><strong></strong> Document Manager</p>
          <p><strong></strong> SMS and Call Alerts</p>
          <p><strong>Security and</strong> Maintenance</p>
        </div>
        <div class="panel-footer" style="background-color:;border-radius:15px;">
         <!-- <h3>₹699</h3>
          <h4>for 3 months</h4> -->
        </div>
      </div>      
    </div>     
</div>
<hr/>
</div>
</div>

<div class="container-fluid" id="about">
    <div class="jumbotron text-center">
    <h1 class="display-3" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-70px;overflow-wrap: break-word; max-width : 100%;"><br/>About</h1><br/>
    <p><span style="font-size:22px;">Security</span> of a vehicle in common parking places has been a matter of
concern since ages, along with security the overall maintenance causes great inconvenience to
the user. This project is an attempt to design and develop a smart system to prevent theft and to
determine the exact location of the vehicle in addition with smart maintenance and monitoring.
An efficient automotive security and maintenance system is implemented which involves IoT
sensors transmitting real-time data from the vehicle to the user's mobile device. Maintenance
such as Vehicle Servicing is calculated based on distance travelled and amount of fuel
consumed. It also measures the vehicle performance on various factors, these factors are then
processed through advanced algorithms providing improved safety and security of the vehicle.
IoT technology transmits the on-board and off-board data from the vehicle which can be used
to predict upcoming issues and suggest methods to repair them. A unique Radio-Frequency
Identification (RFID) Card is designated to each individual vehicle providing access and
improving the overall security. The owner can lock or unlock his or her vehicle using the RFID
card. The Global Positioning System (GPS) is installed in the vehicle to track the online and
offline location. Global System for Mobile communication (GSM) is used for transmitting
vehicle parameters. This complete system is designed taking in consideration the low range
vehicles to provide them extreme security and maintenance</p>
    </div>
    <hr/>
</div>

<div class="container-fluid" id="contact">
    <div class="jumbotron text-center">
    <h1 class="display-3" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-2px;margin-top:-50px;overflow-wrap: break-word; max-width : 100%;"><br/>Contact</h1>
    <h1 class="display-6" style="font-family: 'Poppins', sans-serif;color:#333;font-size:35px;">Suggestions or Feedback</h1>
    <div class="container">
  <form action="contact.php" method="POST">
    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="firstname" pattern="[A-Za-z]{}" required placeholder="First Name">

    <label for="lname">Email</label>
    <input type="text" id="lname" name="lastname" pattern="[A-Za-z]{}" required placeholder="Email">


    <label for="subject">Comments</label>
    <textarea id="subject" name="subject" pattern="[A-Za-z]{}" required placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
    </div>
</div>

<footer class="container-fluid bg-4 text-center">
<p class="text-center">Smart Vehicle Security and Maintenance System &copy; inc 2018-2019.</p>
<a href="#home" >Home</a><br/>
<a href="#services" >Services</a><br/>
<a href="#tech" >Technology</a><br/>
<a href="#emergency" >Location</a><br/>
<a href="#about" >About</a><br/>
<a href="#contact" >Feedback and Suggestions</a><br/>
</footer>
</body>