<?php
$path="F:/PWProiect/htdocs/Tema2B2/public/4.jpg";
header('Content-type: image/jpeg');
$image = new Imagick($path);
$image->setImageResolution(1280, 720);
$image->writeImage("F:/PWProiect/htdocs/Tema2B2/public/temp.jpg");
echo $image;
?>