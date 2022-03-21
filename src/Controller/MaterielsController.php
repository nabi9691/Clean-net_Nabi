<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaterielsController extends AbstractController
{
    /**
     * @Route("/materiels", name="app_materiels")
     */
    public function index(): Response
    {
        return $this->render('materiels/index.html.twig', [
            'controller_name' => 'MaterielsController',
        ]);
    }
}
