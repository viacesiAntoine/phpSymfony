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
        $produit1=$produitRepo->find(1);
        dump($produit1);
        $produit2=$produitRepo->findBy(['prixTTC'=>120]);
        dump($produit2);

        $produit3 = $produitRepo->actif(false);
        dump($produit3);

        return $this->render('admin/produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produit' => $produit1
        ]);
    }

    /**
     * @param $id
     * @Route("/admin/produit/show/{id}", name="admin_produit_show", requirements={"id"="\d+"})
     */
    public function show($id)
    {
        $produitRepo=$this->getDoctrine()->getRepository(Produit::class);
        $produit1=$produitRepo->find($id);
        dump($produit1);

        return $this->render('admin/produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produit' => $produit1
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
