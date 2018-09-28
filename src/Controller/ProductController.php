<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productNumber}", name="product")
     */
     public function index(int $productNumber)
     {
        $product = $this->getDoctrine()
                        ->getRepository(Product::class)
                        ->find($productNumber);

        if (!$product)
        {
            throw $this->createNotFoundException(
            'No product found for id n°'.$productNumber
            );
        }

        $product->incrementViewCounter();
        $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($product);
                $entityManager->flush();


        return $this->render('product/index.html.twig', [
        'title' => 'Produit n°' . $productNumber,
        'product' => $product
        ]);
     }
}
