<?php

namespace App\Controller;

use App\Entity\Boeken;
use App\Form\BoekenType;
use App\Repository\BoekenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boeken")
 */
class BoekenController extends AbstractController
{
    /**
     * @Route("/", name="boeken_index", methods={"GET"})
     */
    public function index(BoekenRepository $boekenRepository): Response
    {
        return $this->render('boeken/index.html.twig', [
            'boekens' => $boekenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="boeken_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $boeken = new Boeken();
        $form = $this->createForm(BoekenType::class, $boeken);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($boeken);
            $entityManager->flush();

            return $this->redirectToRoute('boeken_index');
        }

        return $this->render('boeken/new.html.twig', [
            'boeken' => $boeken,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="boeken_show", methods={"GET"})
     */
    public function show(Boeken $boeken): Response
    {
        return $this->render('boeken/show.html.twig', [
            'boeken' => $boeken,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="boeken_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Boeken $boeken): Response
    {
        $form = $this->createForm(BoekenType::class, $boeken);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boeken_index');
        }

        return $this->render('boeken/edit.html.twig', [
            'boeken' => $boeken,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="boeken_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Boeken $boeken): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boeken->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($boeken);
            $entityManager->flush();
        }

        return $this->redirectToRoute('boeken_index');
    }
}
