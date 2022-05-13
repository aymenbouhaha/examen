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
    public function __construct(private PFERepository $repository )
    {
    }

    #[Route('/add/pfe', name: 'app_add_pfe')]
    public function index(Request $request): Response
    {
        $pfe=new PFE();
        $form=$this->createForm(PFEType::class,$pfe);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $this->repository->add($pfe);
            $this->addFlash("success","le pfe est ajouté avec succés ");
            return $this->render('add_pfe/detail.html.twig',[
                "pfe"=>$pfe
            ]);
        }
        return $this->render('add_pfe/index.html.twig',[
            "form"=>$form->createView()
        ]);
    }




}
