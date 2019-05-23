<?php

namespace App\Controller;

use App\Entity\Authors;
use App\Form\AuthorFilterType;
use App\Repository\AuthorsRepository;
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

    /**
     * @Route("/step4/")
     */
    public function generateUser(EntityManagerInterface $entityManager)
    {
        $faker = Factory::create();

        $author = new Authors();
        $author->setFirstName($faker->firstName);
        $author->setLastName($faker->lastName);
        $author->setEmail($faker->safeEmail);
        $author->setBirthdate($faker->dateTime);
        $author->setPassword('this_is_a_test_password');

        $entityManager->persist($author);
        $entityManager->flush($author);

        return new JsonResponse($author);
    }

}
