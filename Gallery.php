<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gallery</title>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display&display=swap');
	</style>
<link href="css/gallery.css" rel="stylesheet" type="text/css">
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/colors.css" rel="stylesheet" type="text/css">
<script src="javaScript/slidedown.js"></script>
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
  <header>
    <nav class="secondary_header" id="menu">
      <ul>
        <li class="d12"><a  class="links hacked" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;" href="Home.php">Welcome to ImageR</a></li>
        <li class="d12"><a class="links hacked" href="Home.php" style="font-size:150%;">Home</a></li>
        <li class="d12"><a class="links hacked" href="Control.php?id=0&type=0&cid=0" style="font-size:150%;">Control</a></li>
      </ul>
    </nav>
  </header>
  <div class="social">
  <p>Free Images</p>
  <?php
		$stmt = $db->query("SELECT * FROM image");
		while ($row = $stmt->fetch()) {
			echo '<p class="social_icon"><img onclick="location.href=\'Image.php?id=';
			echo $row['ID'];
			echo '\'" src="/Tema2b2/public/';
      echo $row['ID'];
      echo '.jpg" class="thumbnail"></p>';
		}
		?>
  </div>
  <?php
		$stmt = $db->query("SELECT * FROM collections");
		while ($row = $stmt->fetch()) {
      echo '<p>';
      echo $row['Colname'];
      echo '</p>';
			echo '<div class="social">';
      $n=$row['ImgIds'];
			while($n>0)
      {
        echo '<p class="social_icon"><img onclick="location.href=\'Image.php?id=';
			  $c=$n%10;
        echo $c;
			  echo '\'" src="/Tema2b2/public/';
        echo $c;
        echo '.jpg" class="thumbnail"></p>';
        $n=intdiv($n,10);
      }
      echo '</div>';
		}
		?>
  <footer class="secondary_header footer">
    <p style="color:#17191a;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 25px;text-align: center;">
			ImageR 2021
		</p>
  </footer>
</div>
</body>
</html>