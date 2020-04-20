<?php 

namespace Project\models;

class FrontManager extends Manager {
    public function viewFront() {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('Methode sql');
        $req->execute(array());
        return $req;
    }

    // enregistre un utilisateur
    public function usersRegister($pseudo,$email,$password) {
        $bdd = $this->dbConnect();
        $register = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
        $register->execute([
            'pseudo' => htmlentities($pseudo),
            'email' => htmlentities($email),
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        return $register;
    }

    // vérifie si le pseudo n'est pas déja prit a la creation du compte
    public function pseudoCheck($pseudo){
        $bdd = $this->dbConnect();
        $pseudoCheck = $bdd->prepare('SELECT COUNT(*) FROM users WHERE pseudo = ? ');
        $pseudoCheck->execute([$pseudo]);
        $pseudoCheck = $pseudoCheck->fetch()[0];
        return $pseudoCheck;
    }

    // permet a l'utilisateur de se connecter
    public function usersLogin($pseudo,$password) {
        $bdd = $this->dbConnect();
        $login = $bdd->prepare('SELECT id, password FROM users WHERE pseudo = ?');
        $login->execute([$pseudo]);
        $login = $login->fetch();
        return $login;
    }

    // récupere les informations de l'utilisateur
    public function usersInfo() {
        $bdd = $this->dbConnect();
        $infos = $bdd->prepare('SELECT id, email, pseudo FROM users WHERE id = ?');
        $infos->execute([$_SESSION['user']]);
        $infos = $infos->fetch();
        return $infos;
    }

    // récupere les noms de category
    // public function category() {
    //     $bdd = $this->dbConnect();
    //     $category = $bdd->prepare('SELECT id, name FROM category');
    //     $category->execute(array());
    //     $category = $category->fetchAll();
    //     return $category;
    // }

    public function postArticle($title,$category_id,$content,$image) {
        $bdd = $this->dbConnect();
        $postArticle = $bdd->prepare("INSERT INTO articles(users_id, title, category_id, extract, content, images) VALUES (:users_id, :title, :category_id, :extract, :content, :image)");
        $postArticle->execute([
            'users_id' => $_SESSION['user'],
            'category_id' => $category_id,
            "title" => htmlentities($title),
            "extract" => substr(htmlentities($content),0 ,150),
            "content" => htmlentities($content),
            "image" => htmlentities($image)
        ]);
        return $postArticle;
    }

    // récuperes tout les articles en bdd
    public function getArticles() {
        $bdd = $this->dbConnect();
        $articles = $bdd->query("SELECT id, title, extract, content, images, created_date FROM articles");
        $articles = $articles->fetchAll();
        return $articles;
    }

    //récupère un seul article avec son id
    public function getArticle() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $article = $bdd->prepare("SELECT articles.*, users.pseudo FROM articles INNER JOIN users ON articles.users_id = users.id WHERE articles.id = ? ");
        $article->execute([$id]);
        $article = $article->fetch();
        return $article;
    }

    // récupère les trois derniers articles pour la page d'accueil
    public function getLastArticle() {
        $bdd = $this->dbConnect();
        $lastArticle = $bdd->query("SELECT id, title, extract, content, images, created_date FROM articles ORDER BY created_date DESC LIMIT 3");
        $lastArticle = $lastArticle->fetchAll();
        return $lastArticle;
    }

    // récupère les six derniers articles pour la page d'accueil
    public function getLastArticle2() {
        $bdd = $this->dbConnect();
        $lastArticle = $bdd->query("SELECT id, title, extract, content, images, created_date FROM articles ORDER BY created_date DESC LIMIT 6");
        $lastArticle = $lastArticle->fetchAll();
        return $lastArticle;
    }

    //récupère les dernier articles de la cétgories indépendant
    public function getArticleInde() {
        $bdd = $this->dbConnect();
        $articleInde = $bdd->query("SELECT id, title, category_id, extract, content, images, created_date FROM articles WHERE category_id = 2 LIMIT 2");
        $articleInde = $articleInde->fetchAll();
        return $articleInde;
    }

    // récupere les derniers articles rédiger par l'utilisateur qui est connecté
    public function getLastUsersArticle() {
        $bdd = $this->dbConnect();
        $lastUsersArticles = $bdd->prepare("SELECT articles.* FROM articles INNER JOIN users ON articles.users_id = users.id AND articles.users_id = ? ORDER BY created_date DESC");
        $lastUsersArticles->execute([$_SESSION['user']]);
        $lastUsersArticles = $lastUsersArticles->fetchAll();
        return $lastUsersArticles;
    }

    // permet de supprimer une image d'un article
    public function deleteArticleImg() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $image = $bdd->prepare("SELECT images FROM articles WHERE id = ?");
        $image->execute([$id]);
        $image = $image->fetch()["images"];
        return $image;
    }

