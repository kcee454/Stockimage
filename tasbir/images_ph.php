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
    <title>TASBIRSTOCK- A STOCK IMAGE WEBSITE</title>
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
                  <li class="nav-item active"><a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a>
                  </li>
				  
				  <a  class="nav-link" href="logout.php"> (<?php echo ucwords($_SESSION['NAME']); ?>)Log out </a>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <div class="page-content">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
        <div class="container">
		
		<div class="container">
		<img class="img-fluid" src="images/upload.png"  height="100" width="100" alt="Nature"/>
		
		<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit"  class="btn btn-success" name="submit" value="Upload">
</form>
</div>
<hr>
<hr style="height:4px;border-width:0;color:gray;background-color:gray">
<div class="container pp-section">
  <div class="row">
    <div class="col-md-9 col-sm-12 px-0">
      <h1 class="h3">YOUR PHOTOS</h1>
    </div>
  </div>
</div>
<div class="container px-0">
  <div class="pp-gallery">
    <div class="card-columns">
	<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $con->query("SELECT * FROM images WHERE uploaded_by='{$_SESSION['NAME']}' ORDER BY uploaded_on DESC");
if($query->num_rows > 0){
	    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>

      <div class="card" data-groups="[&quot;nature&quot;]"><a href="image-detail_p.php?filename=<?php echo $row["file_name"] ?> ">
          <figure class="pp-effect"><img class="img-fluid" src="<?php echo $imageURL; ?>"   width="600" 
     height="340"/>
          </figure></a></div>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
    </div>
  </div>
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

