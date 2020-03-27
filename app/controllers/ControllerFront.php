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




    function registerUsers() {
        // $register = new \Project\models\Users();
        // $usersRegister = $register->usersRegister();
        global $bdd;

        extract($_POST);

        $validation = true;
    
        $errors = [];
        
        if(empty($pseudo) || empty($email) || empty($password) ){
            $validation = false;
            $errors[] = 'Tous les champs sont obligatoires !!!'; 
        }
    
        // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $validation = false;
        //     $errors[] = 'Adresse Email non valide !!!';
        // }
        
        // if($emailconf != $email){
        //     $validation = false;
        //     $errors[] = 'adresse email de confirmation est incorrecte !!!';
        // }
    
        // if($passwordconf != $password){
        //     $validation = false;
        //     $errors[] = 'le mot de passe de confirmation est incorrect !!!';
        // }
    
        // if(pseudoCheck($pseudo)){
        //     $validation = false;
        //     $errors[] = 'Ce pseudo est déjà pris !';
        // }
    
        if($validation){
            
        // $register = new \Project\models\Users();
        // $usersRegister = $register->usersRegister();
        
        $register = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
        $register->execute([
            'pseudo' => htmlentities($pseudo),
            'email' => htmlentities($email),
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        unset($_POST['pseudo']);
        unset($_POST['email']);
        // unset($_POST['emailconf']);
        accountFront();
        }
    
        return $errors;
    }

} 