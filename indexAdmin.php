<?php

//imoortant pour la sécurité de nos scripts : les sessions
// Démarre la session
session_start();

//autoload.php généré avec composer
require_once __DIR__ . '/vendor/autoload.php';

try{
    $controllerBack = new \Project\controllers\ControllerBack();//objet controller

    if(isset($_GET['action'])) {

        if($_GET['action'] == 'admin') {
            $controllerBack -> adminBack();
        } elseif ($_GET['action'] == 'write') {
             $controllerBack -> writeBack();
        } elseif ($_GET['action'] == 'modify') {
            $controllerBack -> modifyBack();
        } elseif ($_GET['action'] == 'adminLogin') {
            $controllerBack -> loginAdmin();
        } elseif ($_GET['action'] == 'read') {
            $controllerBack -> articleAdmin();
        } elseif ($_GET['action'] == 'deleteArticle') {
            $controllerBack -> pageDeleteArticle();
        } elseif ($_GET['action'] == 'deleteComment') {
            $controllerBack -> pageDeleteComment();
        } 

    } else {
        $controllerBack -> login();
    }

} catch (Exception $e) {

}