<?php

namespace App\Controller;

//use App\Entity\Utilisateurs;
// //use Doctrine\ORM\EntityManager;

use App\Form\UtilisateursFormType;
//use Doctrine\ORM\EntityManagerInterface;


use App\Entity\Utilisateurs;
use App\Form\RegistrationFormEditType;
use App\Form\RegistrationFormType;
use App\Repository\UtilisateursRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
     * @Route("/utilisateurs")
     */
    
class UtilisateursController extends AbstractController
{
    /**
     * @Route("/", name="utilisateur_index", methods={"GET"})
     */
    public function index(UtilisateursRepository $utilisateursRepository): Response
    {
        return $this->render('utilisateurs/index.html.twig', [
            'utilisateur' => $utilisateursRepository->findAll(),
        ]);
    }

         
/**
     * @Route("/formulaireUtilisateur", name = "formulaireUtilisateur_index", methods={"GET","POST"})
     */
    public function formulaireUtilisateur(Request $request): Response
    {
        $utilisateurs = new Utilisateurs();
        
        $form = $this->createForm(UtilisateursFormType::class, $utilisateurs);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateurs);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateurs/formulaireUtilisateur.html.twig', [
            'utilisateur' => $utilisateurs,
            'formUtilisateur' => $form->createView(),
        ]);
    }

    /**
     * @Route("/nouvelUtilisateur", name="nouvelUtilisateur_index", methods={"GET","POST"})
     */
    public function nouvelUtilisateur(Request $request): Response
    {
        $utilisateurs = new Utilisateurs();
        $form = $this->createForm(UtilisateursFormType::class, $utilisateurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

              // encode the password
              //$utilisateurs->setPassword(
//                $userPasswordEncoder->encodePassword(
                    //$utilisateurs,
                    //$form->get('password')->getData()
                //)
            //);

            $entityManager->persist($utilisateurs);

            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index');
        }

        return $this->render('utilisateurs/nouvelUtilisateur.html.twig', [
            'utilisateur' => $utilisateurs,
            'formUtilisateur' => $form->createView(),
        ]);
    }

    /**
     * @Route("/afficherUtilisateur/{id}", name="afficherUtilisateur_index", methods={"GET"})
     */
    public function afficherUtilisateur(Utilisateurs $utilisateurs): Response
    {
        return $this->render('utilisateurs/afficherUtilisateur.html.twig', [
            'utilisateur' => $utilisateurs,
        ]);
    }

    /**
     * @Route("/modifierUtilisateur/{id}", name="modifierUtilisateur_index", methods={"GET","POST"})
     */
    public function modifierUtilisateur(Request $request, Utilisateurs $utilisateurs): Response
    {
        $utilisateurs = new Utilisateurs();

        $form = $this->createForm(UtilisateursFormType::class, $utilisateurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateurs);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateurs/modifierUtilisateur.html.twig', [
            'utilisateurs' => $utilisateurs,
            'formUtilisateur' => $form->createView(),
        ]);
    }

// SUPPRESSION DES UTILISATEURS
    /**
     * @Route("/supprimerUtilisateur/{id}" , name="supprimerUtilisateur_index", methods= {"GET","POST"})
     */
    public function supprimerUtilisateur(Request $request, Utilisateurs $utilisateurs , EntityManagerInterface $entityManager) : Response 
    {           
            $entityManager->remove($utilisateurs);
            $entityManager->flush();
            return $this->redirectToRoute('utilisateur_index'); 
    }


    
    }
