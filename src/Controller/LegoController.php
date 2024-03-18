<?php


/* indique où "vit" ce fichier */

namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use stdClass;
use App\Entity\Lego as Lego;
use App\Entity\LegoCollection;
use App\Repository\LegoRepository;
use App\Repository\LegoCollectionRepository;
use App\Service\CreditsGenerator;
use App\Service\DatabaseInterface;



/* le nom de la classe doit être cohérent avec le nom du fichier */

class LegoController extends AbstractController
{
    private $legos = [];
    private $databaseInterface;
    // L’attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode home pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.



    /* #[Route('/', )]
public function home()
   {
       $rep = new Response("Get lost.");

       return $rep;
   }
} */

    /* #[Route('/', )]
public function home()
    {
    $rep = new Response('
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Welcome!</title>
        </head>
        <body>
    
            <h1>Get Lost.</h1>

    
        </body>
    </html>
    ');

    return $rep;
    } */


    /* #[Route('/', )]
public function home()
    {
    $name = "Josué";
    $msg = "Get Lost.";

    return $this->render('test.html.twig', [

        'name' => $name,
        'msg' => $msg,
    ]);
    } */

    /* public function home() {
        return $this->render('lego.html.twig', [
            
            'legos' => $this->legos
        ]);
    } */
    #[Route('/',)]
    public function legobd(LegoRepository $legobd): Response
    {
        /* dump($legobd->findAll()); */

        return $this->render('lego.html.twig', [

            'legos' => $legobd->findAll()
        ]);
    }


    /* #[Route('/{collection}', 'filter_by_collection', requirements: ['collection' => '(all|creator|star_wars|creator_expert)'])]
    
    public function filter($collection): Response
    {
        return $this->render('lego.html.twig', [

            'legos' => $this->legos
        ]);
    }

} */

    /* #[Route('/{collection}', 'filter_by_collection', requirements: ['collection' => '(creator|star_wars|creator_expert|harry_potter)'])]
    public function filter($collection, LegoRepository $legobd): Response
    {
        $col = str_replace('_', ' ', $collection);
        $col = ucwords($col);

        $legosFilter = $legobd->findBy(
            ['collection->id' => $col]
        );

        return $this->render('lego.html.twig', [

            'legos' => $legosFilter
        ]);
    } */

    /* #[Route('/test/{id}', 'test')]
    public function test(int $id, LegoCollectionRepository $legoCollectionRepository): Response
    {
        $collection = $legoCollectionRepository->find($id);
        dd($collection);
    } */


    /* #[Route('/collection/{id}', 'collection')]
    public function coll(LegoCollection $collection): Response
    {
        dd($collection->getLegos());
    } */

    #[Route('/{name}', 'filter_by_name', requirements: ['name' => 'Creator|Star Wars|Creator Expert|Harry Potter'])]
    public function filter(LegoCollection $legoCollection, LegoCollectionRepository $legCollRepo): Response
    {

        // dd($this->legoRepository->findByCollection($name));
        return $this->render("lego.html.twig", [
            'legos' => $legoCollection->getLegos(),
            'collection' => $legCollRepo->findAll(),
        ]);
    }


    #[Route('/credits', 'credits')]
    public function credits(CreditsGenerator $credits): Response
    {
        return new Response($credits->getCredits());
    }




    /* #[Route('/test', 'test')]
    public function test(): Response
    {
        $l = new Lego(1234);
        $l->setId(1);
        $l->setName("un beau Lego");
        $l->setCollection("Lego espace");
        $l->setPieces(15000);
        $l->setPrice(50);
        $l->setDescription("c'est good lego. test");
        $l->setLegoImage("test");
        $l->setBoxImage("test");
        dd($l);
    } */
}
