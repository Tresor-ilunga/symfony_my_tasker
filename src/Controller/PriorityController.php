<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Priority;
use App\Entity\Task;
use App\Form\PriorityType;
use App\Repository\PriorityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PriorityController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class PriorityController extends AbstractController
{
    #[Route('/priority', name: 'app_priority', methods: ['GET', 'POST'])]
    public function index(PriorityRepository $repository): Response
    {
        $priorities = $repository->findAll();

        return $this->render('pages/priority/index.html.twig', [
            'priorities' => $priorities,
        ]);
    }

    #[Route('/priority/new', name: 'app_priority_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $priority = new Priority();
        $form = $this->createForm(PriorityType::class, $priority);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $priority = $form->getData();

            $manager->persist($priority);
            $manager->flush();

            $this->addFlash('success', 'La priorité a été ajoutée avec succès');

            return $this->redirectToRoute('app_priority');
        }

        return $this->render('pages/priority/new.html.twig', [
            'priority' => $priority,
            'form' => $form->createView(),
        ]);
    }

    public function edit(Request $request, Priority $priority, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(PriorityType::class, $priority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $priority = $form->getData();

            $manager->persist($priority);
            $manager->flush();

            $this->addFlash('success', 'La priorité a été modifiée avec succès');

            return $this->redirectToRoute('app_priority');
        }


        return $this->render('pages/priority/edit.html.twig', [
            'priority' => $priority,
            'form' => $form->createView(),
        ]);
    }

    public function delete(EntityManagerInterface $manager, Task $task): Response
    {
        $manager->remove($task);
        $manager->flush();

        $this->addFlash('success', 'La tâche a été supprimée avec succès');

        return $this->redirectToRoute('app_priority');
    }
}
