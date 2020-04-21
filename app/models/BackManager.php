<?php 

namespace Project\models;

class BackManager extends Manager {
    public function viewBack() {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('Methode sql');
        $req->execute(array());
        return $req;
    }

    public function adminLogin($pseudo,$password) {
        $bdd = $this->dbConnect();
        $login = $bdd->prepare('SELECT id, password FROM admin WHERE pseudo = ?');
        $login->execute([$pseudo]);
        $login = $login->fetch();
        return $login;
    }

    public function adminInfo() {
        $bdd = $this->dbConnect();
        $infos = $bdd->prepare('SELECT id, email, pseudo FROM admin WHERE id = ?');
        $infos->execute([$_SESSION['admin']]);
        $infos = $infos->fetch();
        return $infos;        
    }

    public function getComment() {
        $bdd = $this->dbConnect();
        $comments = $bdd->query('SELECT comment.*, users.pseudo FROM comment INNER JOIN users ON comment.users_id = users.id ORDER BY created_date DESC LIMIT 9');
        $comments = $comments->fetchAll();
        return $comments;
    }

    public function getArticle() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $article = $bdd->prepare("SELECT articles.*, users.pseudo FROM articles INNER JOIN users ON articles.users_id = users.id WHERE articles.id = ? ");
        $article->execute([$id]);
        $article = $article->fetch();
        return $article;
    }
}