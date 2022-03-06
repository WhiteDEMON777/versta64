<?php	require __DIR__ . '/wp-load.php';
    $secret = rand(10001, 99999);
    $dir = get_template_directory()."/fonts/";
     
    $image = imagecreatetruecolor(100, 80);
    $black = imagecolorallocate($image, 0, 0, 0);
    $color = imagecolorallocate($image, 200, 100, 90); // red
    $white = imagecolorallocate($image, 255, 255, 255);
     
    imagefilledrectangle($image, 0, 0, 150, 80, $white);
    imagettftext($image, 20, 0, 10, 50, $color, $dir."ARIAL.TTF", $secret);
     
    header("Content-type: image/png");
    imagepng($image);
?>