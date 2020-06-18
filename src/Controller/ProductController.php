<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * liste des produits
     * @Route("/product", name="product_list")
     */
    public function list(ProductRepository $repository)
    {

        return $this->render('product/list.html.twig',[
            'product_list' =>$repository->findAll()
        ]);
    }

    /**
     * Ajout d'un produit
     * @Route("/product/new", name="product_add")
     */
    public function add()
    {
        return $this->render('product/add.html.twig');
    }

    /**
     * Modification d'un produit
     * @Route("/product/{id}/edit", name="product_edit")
     */
    public function edit($id)
    {
        return $this->render('product/edit.html.twig');
    }

}
