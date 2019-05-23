<?php

namespace App\Controller;

use App\Form\AuthorFilterType;
use App\Repository\AuthorsRepository;
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

    /**
     * @Route("/step3/")
     */
    public function list()
    {
        return $this->render('authors/authors.html.twig');
    }

    /**
     * @Route("/step3/user/{id}")
     */
    public function findUserApi(AuthorsRepository $repository, string $id)
    {
        $author = $repository->find($id);

//        // This is how we can use Symfony Cache to cache to disk.
//        $authorCache = new FilesystemAdapter('author', 3600);
//
//        $author = $authorCache->get($id, function (ItemInterface $item) use ($repository, $id){
//            $item->expiresAfter(3600);
//            $author = $repository->find($id);
//            return $author;
//        });

        return new JsonResponse($author);
    }

}
