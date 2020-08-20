<?php

namespace App\Controller\Client;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/client/produit", name="client_produit")
     */
    public function index()
    {

        $produitRepo=$this->getDoctrine()->getRepository(Produit::class);
        $produits = $produitRepo->findAll();

        return $this->render('client/produit/index.html.twig', [
            'produits'=>$produits,
        ]);
    }
    /**
     * @Route("/client/produit/show/{slug}", name="client_produit_show",requirements={"slug"="[a-zA-Z0-9\-]+"}))
     */
    public function show(Produit $produit)
    {
        return $this->render('client/produit/show.html.twig', [
            'produit' => $produit
        ]);
    }
}
