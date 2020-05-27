<?php 

namespace Project\controllers;

class ControllerBack {
    // fonction liens
    function login() {
        // charge mes variables et mes différentes fonctions
        $loginBack = new \Project\models\BackManager();
        $login = $loginBack->viewBack();
        // charge la vue login
        require 'app/views/back/login.php';
    }

    function adminBack() {

        $infos = $this->displayInfo();

        $welcomes = new \Project\controllers\ControllerFront();
        $welcome = $welcomes->welcome();

        $displayLastArticle = new \Project\controllers\ControllerFront();
        $lastArticles = $displayLastArticle->getLastArticleHome2(); 
        
        $comments = $this->displayCom();

        $date = new \Project\controllers\ControllerFront();

        require 'app/views/back/admin.php';
    }

    function pageSettings() {

        $infos = $this->displayInfo();
        require 'app/views/back/settings.php';
    }

    function articleAdmin() {

        $article = $this->article();
        $date = new \Project\controllers\ControllerFront();
        require 'app/views/back/articleAdmin.php';
    }

    function error404() {
        
        require 'app/views/back/error404.php';
    }

    function pageDeleteArticle() {
        $this->deleteArticle();
        $this->adminBack();
    }

    function pageDeleteComment() {
        $this->deleteComment();
        $this->adminBack();
    }

    function pageDeleteAdmin() {
        $this->deleteAdmin();
        $this->adminBack();
    }

    // permet a l'admin de se connecter
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

    // affiche les info de l'admin
    function displayInfo() {
        $adminInfos = new \Project\models\BackManager();
        $infos = $adminInfos->adminInfo();
        return $infos;
    }

    // affiche les commentaires
    function displayCom() {
        $displayCom = new \Project\models\BackManager();
        $comments = $displayCom->getComment();
        return $comments;
    }

    // affiche les articles
    function article() {
        $displayArticle = new \Project\models\BackManager();
        $article = $displayArticle->getArticle();
        if(empty($article)) { 
            require 'app/views/back/error404.php';
        } elseif(!empty($article)) {
            return $article;     
        }
    }

    // permet a l'admin de supprimer un article
    function deleteArticle() {
        $article = new \Project\models\BackManager();
        $image = $article->deleteArticleImg();
        unlink("app/public/images/articles/".$image);
        $article = new \Project\models\BackManager();
        $delete = $article->deleteArticle();
        return $delete;
    }

    // permet a l'admin de supprimer un commentaire 
    function deleteComment() {
        $comment = new \Project\models\BackManager();
        $comment = $comment->deleteCom();
        return $comment;
    }

    // permet d'enregistrer un nouvel admin
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

    // permet a l'admin de supprimer son compte
    function deleteAdmin() {
        $admin = new \Project\models\BackManager();
        $adminDelete = $admin->deleteAdmin();
        unset($_SESSION['admin']);
        session_destroy();
        return $adminDelete;
    }

} 