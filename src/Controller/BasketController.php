<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketController extends AbstractController
{
    /**
     * @Route("/panier", name="basket-list")
     */
    public function index()
    {
        return $this->render('basket/index.html.twig', [
            'title' => 'BasketController',
        ]);
    }

    /**
     * @Route("/panier/add/{productId}", name="basket-add")
     */
    public function add(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', array());;
        $basketProducts = $productId;

        $session->set('basket_products', $basketProducts);

        return $this->redirectToRoute('basket-list');
    }

}
