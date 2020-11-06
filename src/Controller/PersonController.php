<?php

namespace App\Controller;

use App\Entity\Person;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


 /**
     * @Route("/person", name="person")
     */
class PersonController extends AbstractController
{
   /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $doctrine = $this->getDoctrine();
        $manager = $doctrine->getManager();
        $repositoryPerson = $manager->getRepository(Person::class);
        
        return $this ->render('person/index.html.twig',[
            'persons'->$repositoryPerson->findAll(),
        ]);
    }
}
