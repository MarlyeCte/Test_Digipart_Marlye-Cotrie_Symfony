<?php

namespace App\Controller;

use App\Entity\Marchandise;
use App\Form\MarchandiseType;
use App\Repository\MarchandiseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marchandise')]
class MarchandiseController extends AbstractController
{
    #[Route('/', name: 'app_marchandise_index', methods: ['GET'])]
    public function index(MarchandiseRepository $marchandiseRepository): Response
    {
        return $this->render('marchandise/index.html.twig', [
            'marchandises' => $marchandiseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_marchandise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marchandise = new Marchandise();
        $form = $this->createForm(MarchandiseType::class, $marchandise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($marchandise);
            $entityManager->flush();

            return $this->redirectToRoute('app_marchandise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marchandise/new.html.twig', [
            'marchandise' => $marchandise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_marchandise_show', methods: ['GET'])]
    public function show(Marchandise $marchandise): Response
    {
        return $this->render('marchandise/show.html.twig', [
            'marchandise' => $marchandise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_marchandise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Marchandise $marchandise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MarchandiseType::class, $marchandise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_marchandise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marchandise/edit.html.twig', [
            'marchandise' => $marchandise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_marchandise_delete', methods: ['POST'])]
    public function delete(Request $request, Marchandise $marchandise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$marchandise->getId(), $request->request->get('_token'))) {
            $entityManager->remove($marchandise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_marchandise_index', [], Response::HTTP_SEE_OTHER);
    }
}
