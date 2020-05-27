# JeuxVascript

<div align="center">
    <img src="app/public/images/logo/Jeuxvacsript2.png">
</div>

<div align="center">
    <img src="app/public/images/screenshot/screen.png">
</div>

## Documentation du projet

### language utilisé

* HTML5
* CSS3
* JavaScript
* PHP

### titre du projet

JeuxVascript

### auteur 

PERRIGUEY Yohann

### Aperçu du projet

JeuxVascript est une plateforme communautaire
principalement orienté vers les jeux indépendant nous 
mettons a disposition de la communauté un éspace blog pour que les utilisateurs 
puissies s'éxprimer librement et discuter de leur jeux vidéo indépendant préféré.

Le site possède aussi ces propres jeux entièrement fait en javascript.

Nos jeux : 

* Snake
* Battleship
* Power 4

Les fonctionnalités à venir : 

* Mise en place d'une api google connect (en attente du réponse des services de google)
* Mise en place d'une page stats qui permmetra aux utilisateurs de consulter leur score et leur statistique sur différent jeux
* Mise en place d'une fonction permettant de retailler les images

### démarrer le projet

Pour commencer vous allez devoir cloné le projet via le bouton (clone or download) en haut à droite
ou via git en utilisant la commande :

```

git clone

```

Ensuite vous devrez faire un import de la base de donnée présente dans le dossier (sql)

=> app/public/sql/db-jxs.sql

Vous y trouverez le fichier (db-jxs.sql). Vous n'avez plus qu'a l'importer sur 
votre phpMyAdmin (ou autre application de gestion de base de donnée sql ex: laragon) 

!! Attention !! 

Si vous modifier le nom de la base de donnée de base vous devrez le modifier aussi
dans le fichier manager.php qui se trouve dans le dossier (models)

=> app/public/models/manager.php

``` php

namespace Project\models;
class Manager {
    // gère la connection a la base de donnée
    protected function dbConnect() {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=Mon_nom_de_base_de_donnée;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
}

```
Et pour finir vous n'aurez qu'a lancer phpMyAdmin 
aller sur votre navigateur et taper localhost vous y trouverez le projet

Sinon vous pouvez directement voir le projet sur :
[JeuxVascript.fr](https://jeuxvascript.fr/)
