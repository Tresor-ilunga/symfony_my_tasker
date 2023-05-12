<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class SecurityController extends AbstractController
{
    #[Route('/security', name: 'app_security', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('pages/security/login.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
