<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'email' => $this->getUser()->getEmail(),
            'test' => $request->getRequestFormat()
        ]);
    }

    public function navbar()
    {
        if ($this->getUser()) {
            $image_profil = getenv('USER_AVATAR_DIRECTORY') . $this->getUser()->getId() . '.png';
        }

        return $this->render('navbar.html.twig', [
            'user' => $this->getUser(),
            'image_profil' => $image_profil ?? null
        ]);
    }
}
