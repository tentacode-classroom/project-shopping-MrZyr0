<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserRegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="user_registration")
     */
    public function index()
    {

        $usr = new User();

        $form = $this->createFormBuilder($usr)
        ->add('firstName', TextType::class, [
            'label' => 'Prénom'
        ])
        ->add('lastName', TextType::class,[
            'label' => 'Nom'
        ])
        ->add('email', EmailType::class,[
            'label' => 'Email'
        ])
        ->add('password', PasswordType::class,[
            'label' => 'Mot de Passe'
        ])
        ->add('submit', SubmitType::class)
        ->getForm();


        if ($form->isSubmitted() && $form->isValid())
        {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('user_registration/index.html.twig', array(
        'form' => $form->createView(),
        ));
    }
}
