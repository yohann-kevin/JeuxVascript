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
        $infos = $bdd->prepare('SELECT email, pseudo FROM users WHERE id = ?');
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

    public function deleteArticleImg() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $image = $bdd->prepare("SELECT images FROM articles WHERE id = ?");
        $image->execute([$id]);
        $image = $image->fetch()["images"];
        return $image;
    }

    public function deleteArticle() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $delete = $bdd->prepare("DELETE articles.* FROM articles WHERE id = ?");
        $delete->execute([$id]);
        return $delete;
    }

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

}