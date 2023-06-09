<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Class HomeController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class HomeController extends AbstractController
{
    /**
     * This method is used to display the home page
     *
     * @return Response
     */
    #[Route('', name: 'app_home',  methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('pages/home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
