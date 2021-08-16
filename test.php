<?php
// // $a = ["a"=>["b"=>1,"c"=>2,"d"=>3]];

// // set the text to draw
$text = '日';
// // Replace path by your own font path
$font = 'yugothib.ttf';
 
// // And add the text
// imagettftext($im, 25, 0, 50, 100, $black, $font, $text);

// // Using imagepng() results in clearer text compared with imagejpeg()
// imagepng($im,"IMAGE.png");


$text_bound = imageftbbox(100, 0, $font, $text);

//Get the text upper, lower, left and right corner bounds
$lower_left_x =  $text_bound[0]; 
$lower_left_y =  $text_bound[1];
$lower_right_x = $text_bound[2];
$lower_right_y = $text_bound[3];
$upper_right_x = $text_bound[4];
$upper_right_y = $text_bound[5];
$upper_left_x =  $text_bound[6];
$upper_left_y =  $text_bound[7];


//Get Text Width and text height
$text_width =  $lower_right_x - $lower_left_x; //or  $upper_right_x - $upper_left_x
$text_height = $lower_right_y - $upper_right_y; //or  $lower_left_y - $upper_left_y

$image_width = 800;
$image_height = 600;

// if($image_width-$text_width<10){
//     $image_width = $image_width + (10 - $image_width + $text_width);
// }

$image = imagecreatetruecolor($image_width, $image_height);
print_r(imagesx($image).', '.$text_width);
// // Create a few colors
$white = imagecolorallocate($image, 255, 255, 255);
// $grey = imagecolorallocate($image, 128, 128, 128);
$black = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $image_width, $image_height, $white);


//Get the starting position for centering
$start_x_offset = ($image_width - $text_width) / 2;
$start_y_offset = ($image_height + $text_height) / 2;

// Add text to image
imagettftext($image, 100, 0, $start_x_offset, $start_y_offset, $black, $font, $text);
imagepng($image,"IMAGE.png");
