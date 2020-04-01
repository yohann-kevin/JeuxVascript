<?php

//imoortant pour la sécurité de nos scripts : les sessions
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
        } elseif ($_GET['action'] == 'news') {
            $controllerFront -> newsFront();
        } elseif ($_GET['action'] == 'snake') {
            $controllerFront -> snakeFront();
        } elseif ($_GET['action'] == 'register') {
            $controllerFront -> registerFront();
        } elseif ($_GET['action'] == 'article') {
            $controllerFront -> articleFront();
        } elseif ($_GET['action'] == 'spaceInvaders') {
            $controllerFront -> spaceInvadersFront();
        } 
        
        elseif ($_GET['action'] == 'registerUsers') {
            $controllerFront -> registerUsers();
        } elseif ($_GET['action'] == 'login') {
            $controllerFront -> loginUsers();
        } elseif ($_GET['action'] == 'disconnect') {
            $controllerFront -> logoutUsers();
        }
        
        
        

        // users (temporaire)
        elseif ($_GET['action'] == 'account') {
            $controllerFront -> accountFront();
        } elseif ($_GET['action'] == 'usersArticle') {
            $controllerFront -> usersArticleFront();
        } elseif ($_GET['action'] == 'userSettings') {
            $controllerFront -> userSettingsFront();
        } elseif ($_GET['action'] == 'stats') {
            $controllerFront -> statsFront();
        } elseif ($_GET['action'] == 'usersWrite') {
            $controllerFront -> usersWriteFront();
        }

    } else {
        $controllerFront -> home();
    }

} catch (Exception $e) {

}