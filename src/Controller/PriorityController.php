<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Priority;
use App\Entity\Task;
use App\Form\PriorityType;
use App\Repository\PriorityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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

    /**
     * This method is used to display the list of priorities
     *
     * @param PriorityRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/priority', name: 'app_priority', methods: ['GET', 'POST'])]
    public function index(PriorityRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        return $this->render('pages/priority/index.html.twig',
            parameters: [
                'priorities' => $paginator->paginate(
                    target: $repository->findAll(),
                    page: $request->query->getInt('page', 1),
                    limit: 10
                )
            ]
        );
    }

    /**
     * This method is used to create a new priority
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
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

    /**
     * This method is used to edit a priority
     *
     * @param Request $request
     * @param Priority $priority
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/priority/edit/{id}', name: 'app_priority_edit', methods: ['GET', 'POST'])]
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

    /**
     * This method is used to delete a priority
     *
     * @param EntityManagerInterface $manager
     * @param Task $task
     * @return Response
     */
    #[Route('/priority/delete/{id}', name: 'app_priority_delete', methods: ['POST'])]
    public function delete(EntityManagerInterface $manager, Task $task): Response
    {
        $manager->remove($task);
        $manager->flush();

        $this->addFlash('success', 'La tâche a été supprimée avec succès');

        return $this->redirectToRoute('app_priority');
    }
}
