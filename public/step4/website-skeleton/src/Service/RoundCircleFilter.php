<?php

namespace App\Service;

use App\Controller\IndexController;

class RoundCircleFilter implements ImageFilter
{

    public function filter(string $imagePath): string
    {
        $image = imagecreatefromjpeg($imagePath);
        if (!$image) {
            throw new \Exception('Unable to read the image.', 500);
        }

        $width = imagesx($image);
        $height = imagesy($image);

        $newwidth = 285;
        $newheight = 232;

        $trueColor = imagecreatetruecolor($newwidth, $newheight);
        imagealphablending($trueColor,true);
        imagecopyresampled($trueColor,$image,0,0,0,0,$newwidth,$newheight,$width,$height);

        $mask = imagecreatetruecolor($width, $height);
        $mask = imagecreatetruecolor($newwidth, $newheight);

        $transparent = imagecolorallocate($mask, 255, 0, 0);
        imagecolortransparent($mask, $transparent);

        imagefilledellipse($mask, $newwidth/2, $newheight/2, $newwidth, $newheight, $transparent);

        $red = imagecolorallocate($mask, 0, 0, 0);
        imagecopymerge($trueColor, $mask, 0, 0, 0, 0, $newwidth, $newheight,100);

        imagecolortransparent($trueColor, $red);
        imagefill($trueColor,0,0, $red);

        $newImageFileName = IndexController::OUTPUT_IMAGE_PATH . rand(100,1000) . rand(100,1000) . '.png';
        imagepng($trueColor, $newImageFileName);

        imagedestroy($trueColor);

        return $newImageFileName;
    }


}

