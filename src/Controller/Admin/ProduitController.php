<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    /**
     * @Route("/admin/produit", name="admin_produit")
     */
    public function index()
    {
        $produitRepo=$this->getDoctrine()->getRepository(Produit::class);
        $produits = $produitRepo->findAll();

        return $this->render('admin/produit/index.html.twig', [
            'produits'=>$produits
        ]);
    }

    /**
     * @param $id
     * @Route("/admin/produit/show/{slug}", name="admin_produit_show", requirements={"slug"="[a-zA-Z0-9\-]+"})
     */
    public function show(Produit $produit)
    {
        return $this->render('admin/produit/show.html.twig', [
            'produit' => $produit
        ]);
    }

    /**
     * @Route("/admin/produit/add", name="admin_produit_add")
     */
    public function Add()
    {
        $produit = new Produit();
        $produit->setTitre('TV 186 cm')
            ->setDescription('NA')
            ->setPoids(18)
            ->setPrixTTC(120)
            ->setCouleur(2)
            ->setStockQte(4);

        //Enregistrement bdd
        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();

        return $this->redirectToRoute("admin_produit");

    }
}
