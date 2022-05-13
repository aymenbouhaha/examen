<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\PFERepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichageController extends AbstractController
{
    public function __construct(private EntrepriseRepository $repository , private PFERepository $PFERepository)
    {
    }

    #[Route('/affichage', name: 'app_affichage')]
    public function index(): Response
    {
        $entreprise=$this->repository->comptage();
        return $this->render('affichage/index.html.twig',[
            "entreprise"=>$entreprise
        ]);
    }

    #[Route('pfe/liste', name: 'liste')]
    public function affichage(){

        $pfes=$this->PFERepository->findAll();
        return $this->render('affichage/liste_pfes.html.twig',[
            "pfe"=>$pfes
        ]);
    }
}
