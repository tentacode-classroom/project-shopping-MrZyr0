<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productNumber}", name="product")
     */
     public function index(int $productNumber)
     {


         return $this->render('product/index.html.twig', [
             'title' => 'Produit n°' . $productNumber,
             'productNumber' => $productNumber
         ]);
     }
}
