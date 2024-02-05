<?php


/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use stdClass;
use App\Entity\lego as lego;



/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    private $legos = [];
    // L’attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode home pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.
    
    public function __construct() {
        $chaine = file_get_contents("../src/data.json");
        $legosAll = json_decode($chaine);
        

        foreach ($legosAll as $leg) {
            
            $lego = new lego($leg->id, $leg->name, $leg->collection);
            $lego->setPrice($leg->price);
            $lego->setPieces($leg->pieces);
            $lego->setDescription($leg->description);
            $lego->setBoxImage($leg->images->box);
            $lego->setLegoImage($leg->images->bg);
            array_push($this->legos, $lego);
        }
    /* dump($this->legos); */
    }

    


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

    /* #[Route('/', )]
    public function home() {
        return $this->render('lego.html.twig', [

            'legos' => $this->legos
        ]);
    } */

    
    #[Route('/{collection}', 'filter_by_collection', requirements: ['collection' => '(all|creator|star_wars|creator_expert)'])]
    
    public function filter($collection): Response
    {
        return $this->render('lego.html.twig', [

            'legos' => $this->legos
        ]);
    }

}