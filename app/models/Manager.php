<?php 
namespace Project\models;
class Manager {
    // gère la connection a la base de donnée
    protected function dbConnect() {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=jeuxvascript;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
}