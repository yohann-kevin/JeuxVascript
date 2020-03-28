<?php 

namespace Project\models;

class FrontManager extends Manager {
    public function viewFront() {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('Methode sql');
        $req->execute(array());
        return $req;
    }

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

    public function pseudoCheck($pseudo){
        $bdd = $this->dbConnect();
        $pseudoCheck = $bdd->prepare('SELECT COUNT(*) FROM users WHERE pseudo = ? ');
        $pseudoCheck->execute([$pseudo]);
        $pseudoCheck = $pseudoCheck->fetch()[0];
        return $pseudoCheck;
    }
}

class Users extends Manager {
    // public function usersRegister() {
    //     $bdd = $this->dbConnect();
    //     $register = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
    //     $register->execute([
    //         'pseudo' => htmlentities($pseudo),
    //         'email' => htmlentities($email),
    //         'password' => password_hash($password, PASSWORD_DEFAULT)
    //     ]);
    //     return $register;
    // }
}