    // permet de supprimer un article
    public function deleteArticle() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $delete = $bdd->prepare("DELETE articles.* FROM articles WHERE id = ?");
        $delete->execute([$id]);
        return $delete;
    }

    // permet de modifier un article
    public function modifyArticle($title,$category_id,$content,$image) {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $articleModify = $bdd->prepare("UPDATE articles SET title = :title, category_id = :category_id, extract = :extract, content = :content, images = :image WHERE id = :id");
        $articleModify->execute([ 
            "title" => htmlentities($title),
            "category_id" => $category_id,
            "extract" => substr(htmlentities($content),0 ,150),
            "content" => nl2br(htmlentities($content)),
            "image" => htmlentities($image),
            "id" => $id
        ]);
        return $articleModify;
    }

    // fonction permettant d'envoyer un commentaire en base de données
    public function addComment($contentComment) {
        $bdd = $this->dbConnect();
        $id_article = (int)$_GET['id'];
        $comment = $bdd->prepare("INSERT INTO comment(users_id, article_id, content) VALUES (:users_id, :article_id, :content)");
        $comment->execute([
            'users_id' => $_SESSION['user'],
            'article_id' => $id_article,
            'content' => nl2br(htmlentities($contentComment))
        ]);
        return $comment;
    }

    // fonction permettant de récupérer tout les commentaires d'un articles
    public function getComment() {
        $bdd = $this->dbConnect();
        $id_article = (int)$_GET['id'];
        $comments = $bdd->prepare('SELECT comment.*, users.pseudo FROM comment INNER JOIN users ON comment.users_id = users.id AND comment.article_id = ? ORDER BY created_date DESC');
        $comments->execute([$id_article]);
        $comments = $comments->fetchAll();
        return $comments;
    }

    // récupère les derniers com d'un utilisateur 
    public function getLastUsersComment() {
        $bdd = $this->dbConnect();
        $lastUsersComment = $bdd->prepare("SELECT comment.* FROM comment INNER JOIN users ON comment.users_id = users.id AND comment.users_id = ? ORDER BY created_date DESC");
        $lastUsersComment->execute([$_SESSION['user']]);
        $lastUsersComment = $lastUsersComment->fetchAll();
        return $lastUsersComment;
    }

    // permet de supprimer un commentaire
    public function deleteCom() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $deleteCom = $bdd->prepare("DELETE comment.* FROM comment WHERE id = ?");
        $deleteCom->execute([$id]);
        return $deleteCom;
    }

    // permet a l'utilisateur de modifier ses information type email, pseudo
    public function usersModifyInfo($pseudo,$email) {
        $bdd = $this->dbConnect();
        $modifyInfo = $bdd->prepare("UPDATE users SET pseudo = :pseudo, email = :email WHERE id = :id");
        $modifyInfo->execute([
            'id' => $_SESSION['user'],
            'pseudo' => htmlentities($pseudo),
            'email' => htmlentities($email)
        ]);
        return $modifyInfo;
    }

    // permet a l'utilisateur de modifier son mot de passe
    public function usersModifyPassword($newPassword) {
        $bdd = $this->dbConnect();
        $modifyPassword = $bdd->prepare("UPDATE users SET password = :password WHERE id = :id");
        $modifyPassword->execute([
            'password' =>  password_hash($newPassword, PASSWORD_DEFAULT),
            'id' => $_SESSION['user']
        ]);
        return $modifyPassword;
    }

    // public function passwordCheck(){
    //     $bdd = $this->dbConnect();
    //     $passwordCheck = $bdd->prepare('SELECT password FROM users WHERE id = ?');
    //     $passwordCheck->execute([$_SESSION['user']]);
    //     $passwordCheck = $passwordCheck->fetch();
    //     return $passwordCheck;
    // }

    // permet de supprimer un compte utilisateur
    public function deleteUsers() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $usersDelete = $bdd->prepare("DELETE users.* FROM users WHERE id = ?");
        $usersDelete->execute([$id]);
        return $usersDelete;
    }

    // ---------test----------------

    public function scoreSavedBattleship($data) {
        $bdd = $this->dbConnect();
        $score = $bdd->prepare("INSERT INTO score_battleship(data) VALUES (:score_battleship)");
        $score->execute([
            'score_battleship' => htmlentities($data)
        ]);
        return $score;
    }
}