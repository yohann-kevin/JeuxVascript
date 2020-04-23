<?php

// Démarre la session
session_start();

//autoload.php généré avec composer
require_once __DIR__ . '/vendor/autoload.php';

try{
    $controllerBack = new \Project\controllers\ControllerBack();//objet controller

    if(isset($_GET['action'])) {

        if($_GET['action'] == 'admin') {
            $controllerBack -> adminBack();
        }  elseif ($_GET['action'] == 'adminLogin') {
            $controllerBack -> loginAdmin();
        } elseif ($_GET['action'] == 'read') {
            $controllerBack -> articleAdmin();
        } elseif ($_GET['action'] == 'settings') {
            $controllerBack -> pageSettings();
        } elseif ($_GET['action'] == 'deleteArticle') {
            $controllerBack -> pageDeleteArticle();
        } elseif ($_GET['action'] == 'deleteComment') {
            $controllerBack -> pageDeleteComment();
        } elseif ($_GET['action'] == 'registerAdmin') {
            $controllerBack -> registerAdmin();
        } elseif ($_GET['action'] == 'disconnect') {
            $controllerBack -> logout();
        } elseif ($_GET['action'] == 'deleteAdmin') {
            $controllerBack -> pageDeleteAdmin();
        } 

    } else {
        $controllerBack -> login();
    }

} catch (Exception $e) {

}