<?php

namespace App\Controller;

use App\Form\AuthorFilterType;
use App\Repository\AuthorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
        $user = $repository->find($id);
        return new JsonResponse($user);
    }
}
