<?php

//imoortant pour la ssécurité de nos scripts : les sessions
// Démarre la session
session_start();

//autoload.php généré avec composer
require_once __DIR__ . '/vendor/autoload.php';

try{
    $controllerFront = new \Project\controllers\ControllerFront();//objet controller

    if(isset($_GET['action'])) {

        if($_GET['action'] == 'contact') {
            $controllerFront -> contactFront();
        } elseif ($_GET['action'] == 'about') {
             $controllerFront -> aboutFront();
        }elseif ($_GET['action'] == 'home') {
            $controllerFront -> home();
        } elseif ($_GET['action'] == 'game') {
            $controllerFront -> gameFront();
        } elseif ($_GET['action'] == 'blog') {
            $controllerFront -> blogFront();
        }

    } else {
        $controllerFront -> home();
    }

} catch (Exception $e) {

}