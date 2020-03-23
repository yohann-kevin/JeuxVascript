<?php 

namespace Project\controllers;

class ControllerBack {
    function login() {

        $loginBack = new \Project\models\BackManager();
        $login = $loginBack->viewBack();

        require 'app/views/back/login.php';
    }

    function adminBack() {

        require 'app/views/back/admin.php';
    }

    function modifyBack() {

        require 'app/views/back/adminModify.php';
    }

    function writeBack() {

        require 'app/views/back/adminWrite.php';
    }

} 