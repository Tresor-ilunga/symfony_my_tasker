<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class HomeController extends AbstractController
{
    /**
     * This method is used to display the home page
     *
     * @return Response
     */
    #[Route('', name: 'app_home',  methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
