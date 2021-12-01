<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\FormulaireEtudiantType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
    /**
     * @Route("/ajoutEtudiant", name="ajout_etudiant")
     */

    public function ajout(Request $request, ManagerRegistry $doctrine): Response{
        $etudiant = new Etudiant();
        $form = $this->createForm(FormulaireEtudiantType::class,$etudiant);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
        }   return $this->renderForm(
            "etudiant/index.html.twig",
            ["formulaire" => $form]
        );

    }
}
