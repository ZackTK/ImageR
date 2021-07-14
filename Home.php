<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display&display=swap');
	</style>
<link href="css/home.css" rel="stylesheet" type="text/css">
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/backgr.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$dsn="mysql:host=localhost;dbname=imager";
$username="user";
$password="";

try{
    $db=new PDO($dsn, $username, $password);
}
catch(PDOException $e){
    $error_message=$e->getMessage();
    echo $error_message;
    exit();
}
?>
	<div class="bg"></div>
	<div class="bg bg2"></div>
	<div class="bg bg3"></div>
<div class="container">
  <header style="background-color:#17191a;">
    <nav class="secondary_header" style="background-color:#17191a;" id="menu">
      <ul>
		<li class="d12"><a  class="links hacked" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;" href="Home.php">Welcome to ImageR</a></li>
        <li class="d12"><a  class="links hacked" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;" href="Gallery.php">Gallery</a></li>
		<li class="d12"><a  class="links hacked" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;" href="Upload.php">Upload</a></li>
		<li class="d12"><a class="links hacked" href="Control.php?id=0&type=0&cid=0" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;">Control</a></li>
      </ul>
    </nav>
  </header>
  <div class="row" style="background-color:#17191a;opacity: 0.9;">
    <p style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 40px;">
		Imager este o solutie de stocare a imaginilor
	</p>
	<p style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 40px;">
		gruparea acestora in colectii
	</p>
	<p style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 40px;">
		si editarea lor utilizand Imagick
	</p>
  </div>
	  <div class="row blockDisplay">
		<div class="column_half left_half"> </div>
		<div class="column_half right_half"> </div>
	  </div>
	  <div class="social" style="background-color:#17191a;">
	  <?php
		$stmt = $db->query("SELECT * FROM image");
		while ($row = $stmt->fetch()) {
			echo '<p class="social_icon"><img src="public/';
			echo $row['ID'];
			echo '.jpg" width="100" alt="" class="thumbnail"/></p>';
		}
		?>
	  </div>
	  <footer class="secondary_header footer" style="background-color:#81a2be;opacity:0.9;">
		<p style="color:#17191a;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 25px;text-align: center;">
			ImageR 2021
		</p>
	  </footer>
</div>
</body>
</html>
