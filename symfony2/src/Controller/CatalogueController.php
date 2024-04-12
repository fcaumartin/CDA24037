<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(CategorieRepository $repo): Response
    {
        $liste = $repo->findBy([ 'parent' => null ]);

        // dd($liste);

        return $this->render('catalogue/index.html.twig', [
            'liste' => $liste,
        ]);
    }

    #[Route('/categorie/{categorie}', name: 'app_categorie')]
    public function categorie(Categorie $categorie, Request $request): Response
    {
        dump ($request->query);
        dump ($request->request);

        // dd($categorie);


        return $this->render('catalogue/categorie.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/produits/{categorie}', name: 'app_produits')]
    public function produits(Categorie $categorie): Response
    {

        return $this->render('catalogue/produits.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/details/{produit}', name: 'app_details')]
    public function details(Produit $produit): Response
    {

        return $this->render('catalogue/details.html.twig', [
            'produit' => $produit
        ]);
    }
}
