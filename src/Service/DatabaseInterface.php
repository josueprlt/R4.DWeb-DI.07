<?php


// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;
use PDO;

class DatabaseInterface
{
    public function getAllLegos(): string
    {
    $cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=lego_store", "root", "root");
    $answer = $cnx->query("SELECT * FROM lego;");
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    return $res;
    }
}