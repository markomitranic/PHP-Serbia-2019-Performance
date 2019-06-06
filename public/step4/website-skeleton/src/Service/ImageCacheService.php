<?php

namespace App\Service;

use App\Controller\IndexController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class ImageCacheService
{

    /**
     * @var RoundCircleFilter
     */
    private $roundFilter;

    /**
     * @var CropFilter
     */
    private $cropFilter;

    public function __construct(
        RoundCircleFilter $roundFilter,
        CropFilter $cropFilter
    ) {
        $this->roundFilter = $roundFilter;
        $this->cropFilter = $cropFilter;
    }

    public function getFromCache(string $filePath): ?string
    {
        $imageCache = new FilesystemAdapter('imageCache', 3600);

        $cacheName = pathinfo($filePath, PATHINFO_FILENAME);

        $roundFilter = $this->roundFilter;
        $cropFilter = $this->cropFilter;

        $compressedImagePath = $imageCache->get($cacheName, function (ItemInterface $item) use ($filePath, $roundFilter, $cropFilter) {
            $roundedImageFileName = $roundFilter->filter($filePath);
            $croppedImageFileName = $cropFilter->filter($roundedImageFileName);
            return $croppedImageFileName;
        });

        return $compressedImagePath;
    }

}
