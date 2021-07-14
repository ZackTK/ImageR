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
		<?php
		$_SESSION['iden']=1;
		?>
      <p onclick="location.href=''" class="thumbnail_align"> <img src="scripts/img<?php echo $_GET['id']; ?>.php" alt="" class="thumbnail"/> </p>
	</div>
  	<div class="columns">
		<div class="imgcontainer">
			<button type="submit"><a href="Edit.php?id=<?php echo $_GET['id']; ?>&res=0&mod=0">Edit</a></button>
		</div>
		<div class="imgcontainer">
			<button type="submit"><a href="public/<?php echo $_GET['id']; ?>.jpg" download="image">Download</a></button>
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
