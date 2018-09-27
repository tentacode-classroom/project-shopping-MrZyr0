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
         $products = [
             [
                 'id' => 1,
                 'name' => 'Pitrouille',
                 'race' => 'Européen',
             ],
             [
                 'id' => 2,
                 'name' => 'Vanille',
                 'race' => 'Européen',
             ],
             [
                 'id' => 3,
                 'name' => 'Actimelle',
                 'race' => 'Européen',
             ],
             [
                 'id' => 4,
                 'name' => 'Gribouille',
                 'race' => 'Siamois',
             ],
         ];


         return $this->render('product/index.html.twig', [
             'title' => 'Produit n°' . $productNumber,
             'productNumber' => $productNumber,
             'productObject' => $products
         ]);
     }
}
