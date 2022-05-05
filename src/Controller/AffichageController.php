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
    public function __construct(private EntrepriseRepository $repository ,private PFERepository
    $PFERepository)
    {
    }

    #[Route('/affichage', name: 'app_affichage')]
    public function index(): Response
    {
        $entreprise=$this->repository->findAll();
        for ($i=0;$i<count($entreprise);$i++){
            $pfes=$this->PFERepository->findBy(["entreprise"=>$entreprise[$i]]);
            for ($j=0;$j<count($pfes);$j++){
                $entreprise[$i]->addPFE($pfes[$j]);
            }
        }

        return $this->render('affichage/index.html.twig',[
            "entreprise"=>$entreprise
        ]);
    }
}
