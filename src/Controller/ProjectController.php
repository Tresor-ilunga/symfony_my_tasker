<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProjectRepository;
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
        return $this->render('pages/project/project.html.twig',
            parameters: [
                'project' => $paginator->paginate(
                    target: $repository->findAll(), //['user' => $this->getUser()]
                    page: $request->query->getInt('page', 1),
                    limit: 10
                )
            ]
        );
    }
}
