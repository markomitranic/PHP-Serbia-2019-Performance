<?php

namespace App\Controller;

use App\Form\AuthorFilterType;
use App\Repository\AuthorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{

    /**
     * @Route("/step2/")
     */
    public function number(Request $request, AuthorsRepository $repository)
    {
        $form = $this->createForm(AuthorFilterType::class);
        $form->handleRequest($request);

        $authors = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $dates = $form->getData();
            $authors = $repository->getBornBetween($dates['dateFrom'], $dates['dateTo']);

        }

        return $this->render('authors/authors.html.twig', ['form' => $form->createView(), 'authors' => $authors]);
    }
}