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

    function loginAdmin() {
        extract($_POST);
        $error = 'Les identifiants ne corespondent pas à nos enregistrements !';

        $loginAdmin = new \Project\models\BackManager();
        $login = $loginAdmin->adminLogin($pseudo,$password);

        // if(password_verify($password, $login['password'])) {
        //     $_SESSION['admin'] = $login['id'];
        //     require 'app/views/back/admin.php';
        // } else {
        //     return $error;
        // }

        if($password && $pseudo) {
            $_SESSION['admin'] = $login['id'];
            $this->adminBack();
        } else {
            return $error;
        }
    }

    function displayInfo() {
        $adminInfos = new \Project\models\BackManager();
        $infos = $adminInfos->adminInfo();
        return $infos;
    }

} 