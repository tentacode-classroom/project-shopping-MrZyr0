<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        // $productRepository = new ProductRepository();
        // $productRepository = $productRepository->findAll();

        // $products = [
        //     [
        //     'id' => 1,
        //     'name' => 'Pitrouille',
        //     'race' => 'Européen',
        //     ],
        //     [
        //     'id' => 2,
        //     'name' => 'Vanille',
        //     'race' => 'Européen',
        //     ],
        //     [
        //     'id' => 3,
        //     'name' => 'Actimelle',
        //     'race' => 'Européen',
        //     ],
        //     [
        //     'id' => 4,
        //     'name' => 'Gribouille',
        //     'race' => 'Siamois',
        //     ],
        // ];

        // $productsObjects = $this->getDoctrine()
        //         ->getRepository(Product::class)
        //         ->findAll();


        $productsObjects = $this->getDoctrine()
                ->getRepository(Product::class)
                ->findProductsHomepage();

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'title' => 'Accueil',
            // 'productObject' => $productRepository,
            'productsObjects' => $productsObjects
        ]);
    }
}
