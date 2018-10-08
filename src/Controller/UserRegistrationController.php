<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\RegistrationType;

class UserRegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="user_registration")
     */
    public function index(Request $request)
    {

        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_registration_success');
        }

        return $this->render('user/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/inscription/ok", name="user_registration_success")
    */
    public function confirmation()
    {
        return $this->render('user/registration_success.html.twig');
    }
}
