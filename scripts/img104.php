<?php
$path="F:/PWProiect/htdocs/Tema2B2/public/1.jpg";
header('Content-type: image/jpeg');
$image = new Imagick($path);
$image->embossImage(5, 1);
$image->writeImage("F:/PWProiect/htdocs/Tema2B2/public/temp.jpg");
echo $image;
?>