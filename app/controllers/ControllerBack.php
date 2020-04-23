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

    function pageSettings() {

        require 'app/views/back/settings.php';
    }

    function articleAdmin() {

        require 'app/views/back/articleAdmin.php';
    }

    function error404() {
        
        require 'app/views/back/error404.php';
    }

    function pageDeleteArticle() {

        require 'app/views/back/deleteArticle.php';
    }

    function pageDeleteComment() {

        require 'app/views/back/deleteComment.php';
    }

    function loginAdmin() {
        extract($_POST);
        $error = 'Les identifiants ne corespondent pas à nos enregistrements !';

        $loginAdmin = new \Project\models\BackManager();
        $login = $loginAdmin->adminLogin($pseudo,$password);

        if(password_verify($password, $login['password'])) {
            $_SESSION['admin'] = $login['id'];
            $this->adminBack();
        } else {
            return $error;
        }

        if($password && $pseudo) {
            $_SESSION['admin'] = $login['id'];
        } else {
            return $error;
        }
    }

    function displayInfo() {
        $adminInfos = new \Project\models\BackManager();
        $infos = $adminInfos->adminInfo();
        return $infos;
    }

    function displayCom() {
        $displayCom = new \Project\models\BackManager();
        $comments = $displayCom->getComment();
        return $comments;
    }

    function article() {
        $displayArticle = new \Project\models\BackManager();
        $article = $displayArticle->getArticle();
        if(empty($article)) { 
            require 'app/views/back/error404.php';
        } elseif(!empty($article)) {
            return $article;     
        }
    }

    function deleteArticle() {
        $article = new \Project\models\BackManager();
        $image = $article->deleteArticleImg();
        unlink("app/public/images/articles/".$image);
        $article = new \Project\models\BackManager();
        $delete = $article->deleteArticle();
        return $delete;
    }

    // permet a l'admin de supprimer un commentaire qu'il a poster
    function deleteComment() {
        $comment = new \Project\models\BackManager();
        $comment = $comment->deleteCom();
        return $comment;
    }

    function registerAdmin() {
        extract($_POST);
        $validation = true;
        $errors = [];

        if(empty($pseudo) || empty($email) || empty($password) ){
            $validation = false;
            $errors[] = 'Tous les champs sont obligatoires !!!'; 
        }

        if($verifyPassword != $password){
            $validation = false;
            $errors[] = 'le mot de passe de confirmation est incorrect !!!';
        }

        if($validation){
            $register = new \Project\models\BackManager();
            $usersRegister = $register->adminRegister($email,$pseudo,$password);
            $this->login();
            unset($_POST['pseudo']);
            unset($_POST['email']);
        }
    }

    // déconnecte l'administrateur
    function logout() {
        unset($_SESSION['admin']);
        session_destroy();
        $this->login();
    }

} 