<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * URL: localhost/route
     * URI: /route
     * @Route("/", name="home")
     */
    public function index()
    {
        #templates/         home.html.twig
        return $this->render('home.html.twig',[
            'pseudo' => 'John Doe',
            'liste' => [
                'foo',
                'bar',
                'baz',
            ]
        ]);

    }


    /**
     * on place les paramètres dynamiques entre accolades
     * URI valide : /test/42 par exemple
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $em)
    {
        // Création d'une entité
        $product = new Product();

        $product
            ->setName('Jeans')
            ->setDescription('Un super jean ! ')
            ->setPrice(79.99)
            ->setQuantity(50)
            ;
        // l'entité pas encore enregistrée en bas
        dump($product);

        // Enregistrement (insertion)
        // 1. prépare à l'enregistrement d'une entité
        $em->persist($product);
        // 2. Exécuter les requetes SQL
        $em->flush();

        // fonction de debug: dump() & die
        dd($product);
    }
}




