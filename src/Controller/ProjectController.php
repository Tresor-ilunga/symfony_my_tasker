<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class
 *
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project', methods: ['GET'])]
    public function index(ProjectRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        return $this->render('pages/project/index.html.twig',
            parameters: [
                'project' => $paginator->paginate(
                    target: $repository->findBy(['user' => $this->getUser()]),
                    page: $request->query->getInt('page', 1),
                    limit: 10
                )
            ]
        );
    }

    #[Route('/project/new', name: 'app_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $project = $form->getData();
            $project->setUser($this->getUser());

            $manager->persist($project);
            $manager->flush();

            $this->addFlash('success', 'Project created successfully!');

            return $this->redirectToRoute('app_project');
        }

        return $this->render('pages/project/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/project/edit/{id}', name: 'app_project_edit', methods: ['GET', 'POST'])]
    public function edit(Project $project, EntityManagerInterface $manager, Request $request): Response
    {
        $form = $this->createForm(ProjectType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $project = $form->getData();

            $manager->persist($project);
            $manager->flush();

            $this->addFlash('success', 'Project updated successfully!');

            return $this->redirectToRoute('app_project');
        }

        return $this->render('pages/project/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/project/delete/{id}', name: 'app_project_delete', methods: ['GET', 'POST'])]
    public function delete(Project $project, EntityManagerInterface $manager): Response
    {
        $manager->remove($project);
        $manager->flush();

        $this->addFlash('success', 'Project deleted successfully!');

        return $this->redirectToRoute('app_project');
    }
}
