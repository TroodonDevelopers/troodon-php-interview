<?php

namespace App\Controller;

use App\Entity\Cat;
use Predis\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $em = $this->getDoctrine();
        $cats = $em->getRepository(Cat::class)->findAll();

        return $this->render('default/index.html.twig', [
            'cats' => $cats,
        ]);
    }
}
