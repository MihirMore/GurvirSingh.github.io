<?php
if(isset($_POST['loc'])){
$lat = $_POST['lat'];
$long = $_POST['long']; 
$location = "https://maps.google.com/maps?q=$lat%20$long&t=&z=13&ie=UTF8&iwloc=&output=embed";
echo "<br/>"." Your Vehicle's Location is displayed below:"."<br/>".$location;
}
?>
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
    </body>
    <div class="container">
    <div class="container-fluid" style="background-color:white;">
         <div class="jumbotron text-center" id="jumbo_width" style="margin-top:50px;height:550px;">
         <form action="map.php" method="POST">
            <div class="form-group">
            <label for="text" style="font-size:22px;">Enter the last location of your vehicle using log file to locate:  </label>
            <br/><br/>
            <i class="animated tada fas fa-map-marker-alt fa-10x" style="color:#EA4335;"></i>
            <br/><br/>
            <input type="text" class="form-control" style="width:280px;margin:0 auto;" placeholder="Enter Latitude" name="lat">
            <input type="text" class="form-control" style="width:280px;margin:0 auto;" placeholder="Enter Longitude" name="long">
            </div>
         <button type="submit" class="btn btn-success" name="loc" style="width:280px;">Get Location</button><br/><br/>
         <a href="log.php" class="btn btn-primary" name="log" style="width:280px;">Open Log file</a><br/><br/>
            </form>
         </div>
        </div>

        <div class="container-fluid text-center" style="width:100%; //background-color:black;">
        <div class="mapouter" style="margin:0 auto;">
        <div class="gmap_canvas">
            <iframe width="100%" height="500" id="gmap_canvas" src="<?php echo $location; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://www.emojilib.com"></a>
        </div>
        <style>.mapouter{position:relative;text-align:center;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style>
        </div>
        </div>
        </div>

        <footer class="container-fluid text-center">
  <p style="color:#9e9e9e;">SVSM &copy; inc 2018-2019.</p>
</footer>

    </body>
    </html>