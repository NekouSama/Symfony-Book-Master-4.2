<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/usercontent/")
 */
class PublicUserContentController extends AbstractController
{
    /**
     * @Route("avatar/{id}")
     */
    public function getUserContentAvatar(int $id, Request $request)
    {
        $host = 'http://' . $request->getHttpHost() . '/';
        $image_profil = $host . getenv('USER_AVATAR_DIRECTORY') . $id . '.png';

        $dimension = $request->get('d');
        //Dimension can't exceed 400px
        if ($dimension > 400) {
            $dimension = 400;
        }

        return new Response("<img src='{$image_profil}' height='{$dimension}' width='{$dimension}'/>");
    }
}
