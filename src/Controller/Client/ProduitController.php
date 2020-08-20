<?php

namespace App\Controller\Client;

use App\Entity\Contact;
use App\Entity\Produit;
use App\Form\ContactType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    const limit = 20;
    /**
     * @Route("/client/produit", name="client_produit")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $donne=$this->getDoctrine()->getRepository(Produit::class)->findAll();

        $produits = $paginator->paginate(
            $donne,
            $request->query->getInt('page',1),
            self::limit
        );

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


    /**
     * @Route "/client/produit/search/{titre}, name="client_produit_search",requirements={"titre"="[a-zA-Z]+}
     */
    public function searchByName(Request $request, PaginatorInterface $paginator)
    {
        $donne = $this->getDoctrine()->getRepository(Produit::class)->findAllByName("titre");
        $donne += $this ->getDoctrine()->getRepository(Produit::class)->findAllByDescription("titre");

        $produits = $paginator->paginate(
            $donne,
            $request->query->getInt('page',1),
            self::limit
        );

        return $this->render('client/produit/index.html.twig', [
            'produits'=>$produits,
        ]);
    }

    /**
     * @Route("/client/produit/show/{slug}/contact", name="client_produit_contact",requirements={"slug"="[a-zA-Z0-9\-]+"}))
     */
    public function contact(Produit $produit,Request $request)
    {
        $form=$this->createForm(ContactType::class,new Contact());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

        }

        return $this->render('admin/produit/edit.html.twig', [
            'produit' => $produit,
            'form'=>$form->createView()
        ]);
    }


}
