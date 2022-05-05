<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PFEType;
use App\Repository\EntrepriseRepository;
use App\Repository\PFERepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddPfeController extends AbstractController
{
    public function __construct(private PFERepository $repository,private EntrepriseRepository $entrepriseRepository)
    {
    }

    #[Route('/add/pfe', name: 'app_add_pfe')]
    public function index(Request $request): Response
    {
        $pfe=new PFE();
        $form=$this->createForm(PFEType::class,$pfe);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $entreprise=$this->entrepriseRepository->findOneBy(["designation"=>$pfe->getEntreprise()->getDesignation()]);
            $entreprise->addPFE($pfe);
            $this->repository->add($pfe);
            return $this->redirectToRoute("detail");
        }
        return $this->render('add_pfe/index.html.twig',[
            "form"=>$form->createView()
        ]);
    }

    #[Route('/add/detail', name: "detail")]
    function detail(){
        return $this->render('add_pfe/detail.html.twig');
    }



}
