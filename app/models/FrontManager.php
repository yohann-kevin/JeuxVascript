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
    public function category() {
        $bdd = $this->dbConnect();
        $category = $bdd->prepare('SELECT id, name FROM category');
        $category->execute(array());
        $category = $category->fetchAll();
        return $category;
    }

    public function postArticle($title,$content,$image) {
        $bdd = $this->dbConnect();
        // $id_category = (int)$_GET['id'];
        $postArticle = $bdd->prepare("INSERT INTO articles(users_id, title, extract, content, images) VALUES (:users_id, :title, :extract, :content, :image)");
        $postArticle->execute([
            'users_id' => $_SESSION['user'],
            // 'category_id' => $id_category,
            "title" => htmlentities($title),
            "extract" => substr(htmlentities($content),0 ,150),
            "content" => htmlentities($content),
            "image" => htmlentities($image)
        ]);
        $postArticle = $postArticle->fetch();
        return $postArticle;
    }
}