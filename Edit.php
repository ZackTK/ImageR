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
<link href="css/Image.css" rel="stylesheet" type="text/css">
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
	<p onclick="location.href=''" class="thumbnail_align"> <img src="scripts/img<?php echo $_GET['id']; ?><?php echo $_GET['res']; ?><?php echo $_GET['mod']; ?>.php" alt="" class="thumbnail"/> </p>
	</div>
  	<div class="columns">
	  <div class="imgcontainer2">
		</div>
		<div class="imgcontainer2">
		</div>
		<div class="imgcontainer2">
		<button>Choose a modifier:</button>
		</div>
		<?php
		$in=$_GET['id'];
	 	$stmt = $db->query("SELECT * FROM image where ID=$in");
		while ($row = $stmt->fetch()) {
      	$n=$row['Transforms'];
		while($n>0)
	 	{
		$c=$n%10;
        if($c==1)
		{
			echo '<div class="imgcontainer2">';
			echo '<button class="button2" type="submit"><a href="Edit.php?id=';
			echo $_GET['id'];
			echo '&res=';
			echo $_GET['res'];
			echo '&mod=1">Noisify</a></button>';
			echo '</div>';
		}
		if($c==2)
		{
			echo '<div class="imgcontainer2">';
			echo '<button class="button2" type="submit"><a href="Edit.php?id=';
			echo $_GET['id'];
			echo '&res=';
			echo $_GET['res'];
			echo '&mod=2">Sharpen Contrast</a></button>';
			echo '</div>';
		}
		if($c==3)
		{
			echo '<div class="imgcontainer2">';
			echo '<button class="button2" type="submit"><a href="Edit.php?id=';
			echo $_GET['id'];
			echo '&res=';
			echo $_GET['res'];
			echo '&mod=3">Flop</a></button>';
			echo '</div>';
		}
		if($c==4)
		{
			echo '<div class="imgcontainer2">';
			echo '<button class="button2" type="submit"><a href="Edit.php?id=';
			echo $_GET['id'];
			echo '&res=';
			echo $_GET['res'];
			echo '&mod=4">Emboss</a></button>';
			echo '</div>';
		}
		if($c==5)
		{
			echo '<div class="imgcontainer2">';
			echo '<button class="button2" type="submit"><a href="Edit.php?id=';
			echo $_GET['id'];
			echo '&res=';
			echo $_GET['res'];
			echo '&mod=5">Charcoal</a></button>';
			echo '</div>';
		}
        $n=intdiv($n,10);
      }
		}
		?>
	</div>
	<div class="columns">
		<div class="imgcontainer2">
		<form method="GET">
		<input onclick="location.href='Edit.php?id=<?php echo $_GET['id']; ?>&res=0&mod=<?php echo $_GET['mod']; ?>'" type="radio" id="res1" name="res" value="0">
  <label style="font-size:40px;padding-top:10px;" for="res1">1920x1080</label><br>
  <input onclick="location.href='Edit.php?id=<?php echo $_GET['id']; ?>&res=1&mod=<?php echo $_GET['mod']; ?>'" type="radio" id="res2" name="res" value="1">
  <label style="font-size:40px;padding-top:10px;" for="res2">1280x720</label><br>
</form>
		</div>
		<div class="imgcontainer2">
			<button type="submit"><a href="../Tema2B2/public/temp.jpg" download="edited">Download</a></button>
		</div>
	</div>
  </div>
	  <div class="row blockDisplay">
		<div class="column_half left_half"> </div>
		<div class="column_half right_half"> </div>
	  </div>
	  
	  <footer class="secondary_header footer">
		<p style="color:#17191a;font-family: 'Big Shoulders Stencil Display', cursive;font-size: 25px;text-align: center;">
			ImageR 2021
		</p>
	  </footer>
</div>
</body>
</html>
