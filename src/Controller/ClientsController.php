<?php

namespace App\Controller;


use App\Form\ClientsFormType;


use App\Entity\Clients;
use App\Form\RegistrationFormEditType;
use App\Form\RegistrationFormType;
use App\Repository\ClientsRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
     * @Route("/clients")
     */
    
class ClientsController extends AbstractController
{
    /**
     * @Route("/", name="client_index", methods={"GET"})
     */
    public function index(ClientsRepository $clientsRepository): Response
    {
        return $this->render('clients/index.html.twig', [
            'client' => $clientsRepository->findAll(),
        ]);
    }

         
/**
     * @Route("/formulaireClient", name = "formulaireClient_index", methods={"GET","POST"})
     */
    public function formulaireClient(Request $request): Response
    {
        $clients = new Clients();
        
        $form = $this->createForm(ClientsFormType::class, $clients);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clients);
            $entityManager->flush();

            return $this->redirectToRoute('client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('clients/formulaireClient.html.twig', [
            'client' => $clients,
            'formClients' => $form->createView(),
        ]);
    }

    /**
     * @Route("/nouveauClient", name="nouveauClient_index", methods={"GET","POST"})
     */
    public function nouvelClient(Request $request): Response
    {
        $clients = new Clients();
        $form = $this->createForm(ClientsFormType::class, $clients);
                
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

            $entityManager->persist($clients);

            $entityManager->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('clients/nouveauClient.html.twig', [
            'client' => $clients,
            'formClients' => $form->createView(),

        ]);
    }

    /**
     * @Route("/afficherClient/{id}", name="afficherClient_index", methods={"GET"})
     */
    public function afficherClient(Clients $clients): Response
    {
        return $this->render('client/afficherClient.html.twig', [
            'client' => $clients,

        ]);
    }

    /**
     * @Route("/modifierClient/{id}", name="modifierClient_index", methods={"GET","POST"})
     */
    public function modifierClient(Request $request, Clients $clients): Response
    {
        $form = $this->createForm(ClientsFormType::class, $clients);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clients);
            $entityManager->flush();

            return $this->redirectToRoute('client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client/modifierClient.html.twig', [
            'client' => $clients,
            'formClients' => $form->createView(),

        ]);
    }

// SUPPRESSION d'un client :
    /**
     * @Route("/supprimerClient/{id}" , name="supprimerClient_index", methods= {"GET","POST"})
     */
    public function supprimerClient(Request $request, Clients $clients, EntityManagerInterface $entityManager) : Response 
    {           
            $entityManager->remove($clients);
            $entityManager->flush();
            return $this->redirectToRoute('client_index'); 
    }


    
    }
