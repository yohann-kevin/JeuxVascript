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

    //affiche un message de bienvenue en fonction de l'heure
    function welcome() {
        date_default_timezone_set('Europe/Paris');
        $time = date('H');
        $welcome = '';
        if($time >= 6 && $time <= 18) {
            $welcome = 'Bonjour';
        } elseif($time >= 18 && $time <= 21) {
            $welcome =  'Bonsoir';
        } else {
            $welcome = 'On geek tard le soir ? ';
        } 
        return $welcome;
    }

    //permet d'envoyer un mail a l'admin
    function contact() {
        extract($_POST);
        $validation = true;
        $errors = [];
    
        if (empty($name) || empty($email) || empty($content)) {
            $validation = false;
            $errors[] = "tous les champs sont obligatoires !!";
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $errors[] = "Cet email n'est pas valide !!";
        }
    
        if ($validation) {
            $to = 'yo44prg@icloud.com';
            $object = 'Nouveau message de : ' .$name;
            $message = '<h1>Nouveau message de '.$name .'</h1>
                        <h2>Adresse Email: ' .$email .'</h2>
                        <p>' .nl2br($content) . '</p>';
            $headers = 'FROM' .$name .' <' .$email .'> '."\r\n";
            $headers .= 'MIME-Version 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
            mail($to, $object, $message, $headers);
        }
        return $errors;
    }

    // affiche les info d'une catégories
    // function displayCategory() {
    //     $displayCategory = new \Project\models\FrontManager();
    //     $categorys = $displayCategory->category();
    //     return $categorys;
    // }

    // permet a l'utilisateur de poster un articles
    function usersPostArticle(){
        if(isset($_SESSION['user'])) {
            extract($_POST);
            $validation = true;
            $errors = [];
        
            if(empty($title) || empty($category_id) || empty($content)){
                $validation = false;
                $errors[] = 'Tous les champs sont obligatoires !';
            }
        
            if(empty($_FILES["file"]) || $_FILES['file']['error'] > 0){
                $validation = false;
                $errors[] = "L'image est obligatoire !";
            }

            if($validation){
                $image = basename($_FILES['file']['name']);
                $postArticle = new \Project\models\FrontManager();
                $articlePost = $postArticle->postArticle($title,$category_id,$content,$image);
                move_uploaded_file($_FILES['file']['tmp_name'],'app/public/images/articles/' .$image);
                    
                unset($_POST['title']);
                unset($_POST['content']);   
            }
            return $errors; 
        }
    }

    // permet d'afficher tout les articles
    function displayArticles() {
        $displayArticles = new \Project\models\FrontManager();
        $articles = $displayArticles->getArticles();
        return $articles;
    }

    //permet d'afficher un seul article
    function article() {
        // if(empty($article)) {
        //     header("HTTP/1.0 404 Not Found");
        //     exit( 0 );
        // } else {
            $displayArticle = new \Project\models\FrontManager();
            $article = $displayArticle->getArticle();
            return $article;
        // }
    }

    //met en forme la date
    function dateFormating($publication) {
        setlocale(LC_TIME,"fr_FR.utf-8");
        $results = strftime("%A %d %B %G", strtotime($publication));

        return $results;
    }
    

} 