<?php
$img = imagecreatetruecolor(300, 300);
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$gray = imagecolorallocate($img, 238, 238, 238);
$red = imagecolorallocate($img, 200, 10, 200);
imagefill($img, 0, 0, $white);

//时钟轮廓
imagearc($img, 150, 150, 152, 152, 0, 0, $black);
imagearc($img, 150, 150, 150, 150, 0, 0, $black);
imagearc($img, 150, 150, 149, 149, 0, 0, $black);
imagearc($img, 150, 150, 148, 148, 0, 0, $black);

//时钟中心
imagefilledarc($img, 150, 150, 4, 4, 0, 0, $black, IMG_ARC_PIE);

//刻度线
for ($i=0;$i<60;$i++){
    if ($i % 5 == 0){
        imageline($img, 150-65*cos(deg2rad(6*$i)), 150 + 65*sin(deg2rad(6*$i)), 150-75*cos(deg2rad(6*$i)), 150 + 75*sin(deg2rad(6*$i)), $black);
    }else{
        imageline($img, 150-70*cos(deg2rad(6*$i)), 150 + 70*sin(deg2rad(6*$i)), 150-75*cos(deg2rad(6*$i)), 150 + 75*sin(deg2rad(6*$i)), $black);
    }
}

//指针
$date = date('h i s');
$date = explode(' ', $date);
$hour = $date[0] * 30;
$minute = $date[1] * 6;
$second = $date[2] * 6;
$radio = $minute==0?1:60/$date[1];
imageline($img, 150, 150, 150+30*sin(deg2rad($hour+30/$radio)), 150-30*cos(deg2rad($hour+30/$radio)), $red);
imageline($img, 150, 150, 150+40*sin(deg2rad($minute)), 150-40*cos(deg2rad($minute)), $red);
imageline($img, 150, 150, 150+55*sin(deg2rad($second)), 150-55*cos(deg2rad($second)), $red);

//图像输出
header("Content-type:image/png");
imagepng($img);
imagedestroy($img);