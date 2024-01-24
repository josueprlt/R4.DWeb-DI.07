<?php


/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
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

    #[Route('/', )]
public function home()
    {
    $cocci = new stdClass();

    $cocci->collection = "Creator Expert";
    $cocci->id = 10252;
    $cocci->name = "La coccinelle Volkwagen";
    $cocci->description = "Construis une réplique LEGO® Creator Expert de l'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.";
    $cocci->price = 94.99;
    $cocci->pieces = 1167;
    $cocci->boxImage = "LEGO_10252_Box.png";
    $cocci->legoImage = "LEGO_10252_Main.jpg";

    return $this->render('lego.html.twig', ['lego' => $cocci]);
    }
}