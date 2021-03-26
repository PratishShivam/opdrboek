<?php

namespace App\Controller;

use App\Entity\Filialen;
use App\Form\FilialenType;
use App\Repository\FilialenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/filialen")
 */
class FilialenController extends AbstractController
{
    /**
     * @Route("/", name="filialen_index", methods={"GET"})
     */
    public function index(FilialenRepository $filialenRepository): Response
    {
        return $this->render('filialen/index.html.twig', [
            'filialens' => $filialenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="filialen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $filialen = new Filialen();
        $form = $this->createForm(FilialenType::class, $filialen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($filialen);
            $entityManager->flush();

            return $this->redirectToRoute('filialen_index');
        }

        return $this->render('filialen/new.html.twig', [
            'filialen' => $filialen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="filialen_show", methods={"GET"})
     */
    public function show(Filialen $filialen): Response
    {
        return $this->render('filialen/show.html.twig', [
            'filialen' => $filialen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="filialen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Filialen $filialen): Response
    {
        $form = $this->createForm(FilialenType::class, $filialen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('filialen_index');
        }

        return $this->render('filialen/edit.html.twig', [
            'filialen' => $filialen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="filialen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Filialen $filialen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$filialen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($filialen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('filialen_index');
    }
}
