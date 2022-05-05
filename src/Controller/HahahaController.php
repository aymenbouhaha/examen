<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HahahaController extends AbstractController
{
    #[Route('/hahaha', name: 'app_hahaha')]
    public function index(): Response
    {
        return $this->render('hahaha/index.html.twig', [
            'controller_name' => 'HahahaController',
        ]);
    }
}
