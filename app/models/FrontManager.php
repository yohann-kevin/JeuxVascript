<?php 

namespace Project\models;

class FrontManager extends Manager {
    public function viewFront() {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('Methode sql');
        $req->execute(array());
        return $req;
    }
}

class Users extends Manager {
    public function usersRegister() {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
        $req->execute([
            'pseudo' => htmlentities($pseudo),
            'email' => htmlentities($email),
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        return $req;
    }
}