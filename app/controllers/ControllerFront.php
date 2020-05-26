<?php

namespace Project\controllers;

class ControllerFront {
    // fonction liens
    function home() {
        // charge mes variables et mes différentes fonctions 
        $homeFront = new \Project\models\FrontManager();
        $page = "home";
        $title = "Home";
        $description = "JeuxVascript le jeux pour les joueurs 100% javascript, profiter de 
            plusieurs jeux et d'un tas de fonctionnalité 100% gratuite";
        $accueil = $homeFront->viewFront();
        $lastArticles = $this->getLastArticleHome(); 
        $articleIndes = $this->displayArticleInde(); 
        // charge la vue home
        require 'app/views/front/home.php';
    }

    function gameFront() {
        $page = 'game';
        $title = "Games";
        $description = "Découvrez nos jeux 100% JavaScript";

        require 'app/views/front/game.php';
    }

    function newsFront() {
        $page = 'news';
        $title = "News";
        $description = "Consulter les derniers articles de la communauté JeuxVascript";

        $articles = $this->displayArticles(); 
        require 'app/views/front/news.php';
    }
    
    function aboutFront() {
        $page = 'about';
        $title = "About";
        $description = "Vous souhaitez en savoir plus surun de nos jeux ? Ou sur JeuxVascript ? Vous trouverez toutes vos réponses ici";

        require 'app/views/front/about.php';
    }

    function contactFront() {
        $page = 'contact';
        $title = "Contact";
        $description = "Vous avez quelques choses a nous dire ? N'hesitez pas,contacter nous.";

        if(!empty($_POST)){
            $contact = new \Project\controllers\ControllerFront();
            $errors = $contact->contact();
        }
        require 'app/views/front/contact.php';
    }

    function snakeFront() {
        $page = "";
        $title = "Snake";
        $description = "Jouer au célèbre jeux d'arcade snake";

        require 'app/views/front/snake.php';
    }

    function registerFront() {
        $page = "";
        $title = "Register";
        $description = "Inscrivez-vous afin de profiter de l'intégralié des fonctionnalités de JeuxVascript";


        require 'app/views/front/register.php';
    }

    function articleFront() {
        $page = "";
        $title = "Article";
        $description = "";

        $comments = $this->displayCom(); 
        $article = $this->article(); 
        $date = new \Project\controllers\ControllerFront();

        if(!empty($_POST)){
            $commentPost = new \Project\controllers\ControllerFront();
            $error = $commentPost->postCom(); 
        }

        require 'app/views/front/article.php';
    }

    function legalNotice() {
        $page = "";
        $title = "Mentions Légale";
        $description = "Mentions Légale JeuxVascript";

        require 'app/views/front/legalNotice.php';
    }

    function sitemap() {
        $page = "";
        $title = "Sitemap";
        $description = "Consulter le plan du site de JeuxVascript";


        require 'app/views/front/sitemap.php';
    }

    function pageBattleship() {
        $page = "";
        $title = "Battleship";
        $description = "Jouer aux célebre jeux de société bataille navale";

        require 'app/views/front/battleship.php';
    }

    function pagePower4() {
        $page = "";
        $title = "Puissance 4";
        $description = "Jouer aux célebre jeux de société ";

        require 'app/views/front/power4.php';
    }

    // fonction users lien temporaire

    function accountFront() {
        $page = ""; 
        $title = "Account";
        $description = "Accèder à votre compte afin de profiter de toute les fonctionnalité de JeuxVascript";
        $infos = $this->displayInfo();
        $welcome = $this->welcome();
        $usersLastArticles = $this->displayLastUsersArticle();
        $usersLastComments = $this->displayLastCom();
        $date = new \Project\controllers\ControllerFront();
        require 'app/views/front/account.php';
    }

    function userSettingsFront() {
        $page = "";
        $title = "Settings";
        $description = "Modifier vos paramètres et personnaliser votre éxperience JeuxVascript";
        

        $infos = $this->displayInfo();

        if(!empty($_POST['email']) || !empty($_POST['pseudo'])){ 
            $usersModifyInfo = new \Project\controllers\ControllerFront();
            $modifyInfos = $usersModifyInfo->modifyInfo();  
        }

        if(!empty($_POST['password']) || !empty($_POST['newPassword']) || !empty($_POST['verifyNewPassword'])){ 
            $usersModifyPassword = new \Project\controllers\ControllerFront();
            $modifyPassword = $usersModifyPassword->modifyPassword();  
        }

        require 'app/views/front/userSettings.php';
    }

