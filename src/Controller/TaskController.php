<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TaskController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class TaskController extends AbstractController
{

    /**
     * This method is used to display the list of tasks
     *
     * @param TaskRepository $repository
     * @return Response
     */
    #[Route('/task', name: 'app_task', methods: ['GET', 'POST'])]
    public function index(TaskRepository $repository): Response
    {

        return $this->render('pages/task/task.html.twig', [
            'tasks' =>$repository->findAll()
        ]);
    }

    /**
     * This method is used to create a new task
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/task/new', name: 'app_task_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();

            $manager->persist($task);
            $manager->flush();

            $this->addFlash('success', 'La tâche a été ajoutée avec succès');

            return $this->redirectToRoute('app_task');
        }

        return $this->render('pages/task/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * This method is used to edit a task
     *
     * @param Task $task
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return Response
     */
    #[Route('/task/edit/{id}', name: 'app_task_edit', methods: ['GET', 'POST'])]
    public function edit(Task $task, EntityManagerInterface $manager, Request $request): Response
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();

            $manager->persist($task);
            $manager->flush();

            $this->addFlash('success', 'La tâche a été modifiée avec succès');

            return $this->redirectToRoute('app_task');
        }

        return $this->render('pages/task/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * This method is used to delete a task
     *
     * @param EntityManagerInterface $manager
     * @param Task $task
     * @return Response
     */
    #[Route('/task/delete/{id}', name: 'app_task_delete', methods: ['GET', 'POST'])]
    public function delete(EntityManagerInterface $manager, Task $task): Response
    {
        $manager->remove($task);
        $manager->flush();

        $this->addFlash('success', 'La tâche a été supprimée avec succès');

        return $this->redirectToRoute('app_task');

    }
}
