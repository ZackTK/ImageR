<?php
$path="F:/PWProiect/htdocs/Tema2B2/public/2.jpg";
header('Content-type: image/jpeg');
$image = new Imagick($path);
$image->writeImage("F:/PWProiect/htdocs/Tema2B2/public/temp.jpg");
echo $image;
?>