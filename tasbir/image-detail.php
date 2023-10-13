<?php
session_start();
// Include database connection file
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASBIRSTOCK - The Stock Image Website</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;600;700&amp;display=swap"/>
    </noscript>
    <link href="css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link href="css/main.css?ver=1.2.0" rel="stylesheet">
	
	
	    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
		
		
  </head>
  <body id="top">
    <div class="page">
      <header>
        <div class="pp-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container"><a href="index.html"><img src="images/favicon.png" alt="Logo"></a><a class="navbar-brand" href="index.html">TASBIRSTOCK</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <div class="page-content">
        <div class="container">
<?php


function image_resize($file_name, $width, $height, $crop=FALSE) {
   $source = imagecreatefromjpeg($file_name);
   $dst = imagecreatetruecolor($new_width, $new_height);
   image_copy_resampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
   return $dst;
}



$image_src= $_GET['filename'];
$imagesrc_dir = 'uploads/'.$image_src;
?>
<script>
localStorage.clear();
var flink=<?php echo $imagesrc_dir; ?>;
localStorage.setItem("dlink", flink);
window.alert(flink);
</script>

<?php

$imgname="_thumbnail.jpg";

  // Load the mian image
  $source = imagecreatefromjpeg($imagesrc_dir);

  // load the image you want to you want to be watermarked
  $watermark = imagecreatefrompng('wm.png');

  // get the width and height of the watermark image
  $water_width = imagesx($watermark);
  $water_height = imagesy($watermark);
  
 
  // get the width and height of the main image image
  $main_width = imagesx($source);
  $main_height = imagesy($source);

  // Set the dimension of the area you want to place your watermark we use 0
  // from x-axis and 0 from y-axis 
  $dime_x = 0;
  $dime_y = 0;

  // copy both the images
  imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

  // Final processing Creating The Image
  imagejpeg($source, $imgname, 100);
echo $image_src
?>
<div class="container pp-section">
  <div class="h3 font-weight-normal"></div><img class="img-fluid mt-4" src="<?php echo $imgname?>" width="1200" height="900"/>
  </br>
  
                     <div class="card-body">
                        <h4 class="card-title">Buy Photo to Download High Quality Image without WaterMark</h4>
                        <p class="card-text">
                            <strong>Costs - NRS 100 </strong>
							<?php include 'config.php';
							// Get images from the database
							$query = $con->query("SELECT * FROM images WHERE file_name='$image_src'");
							if($query->num_rows > 0){
								if ($row = $query->fetch_assoc())
								{
								$photographer = $row["uploaded_by"];
								}
							}
							?>
							
                            <br /> Photographer - <b><?php echo $photographer?></b>
							
                        </p>
                        <a href="<?php echo $imagesrc_dir?>" data-amount=10 id='payment-button' class="btn btn-primary pay-khalti">Pay with Khalti</a>
                    </div>
</div>
<script>
var image = <?php echo $imagesrc_dir ?>;
var download = "'"+image+"'";
localStorage.setItem("dlink", download);
</script>
<div class="pp-section"></div></div>
      </div>
    </div>
    <footer class="pp-footer">
      <div class="container py-5">
        <div class="row text-center">
          <div class="col-md-12"><a class="pp-facebook btn btn-link" href="#"><i class="fab fa-facebook-f fa-2x " aria-hidden="true"></i></a><a class="pp-twitter btn btn-link " href="#"><i class="fab fa-twitter fa-2x " aria-hidden="true"></i></a><a class="pp-youtube btn btn-link" href="#"><i class="fab fa-youtube fa-2x" aria-hidden="true"></i></a><a class="pp-instagram btn btn-link" href="#"><i class="fab fa-instagram fa-2x " aria-hidden="true"></i></a></div>
          <div class="col-md-12">
            <p class="mt-3">Copyright &copy; TASBIRSTOCK. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
	<script>
</script>
    <script src="scripts/jquery.min.js?ver=1.2.0"></script>
    <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="scripts/main.js?ver=1.2.0"></script>
	
	<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script src="khalti-client.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://rawgit.com/google/code-prettify/master/styles/sons-of-obsidian.css" />
<script type="text/javascript">
    $(function(){

        // just show the live js here.
        $.ajax({url: "khalti-client.js", success: function(resp){
            $("#js-code-here").text(resp.trim());
            addEventListener('load', function(event) { PR.prettyPrint(); }, false);
        }, dataType: 'html'});
        $.get({url: "example.js", success: function(resp){
            $("#js-example-here").text(resp.trim());
            addEventListener('load', function(event) { PR.prettyPrint(); }, false);
        }, dataType: 'html'});
    });
</script>

  </body>
</html>