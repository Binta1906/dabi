<?php

namespace App\Controller;

use App\Entity\autorisation;
use App\Form\AutorisationType;
use App\Repository\AutorisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutorisationController extends AbstractController
{
    /**
     * @Route("/autorisation", name="autorisation_index")
     */
    public function index(AutorisationRepository $autorisationRepository): Response
    {
        return $this->render('autorisation/index.html.twig', [
            'autorisations' => $autorisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="autorisation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $autorisation = new autorisation();
        $form = $this->createForm(AutorisationType::class, $autorisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($autorisation);
            $entityManager->flush();

            return $this->redirectToRoute('autorisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('autorisation/new.html.twig', [
            'autorisation' => $autorisation,
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/{id}", name="autorisation_show", methods={"GET"})
     */
    // public function show(autorisation $user): Response
    // {
    //     return $this->render('autorisation/show.html.twig', [
    //         'autorisation' => $autorisation,
    //     ]);
    // }

    /**
     * @Route("/{id}/edit", name="autorisation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, autorisation $autorisation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AutorisationType::class, $autorisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('autorisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('autorisation/edit.html.twig', [
            'autorisation' => $autorisation,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/{id}", name="autorisation_delete", methods={"POST"})
     */ 
    public function delete(Request $request, autorisation $autorisation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$autorisation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($autorisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('autorisation_index', [], Response::HTTP_SEE_OTHER);
    }
}
