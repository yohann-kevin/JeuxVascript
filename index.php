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
        } elseif ($_GET['action'] == 'registerUsers') {
            $controllerFront -> registerUsers();
        } elseif ($_GET['action'] == 'login') {
            $controllerFront -> loginUsers();
        } elseif ($_GET['action'] == 'disconnect') {
            $controllerFront -> logoutUsers();
        } elseif ($_GET['action'] == 'legalNotice') {
            $controllerFront -> legalNotice();
        } elseif ($_GET['action'] == 'sitemap') {
            $controllerFront -> sitemap();
        } elseif ($_GET['action'] == 'deleteArticle') {
            $controllerFront -> pageDeleteArticle();
        } elseif ($_GET['action'] == 'deleteComment') {
            $controllerFront -> pageDeleteComment();
        } elseif ($_GET['action'] == 'modifyInfo') {
            $controllerFront -> modifyInfo();
        } elseif ($_GET['action'] == 'modifyPassword') {
            $controllerFront -> modifyPassword();
        } elseif ($_GET['action'] == 'deleteUsers') {
            $controllerFront -> pageDeleteUsers();
        } elseif ($_GET['action'] == 'battleship') {
            $controllerFront -> pageBattleship();
        } elseif ($_GET['action'] == 'power4') {
            $controllerFront -> pagePower4();
        } elseif ($_GET['action'] == 'labyrinth') {
            $controllerFront -> pageLabyrinth();
        }
        
        
        

        // users (temporaire)
        elseif ($_GET['action'] == 'account') {
            $controllerFront -> accountFront();
        } elseif ($_GET['action'] == 'userSettings') {
            $controllerFront -> userSettingsFront();
        } elseif ($_GET['action'] == 'stats') {
            $controllerFront -> statsFront();
        } elseif ($_GET['action'] == 'usersWrite') {
            $controllerFront -> usersWriteFront();
        } elseif ($_GET['action'] == 'usersModify') {
            $controllerFront -> usersModifyFront();
        }

        //erreur 404 temporaire
        elseif($_GET['action'] == 'error404') {
            $controllerFront -> error404();
        }

    } else {
        $controllerFront -> home();
    }

} catch (Exception $e) {

}