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

    // permet de supprimer un commentaire
    public function deleteCom() {
        $bdd = $this->dbConnect();
        $id = (int)$_GET['id'];
        $deleteCom = $bdd->prepare("DELETE comment.* FROM comment WHERE id = ?");
        $deleteCom->execute([$id]);
        return $deleteCom;
    }
}