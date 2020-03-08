<?php 

namespace Project\controllers;

class ControllerFront {
    function home() {

        $homeFront = new \Project\models\FrontManager();
        $accueil = $homeFront->viewFront();

        require 'app/views/home.php';
    }

    function contactFront() {

        require 'app/views/contact.php';
    }

    function aboutFront() {

        require 'app/views/about.php';
    }
} 