<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- lien vers les feuilles de style -->
    <link rel="stylesheet" href="app/public/style/header.css">
    <!-- <link rel="stylesheet" href="app/public/style/home.css"> -->
    <link rel="stylesheet" href="app/public/style/footer.css">
    <!-- icône -->
    <link rel="icon" href="app/public/images/logo/icone.png">
    
    <!-- Charge la bibliothèque jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin</title>
</head>

<header id="header">
    <!-- <img src="Jeuxvacsript.png" alt="Jeuxvacsript"> -->
    <div id="logo">
        <a href="index.php?action=home">
            <img src="app/public/images/logo/admin.png" alt="Jeuxvacsript">
        </a>
    </div>
    <div id="smartphone">
        <img src="app/public/images/logo/menu.png" onclick="displayMenu()">
    </div>
    <!-- script temporaire -->
    <script type="text/javascript">   
        function displayMenu() {
            var menu = document.getElementById("nav");
            menu.style.display = "block";
        }
    </script>
    <nav id="nav">
        <ul>
            <li class="fromLeft"><a href="index.php?action=home">Accueil</a></li>
            <li class="deroulant fromLeft"><a href="index.php?action=game">Nos Jeux</a>
                <ul class="sous">
                    <li><a href="index.php?action=spaceInvaders">Space Invaders</a></li>
                    <li><a href="index.php?action=snake">Snake</a></li>
                </ul>
            </li>
            <li class="deroulant fromLeft"><a href="index.php?action=news">Admin</a>
                <ul class="sous">
                    <!-- lien temporaire -->
                    <li><a href="indexAdmin.php?action=admin">admin.php</a></li>
                    <li><a href="indexAdmin.php?action=write">write.php</a></li>
                    <li><a href="indexAdmin.php?action=modify">modify.php</a></li>
                </ul>
            </li>
            <li class="fromLeft"><a href="index.php?action=about">A propos</a></li>
            <li class="fromLeft"><a href="index.php?action=contact">Contact</a></li>
        </ul>
    </nav>
    <div id="buttonHeader">
        <a id="btnModalConnect">Connexion</a>
        <!-- The Modal -->
        <div id="modalConnect">
            <!-- Modal content -->
            <div id="modalContent">
                <span id="closeConnect">&times;</span>
                <h1 id="modalConnectTitle">De retour parmi nous ?</h1>
                <form id="idConnect">
                    <label from="pseudoConnect">Votre pseudo</label>
                    <input id="pseudoConnect" name="pseudoConnect" type="text" placeholder="Pseudo">
                    <label from="passwordConnect">Votre mot de passe</label>
                    <input id="passwordConnect" name="passwordConnect" type="password" placeholder="password">
                    <div id="btnGoogle" class="g-signin2" data-onsuccess="onSignIn"></div>
                    <div id="buttonConnect">
                        <button type="submit" id="btnSubConnect">Envoyer</button>
                        <button type="reset" id="btnResConnect">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="index.php?action=register">Inscription</a>
        <input type="text" name="search" placeholder="Search.." id="search">
    </div>
</header>