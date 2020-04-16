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

    function legalNotice() {

        require 'app/views/front/legalNotice.php';
    }

    function sitemap() {

        require 'app/views/front/sitemap.php';
    }

    function pageBattleship() {

        require 'app/views/front/battleship.php';
    }

    function pagePower4() {

        require 'app/views/front/power4.php';
    }

    function pageLabyrinth() {

        require 'app/views/front/labyrinth.php';
    }

    // fonction users lien temporaire

    function accountFront() {

        require 'app/views/front/account.php';
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

    function usersModifyFront() {

        require 'app/views/front/usersModify.php';
    }

    function pageDeleteArticle() {

        require 'app/views/front/deleteArticle.php';
    }

    function pageDeleteComment() {

        require 'app/views/front/deleteComment.php';
    }

    function pageDeleteUsers() {

        require 'app/views/front/deleteUsers.php';
    }


    // erreur 404 temporaire
    function error404() {

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
        require 'app/views/front/account.php';
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
        $displayArticle = new \Project\models\FrontManager();
        $article = $displayArticle->getArticle();
       
        if(empty($article)) { 
            require 'app/views/front/error404.php';
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

            if(!empty($password)) {
                $testPassword = new \Project\models\FrontManager();
                $passwordCheck = $testPassword->passwordCheck();
                if($passwordCheck === $password) {
                    $validation = false;
                    $errors[] = "Ce mot de passe n'est pas le bon !";
                }
            }

            if($validation){
                $modifyPassword = new \Project\models\FrontManager();
                $passwordModify = $modifyPassword->usersModifyPassword($newPassword);
                require 'app/views/front/account.php';
            }
            return $errors;
        }    
    }

    // permet a l'utilisateur de supprimer son compte
    function deleteUsers() {
        $users = new \Project\models\FrontManager();
        $usersDelete = $users->deleteUsers();
        unset($_SESSION['user']);
        session_destroy();
        return $usersDelete;
    }



    //-------------test----------------------


    function saveScoreBattleship() {
        if(isset($_SESSION['user'])) {
            extract($_POST);
            $save = new \Project\models\FrontManager();
            $score = $save->scoreSavedBattleship($data);
            return $score;
        }
    }
} 