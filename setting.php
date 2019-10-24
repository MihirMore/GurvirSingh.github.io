<?php 
session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Smart Vehicle | Security and Maintenance</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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
      <link rel="icon" href="favicon.png" type="image">
    </head>

<!--Custom style-->
    <style>
        body{
         background-color:white;
         font-family:'Poppins', sans-serif;
        }

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
        #build_button{
            margin-right:20px;
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
            margin-right:50px;
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

        @media screen and (max-width: 495px) {
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
        #maincon{
            height:400px;
            width:100%;
        }
@media screen and (max-width: 888px) {
           #delamate_logo{
                font-size:25px;
                letter-spacing:0px !important;
                margin-top:100px;
        }
 }
    </style>

    <body>
      <!--Navigation bar-->
    
      <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color:#f2f2f2;font-size:15px;letter-spacing:1px;">
      <div class="logo1"><a class="nav-link"  style="color:#333;" href="index.php"><i class="fas fa-motorcycle"></i></i> Smart Vehicle</a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
         <span class="navbar-toggler-icon"></span>
         </button>
         <!-- add div and collapsable -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto" style="padding:5px;">
               <li class="nav-item">
                  <a class="nav-link" id="logo_disappear" style="color:#333;" href="index.php"><i class="fas fa-motorcycle"></i></i> Smart Vehicle</a>
               </li>

               <div class="vl"></div>

               <li class="nav-item" >
                  <a class="nav-link" href="index.php"><span id="hover_nav"> Location</span></a>
               </li>
               <li class="nav-item" >
                  <a class="nav-link" href="index.php"><span id="hover_nav"> About</span></a>
               </li>
               <li class="nav-item" >
                  <a class="nav-link" href="index.php"><span id="hover_nav"> Contact</span></a>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a href="app.apk" download><button class="btn btn-bg btn-success" id="build_button"><span class="dl_txt">Download for Android</span> <i class="fab fa-android" style="font-size:22px;"></i></button></a>
               </li><br/>
               <li class="nav-item">
                  <a href="loggedout.php"><button class="btn btn-bg btn-danger" style="height:40px;" id="build_button1"><span class="dl_txt1">Log out</span></button></a>
               </li>
            </ul>
         </div>
      </nav>
      <script>
        $('.navbar-nav>li>a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
        });
     </script>
      <!--End of navigation bar-->

        <!-- Content -->
        <div id="home"></div>
        <div class="container-fluid" style="background-color:white;">
            <div class="jumbotron jumbotron-fluid" style="margin-top:-35px;height:320px;background-color:white">
                <div class="container text-center">
                  <h1 class="display-3" id="delamate_logo" style="font-family: 'Poppins', sans-serif;color:#333;letter-spacing:-7px;"><br/> Welcome, <?php echo ucwords($_SESSION['user']);?></h1>
                  <h1 class="display-6" style="font-family: 'Poppins', sans-serif;color:#333;font-size:35px;"></h1>
                </div>
                <br/>
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

<div class="container-fluid" style="//background-color:black;" id="maincon">
    <form action="update_data.php" method="POST">
    <div class="form-group">
        <label for="name">Update Name</label>
        <input type="text" class="form-control" id="email" placeholder="Enter full name" name="name">
    </div>
    <div class="form-group">
        <label for="contact">Update Contact no</label>
        <input type="text" class="form-control" id="pwd" placeholder="Enter Contact No" pattern="[0-9]{10}" title="10 Digit Mobile Number" name="phone">
    </div>
    <div class="form-group">
        <label for="contact">Update Vehicle no</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="state" pattern="[A-Z]{2}" title="State code in Capital (eg: MH)" name="num"/>
            <span class="input-group-addon"> </span>
            <input type="text" class="form-control" placeholder="district no" pattern="[0-9]{2}" title="District Code (eg:43)" name="num1"/>
            <span class="input-group-addon"> </span>
            <input type="text" class="form-control" placeholder="series" pattern="[A-Z]{2}" title="Series Code (eg:AQ)" name="num2"/>
            <span class="input-group-addon"> </span>
            <input type="text" class="form-control" placeholder="number" pattern="[0-9]{4}" title="4 digit Code" name="num3"/>
        </div>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-danger">Update</button>
    </div>
    </form>
</div>
</div>

<footer class="container-fluid bg-4 text-center">
<p class="text-center">Smart Vehicle Security and Maintenance System &copy; inc 2018-2019.</p>
<a href="#home" >Home</a><br/>
<a href="index.php" >Location</a><br/>
<a href="index.php" >About</a><br/>
<a href="index.php" >Feedback and Suggestions</a><br/>
</footer>

    </body>
</html>

