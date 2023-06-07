<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Priority;
use App\Entity\Task;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Class DashboardController
 *
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class DashboardController extends AbstractDashboardController
{

    /**
     * This method is called for each page that is secured and whose URL starts
     *
     * @return Response
     */
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    /**
     * This method is called for each page that EasyAdmin renders (including)
     *
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Task - Admin')
            ->renderContentMaximized();
    }

    /**
     * This method is called for each page that EasyAdmin renders (including)
     *
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Priorité', 'fas fa-bars-progress', Priority::class);
        yield MenuItem::linkToCrud('Tâches', 'fas fa-bars-progress', Task::class);
    }
}
