<?php


// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;
use PDO;
use App\Entity\lego;

class DatabaseInterface
{
    
    public function getAllLegos(): array
    {
        $legos = [];
        $cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=lego_store", "root", "root");
        $answer = $cnx->query("SELECT * FROM lego;");
        $res = $answer->fetchAll(PDO::FETCH_OBJ);
        
        foreach ($res as $leg) {
            
            $lego = new lego($leg->id, $leg->name, $leg->collection);
            $lego->setPrice($leg->price);
            $lego->setPieces($leg->pieces);
            $lego->setDescription($leg->description);
            $lego->setBoxImage($leg->imagebox);
            $lego->setLegoImage($leg->imagebg);
            array_push($legos, $lego);
        }
        
        return $legos;
    }


    public function getCollections(): array
    {
        $cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=lego_store", "root", "root");
        $answer = $cnx->query("SELECT DISTINCT collection FROM lego;");
        $res = $answer->fetchAll(PDO::FETCH_OBJ);
        $menu = array_column($res, 'collection');

        $url = [];
        foreach ($menu as $me) {
            $col = strtolower($me);
            $col = str_replace(' ', '_', $col);
            array_push($url, [
                "name" => $me,
                "url" => $col
            ]);
        }
        return $url;
    }


    public function getOneCollection(string $coll): array
    {
        $re = [];

        $sql = 'SELECT * FROM lego WHERE collection = :collection';
        $sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['collection' => $coll]);
        $red = $sth->fetchAll();

        dump($red);
        foreach ($red as $leg) {
            
            $lego = new lego($leg->id, $leg->name, $leg->collection);
            $lego->setPrice($leg->price);
            $lego->setPieces($leg->pieces);
            $lego->setDescription($leg->description);
            $lego->setBoxImage($leg->imagebox);
            $lego->setLegoImage($leg->imagebg);
            array_push($re, $lego);
        }
        
        return $re;
    }
}