<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UsersDisplayController extends AbstractController
{
    /**
     * @Route("/user_display", name="users_display")
     */

    public function index()
    {
        $users = $this->getDoctrine()
                ->getRepository(User::class)
                ->findUsers();

        return $this->render('user/display.html.twig', [
            'title' => 'Liste des Utilisateurs',
            'users' => $users
        ]);
    }
}
