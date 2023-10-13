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
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a>
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

$image_src= $_GET['filename'];
$imagesrc_dir = 'uploads/'.$image_src;

?>
<div class="container pp-section">
  <div class="h3 font-weight-normal"></div><img class="img-fluid mt-4" src="<?php echo $imagesrc_dir?>" width="1200" height="900"/>
  </br>
  <button class="btn btn-danger btn-lg btn-block " > <a href="delete.php?filename=<?php echo $image_src ?> "> <h2 style="color:white;" > Delete Photo </h2></a></button>
</div>
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
    <script src="scripts/jquery.min.js?ver=1.2.0"></script>
    <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
    <script src="scripts/main.js?ver=1.2.0"></script>
  </body>
</html>