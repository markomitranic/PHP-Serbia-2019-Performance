<?php

namespace App\Controller;

use App\Entity\Authors;
use App\Form\AuthorFilterType;
use App\Repository\AuthorsRepository;
use App\Service\CropFilter;
use App\Service\ImageCacheService;
use App\Service\RoundCircleFilter;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{

    const ORIGINAL_IMAGE_PATH = '/usr/share/nginx/app/uploads/1d45bf7ad5d3c154c19a58fd6bcbb981.jpg';
    const OUTPUT_IMAGE_PATH = '/usr/share/nginx/app/uploads/generated/';

    /**
     * @Route("/step4/")
     * @param RoundCircleFilter $roundFilter
     * @param CropFilter $cropFilter
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function showCompressedImage(
        RoundCircleFilter $roundFilter,
        CropFilter $cropFilter,
        ImageCacheService $imageCacheService
    ) {

        $roundedImageFileName = $roundFilter->filter(self::ORIGINAL_IMAGE_PATH);
        $croppedImageFileName = $cropFilter->filter($roundedImageFileName);

//        $croppedImageFileName = $imageCacheService->getFromCache(self::ORIGINAL_IMAGE_PATH);

        $originalUrl = $this->generateRelativeUrl(self::ORIGINAL_IMAGE_PATH);
        $newImageUrl = $this->generateRelativeUrl($croppedImageFileName);

        return $this->render('image.twig', ['original' => $originalUrl, 'compressed' => $newImageUrl]);
    }

    private function generateRelativeUrl(string $filePath): string {
        return str_replace('/usr/share/nginx/app/', '/', $filePath);
    }

}
