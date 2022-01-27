<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DabiController extends AbstractController
{
    /**
     * @Route("/dabi", name="dabi")
     */
    public function index(): Response
    {
        return $this->render('dabi/index.html.twig', [
            'controller_name' => 'DabiController',
        ]);
    }
}
