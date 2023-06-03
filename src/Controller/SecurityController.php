<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class SecurityController extends AbstractController
{

    /**
     * This method allows to login
     *
     * @param AuthenticationUtils $utils
     * @return Response
     */
    #[Route('/login', name: 'security_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $utils): Response
    {
        $error = $utils->getLastAuthenticationError();

        return $this->render('pages/security/login.html.twig', [
            'error' => $error,
            'last_username' => $utils->getLastUsername()
        ]);
    }

    /**
     * This method allows to logout
     *
     * @throws Exception
     */
    #[Route('/logout', name: 'security_logout')]
    public function logout(): void
    {
        throw new Exception('Don\'t forget to activate logout in security.yaml');
    }

}
