<?php

namespace App\Controller;

use App\Form\JeuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JeuController extends AbstractController
{
    /**
     * @Route("/jeu", name="app_jeu")
     */
    public function index(Request $request): Response
    {
        $form=$this->createForm(JeuType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $data= $form->getData();
            
            $data['alea']=rand(0.100);

            if ($data['alea'] == $data['number']){
                $data['reponse']="vous avez gagné, c'est bien joué";
            }else{
                $data['reponse']="vous avez perdu, dommage !!";
            }

            
            return $this->render('jeu/traitement.html.twig', [
                'hassoun'=> $data,
                
            ]);
        }
        return $this->renderForm('jeu/index.html.twig',
        [
            'form'=>$form
        ]);
    }

}
