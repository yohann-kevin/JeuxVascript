<?php 

namespace Project\controllers;

class ControllerFront {
    // fonction liens
    function home() {

        $homeFront = new \Project\models\FrontManager();
        $accueil = $homeFront->viewFront();

        require 'app/views/front/home.php';
    }

    function gameFront() {

        require 'app/views/front/game.php';
    }

    function newsFront() {

        require 'app/views/front/news.php';
    }
    
    function aboutFront() {

        require 'app/views/front/about.php';
    }

    function contactFront() {

        require 'app/views/front/contact.php';
    }

    function snakeFront() {

        require 'app/views/front/snake.php';
    }

    function registerFront() {

        require 'app/views/front/register.php';
    }

    function articleFront() {

        require 'app/views/front/article.php';
    }

    function spaceInvadersFront() {

        require 'app/views/front/spaceInvaders.php';
    }

    // fonction users lien temporaire

    function accountFront() {

        require 'app/views/front/account.php';
    }

    function usersArticleFront() {

        require 'app/views/front/usersArticle.php';
    }

    function userSettingsFront() {

        require 'app/views/front/userSettings.php';
    }

    function statsFront() {

        require 'app/views/front/stats.php';
    }

    function usersWriteFront() {

        require 'app/views/front/usersWrite.php';
    }

    

    // permet a l'utilisateur de se connecter
    function registerUsers() {

        extract($_POST);

        $validation = true;
    
        $errors = [];
        
        if(empty($pseudo) || empty($email) || empty($password) ){
            $validation = false;
            $errors[] = 'Tous les champs sont obligatoires !!!'; 
        }
    
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validation = false;
            $errors[] = 'Adresse Email non valide !!!';
        }
    
        if($verifyPassword != $password){
            $validation = false;
            $errors[] = 'le mot de passe de confirmation est incorrect !!!';
        }

        if($pseudo) {
            $testPseudo = new \Project\models\FrontManager();
            $usersPseudo = $testPseudo->pseudoCheck($pseudo);
            if($usersPseudo) {
                 $validation = false;
                $errors[] = 'Ce pseudo est déjà pris !';
            }
        }
    
        if($validation){
        $register = new \Project\models\FrontManager();
        $usersRegister = $register->usersRegister($pseudo,$email,$password);

        unset($_POST['pseudo']);
        unset($_POST['email']);
        require 'app/views/front/account.php';
        }
    
        return $errors;
    }

    // permet a l'utilisateur de se connecter
    function loginUsers() {
        extract($_POST);
        $error = 'Les identifiants ne correspondent pas à nos enregistrements !';

        $loginUsers = new \Project\models\FrontManager();
        $login = $loginUsers->usersLogin($pseudo,$password);

        if(password_verify($password, $login['password'])){
            $_SESSION['user'] = $login['id'];
            require 'app/views/front/account.php';
        }else{
            return $error;
        }
    }

    // déconnecte l'utilisateur
    function logoutUsers() {
        unset($_SESSION['user']);
        session_destroy();
        require 'app/views/front/home.php';
    }

    // affiche les info de l'utilisateur
    function displayInfo() {
        $usersInfo = new \Project\models\FrontManager();
        $infos = $usersInfo->usersInfo();
        return $infos;
    }

    

} 