<?php 
namespace Project\models;
class Manager {
    protected function dbConnect() {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=jeuxvascript;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
}