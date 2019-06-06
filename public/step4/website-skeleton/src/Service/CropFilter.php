<?php

namespace App\Service;

use App\Controller\IndexController;

class CropFilter implements ImageFilter
{

    /**
     * @param string $imagePath
     * @return string
     * @throws \Exception
     */
    public function filter(string $imagePath): string
    {
        $ext = pathinfo($imagePath, PATHINFO_EXTENSION);

        if ($ext=="jpg" || $ext=="jpeg") {
            $image = imagecreatefromjpeg($imagePath);
        } else if ($ext=="png") {
            $image = imagecreatefrompng($imagePath);
        }

        if (!$image) {
            throw new \Exception('Unable to read the image.', 500);
        }

        $croppedImage = imagecrop($image, [
            'x' => 0,
            'y' => 0,
            'width' => 80,
            'height' => 80
        ]);

        $newImagePath = IndexController::OUTPUT_IMAGE_PATH . rand(100,1000) . rand(100,1000) . '.jpg';
        imagejpeg($croppedImage, $newImagePath);

        return $newImagePath;
    }
}
