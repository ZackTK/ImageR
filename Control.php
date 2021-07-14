<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Image</title>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display&display=swap');
	</style>
<link href="css/gallery.css" rel="stylesheet" type="text/css">
<link href="css/colors.css" rel="stylesheet" type="text/css">
<link href="stylesheet.css" rel="stylesheet" type="text/css">>
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
		<li class="d12"><a  class="links hacked" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;" href="Home.php">Home</a></li>
		<li class="d12"><a  class="links hacked" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;" href="Gallery.php">Gallery</a></li>
		<li class="d12"><a class="links hacked" href="Control.php?id=0&type=0&cid=0" style="color:#81a2be;font-family: 'Big Shoulders Stencil Display', cursive;font-size:30px;">Control</a></li>
      </ul>
  </header>
  <div class="row">
	<div class="columns">
	<div class="imgcontainer2">
		<button class="button2" type="submit"><a href="Control.php?id=<?php echo $_GET['id']; ?>&type=4&cid=<?php echo $_GET['cid']; ?>">Get Collection</a></button>
	</div>
	<div class="imgcontainer2">
    <form method="GET">
    <?php
		$stmt = $db->query("SELECT * FROM collections");
		while ($row = $stmt->fetch()) {
			echo '<input onclick="location.href=\'Control.php?id=0&type=0&cid=';
			echo $row['ID'];
			echo '\'" type="radio" id="cid';
            echo $row['ID'];
            echo '" name="cid" value="';
            echo $row['ID'];
            echo '">';
            echo '<label for="cid';
            echo $row['ID'];
            echo '">ID ';
            echo $row['ID'];
            echo '</label><br>';
		}
		?>
	</form>
	</div>
	<div class="imgcontainer2">
		<button class="button2" type="submit"><a href="Control.php?id=<?php echo $_GET['id']; ?>&type=2&cid=<?php echo $_GET['cid']; ?>">Get Collections</a></button>
	</div>
    <div class="imgcontainer2">
		<button class="button2" type="submit"><a href="Control.php?id=<?php echo $_GET['id']; ?>&type=1&cid=<?php echo $_GET['cid']; ?>">Get Image</a></button>
	</div>
	<div class="imgcontainer2">
		<button class="button2" type="submit"><a href="Control.php?id=<?php echo $_GET['id']; ?>&type=3&cid=<?php echo $_GET['cid']; ?>">Get Transformations</a></button>
	</div>
    <div class="imgcontainer2">
    <form method="GET">
    <?php
		$stmt = $db->query("SELECT * FROM image");
		while ($row = $stmt->fetch()) {
			echo '<input onclick="location.href=\'Control.php?id=';
			echo $row['ID'];
			echo '&type=0&cid=0\'" type="radio" id="id';
            echo $row['ID'];
            echo '" name="id" value="';
            echo $row['ID'];
            echo '">';
            echo '<label for="id';
            echo $row['ID'];
            echo '">ID ';
            echo $row['ID'];
            echo '</label><br>';
		}
		?>
</form>
	</div>
	</div>
  </div>
	  <div class="row blockDisplay">
		<div class="column_half left_half"> </div>
		<div class="column_half right_half"> </div>
	  </div>
	  <div class="social" style="background-color:#17191a;">
	  <?php
      if($_GET['type']==1)
      {
          $in=$_GET['id'];
		$stmt = $db->query("SELECT * FROM image where ID=$in");
		while ($row = $stmt->fetch()) {
			echo '<p class="social_icon"><img src="public/';
			echo $row['ID'];
			echo '.jpg" width="100" alt="" class="thumbnail"/></p>';
		}
      }
	  if($_GET['type']==2)
	  {
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
	  }
	  if($_GET['type']==3)
	  {
		$in=$_GET['id'];
	 	$stmt = $db->query("SELECT * FROM image where ID=$in");
		while ($row = $stmt->fetch()) {
      	$n=$row['Transforms'];
		echo '<p class="social_icon"><img onclick="location.href=\'Image.php?id=';
		echo $in;
		echo '\'" src="/Tema2b2/public/';
		echo $in;
        echo '.jpg" class="thumbnail"></p>';
		echo '<p>Image ',$in,' allows the following transformations:</p>';
		while($n>0)
      {
		$c=$n%10;
        if($c==1)
		echo '<p>Noisify</p>';
		if($c==2)
		echo '<p>Sharpen Contrast</p>';
		if($c==3)
		echo '<p>Flop</p>';
		if($c==4)
		echo '<p>Emboss</p>';
		if($c==5)
		echo '<p>Charcoal</p>';
        $n=intdiv($n,10);
      }
		}
	  }
	  if($_GET['type']==4)
	  {
	  $in=$_GET['cid'];
	  $stmt = $db->query("SELECT * FROM collections where ID=$in");
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
	  }
		?>
	  </div>
	  <footer class="secondary_header footer">
		<p style="color:#17191a;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 25px;text-align: center;">
			ImageR 2021
		</p>
	  </footer>
</div>
</body>
</html>
