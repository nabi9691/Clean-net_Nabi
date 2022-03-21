<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommendesController extends AbstractController
{
    /**
     * @Route("/commendes", name="app_commendes")
     */
    public function index(): Response
    {
        return $this->render('commendes/index.html.twig', [
            'controller_name' => 'CommendesController',
        ]);
    }
}
