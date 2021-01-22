<?php
/**
 * Hello World controller.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProductRepository;

/**
 * Class HelloWorldController.
 */
class HelloWorldController extends AbstractController
{
    /**
     * Index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="hello-world_index",
     * )
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
}