    function usersWriteFront() {
        $page = "";
        $title = "Writing";
        $description = "Rédiger vos propres articles et poster les sur JeuxVascript afin que tout le monde puisse les voirs";


        if(!empty($_POST)){ 
            $postArticle = new \Project\controllers\ControllerFront();
            $errors = $postArticle->usersPostArticle();  
        }

        require 'app/views/front/usersWrite.php';
    }

    function usersModifyFront() {
        $page = "";
        $title = "Modifier";
        $description = "Modifier vos propres articles et poster les sur JeuxVascript afin que tout le monde puisse les voirs";


        $article = $this->article(); 

        if(!empty($_POST)){ 
            $modifyArticle = new \Project\controllers\ControllerFront();
            $errors = $modifyArticle->usersModifyArticle();  
        }

        require 'app/views/front/usersModify.php';
    }

    function pageDeleteArticle() {
        $this->deleteArticle(); 
        $this->accountFront();
    }

    function pageDeleteComment() {
        $this->deleteComment();
        $this->accountFront();
    }

    function pageDeleteUsers() {
        $this->deleteUsers();
        $this->home();
    }


    // erreur 404 temporaire
    function error404() {
        $page = "";
        $title = "ERROR404";
        $description = "ERREUR 404 La page que vous cherchez n'éxiste pas ou plus !";
    
        require 'app/views/front/error404.php';
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
            $loginUsers = new \Project\models\FrontManager();
            $login = $loginUsers->usersLogin($pseudo,$password);
            $_SESSION['user'] = $login['id'];
            $this->accountFront();
            unset($_POST['pseudo']);
            unset($_POST['email']);
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
            $this->accountFront();
        }else{
            $this->home();
            return $error;
        }
    }

    // déconnecte l'utilisateur
    function logoutUsers() {
        unset($_SESSION['user']);
        session_destroy();
        $this->home();
    }

    // permet a l'utilisateur de supprimer son compte
    function deleteUsers() {
        $users = new \Project\models\FrontManager();
        $usersDelete = $users->deleteUsers();
        unset($_SESSION['user']);
        session_destroy();
        return $usersDelete;
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

            if(substr($_FILES["file"]["name"],-4) !== ".jpg" && substr($_FILES["file"]["name"],-4) !== ".png" && substr($_FILES["file"]["name"],-4) !== ".gif") {
                $validation = false;
                $errors[] = "Ce type de fichier n'est pas accepter";
            }

            if($validation){         
                $image = basename($_FILES['file']['name']);
                $postArticle = new \Project\models\FrontManager();
                $articlePost = $postArticle->postArticle($title,$category_id,$content,$image);
                move_uploaded_file($_FILES['file']['tmp_name'],'app/public/images/articles/' .$image);
                // $images = 'app/public/images/articles/' .$image;
                // $finalImage = $this->resizeImage($images);
                // move_uploaded_file($_FILES['file']['tmp_name'],'app/public/images/articles/resize' .$finalImage);
                unset($_POST['title']);
                unset($_POST['content']);   
            }
            return $errors; 
        }
    }

    function resizeImage($images) {
        $image = imagecreatefrompng($images);
        $sizex = 760;
        $sizey = 300;
        $newImage = imagecrop($image, ['x' => 0, 'y' => 0, 'width' => $sizex, 'height' => $sizey]);
        if ($newImage !== FALSE) {
            // $finalImage = imagepng($newImage, 'example-cropped.png');
            // return $finalImage;
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
        $displayArticle = new \Project\models\FrontManager();
        $article = $displayArticle->getArticle();
       
        if(empty($article)) { 
            $this->error404();
        } elseif(!empty($article)) {
            return $article;     
        }
    }

    //met en forme la date
    function dateFormating($publication) {
        setlocale(LC_TIME,"fr_FR.utf-8");
        $results = strftime("%A %d %B %G", strtotime($publication));
        return $results;
    }

    // affiche les trois derniers articles sur la page home
    function getLastArticleHome() {
        $displayLastArticle = new \Project\models\FrontManager();
        $lastArticle = $displayLastArticle->getLastArticle();
        return $lastArticle;
    }

    // affiche les six derniers articles sur la page home
    function getLastArticleHome2() {
        $displayLastArticle = new \Project\models\FrontManager();
        $lastArticle = $displayLastArticle->getLastArticle2();
        return $lastArticle;
    }

    // affiche les derniers articles de la catégories indépendant
    function displayArticleInde() {
        $displayArticleInde = new \Project\models\FrontManager();
        $articleInde = $displayArticleInde->getArticleInde();
        return $articleInde;
    }

    // affiche les derniers articles rédiger par l'utilisateur sur ça page mon compte
    function displayLastUsersArticle() {
        $usersLastArticle = new \Project\models\FrontManager();
        $lastArticleUsers = $usersLastArticle->getLastUsersArticle();
        return $lastArticleUsers;
    }

    // permet de supprimer un article
    function deleteArticle() {
        $article = new \Project\models\FrontManager();
        $image = $article->deleteArticleImg();
        unlink("app/public/images/articles/".$image);
        $article = new \Project\models\FrontManager();
        $delete = $article->deleteArticle();
        return $delete;
    }

    // permet de modifier un article
    function usersModifyArticle(){
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
                $modifyArticle = new \Project\models\FrontManager();
                $articleModify = $modifyArticle->modifyArticle($title,$category_id,$content,$image);
                move_uploaded_file($_FILES['file']['tmp_name'],'app/public/images/articles/' .$image);
                    
                unset($_POST['title']);
                unset($_POST['content']);   
            }
            return $errors; 
        }
    }

    // fonction permettant de poster un commentaire
    function postCom() {
        if(isset($_SESSION['user'])) {
            extract($_POST);
            $error = '';
            if(!empty($contentComment)) {
                $commentPost = new \Project\models\FrontManager();
                $comment = $commentPost->addComment($contentComment);
            } else {
                $error .= 'Vous devez écrire du texte';
            }
            return $error;
        }
    }

    // affiche les derniers commentaires d'un article
    function displayCom() {
        $displayCom = new \Project\models\FrontManager();
        $comments = $displayCom->getComment();
        return $comments;
    }
    
    // affiche les dernier com d'un utilisateur sur sa page mon compte
    function displayLastCom() {
        $displayLastCom = new \Project\models\FrontManager();
        $lastUsersCom = $displayLastCom->getLastUsersComment();
        return $lastUsersCom;
    }

    // permet a l'utilisteur de supprimer un commentaire qu'il a poster
    function deleteComment() {
        $comment = new \Project\models\FrontManager();
        $comment = $comment->deleteCom();
        return $comment;
    }

    // permet de modifier un article
    function modifyInfo(){
        if(isset($_SESSION['user'])) {
            extract($_POST);
            $validation = true;
            $errors = [];
        
            if(empty($pseudo) || empty($email)){
                $validation = false;
                $errors[] = 'Tous les champs sont obligatoires !';
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
                $modifyInfo = new \Project\models\FrontManager();
                $infoModify = $modifyInfo->usersModifyInfo($pseudo,$email);
                // require 'app/views/front/account.php';
                $this->accountFront();
                unset($_POST['email']);
                unset($_POST['pseudo']);   
            }
            return $errors; 
        }
    }

    // permet de modifier le mot de passe
    function modifyPassword() {
        if(isset($_SESSION['user'])) {
            extract($_POST);
            $validation = true;
            $errors = [];
        
            if(empty($password) || empty($newPassword) || empty($verifyNewPassword)){
                $validation = false;
                $errors[] = 'Tous les champs sont obligatoires !!!'; 
            }

            if($verifyNewPassword != $newPassword){
                $validation = false;
                $errors[] = 'le mot de passe de confirmation est incorrect !!!';
            }

            if($validation){
                $modifyPassword = new \Project\models\FrontManager();
                $passwordModify = $modifyPassword->usersModifyPassword($newPassword);
                $this->accountFront();
            }
            return $errors;
        }    
    }
} 