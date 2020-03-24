<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- token google for google connect -->
    <meta name="google-signin-client_id" content="991297201856-i8t0ekurllat0825dfs4tdlr6f5qbqn1.apps.googleusercontent.com">
    <!-- lien vers les feuilles de style -->
    <link rel="stylesheet" href="app/public/style/header.css">
    <link rel="stylesheet" href="app/public/style/home.css">
    <link rel="stylesheet" href="app/public/style/footer.css">
    <link rel="stylesheet" href="app/public/style/mediaQueries.css">
    <link rel="stylesheet" href="app/public/style/contact.css">
    <link rel="stylesheet" href="app/public/style/snake.css">
    <link rel="stylesheet" href="app/public/style/register.css">
    <link rel="stylesheet" href="app/public/style/news.css">
    <link rel="stylesheet" href="app/public/style/about.css">
    <link rel="stylesheet" href="app/public/style/article.css">
    <link rel="stylesheet" href="app/public/style/game.css">
    <link rel="stylesheet" href="app/public/style/space.css">
    <link rel="stylesheet" href="app/public/style/account.css">
    <link rel="stylesheet" href="app/public/style/usersArticle.css">
    <link rel="stylesheet" href="app/public/style/userSettings.css">
    <link rel="stylesheet" href="app/public/style/stats.css">
    <!-- icône -->
    <link rel="icon" href="app/public/images/logo/icone.png">
    <!-- charge la biblitoheque chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <!-- Charge la bibliothèque jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>test</title>
</head>

<body>
    <header id="header">
        <!-- <img src="Jeuxvacsript.png" alt="Jeuxvacsript"> -->
        <div id="logo">
            <a href="index.php?action=home">
                <img src="app/public/images/logo/Jeuxvacsript2.png" alt="Jeuxvacsript">
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
                <li class="deroulant fromLeft"><a href="index.php?action=news">Communauté</a>
                    <ul class="sous">
                        <li><a href="#">Best Score</a></li>
                        <li><a href="index.php?action=news">Article</a></li>
                        <!-- lien temporaire vers page article.php -->
                        <li><a href="index.php?action=article">article.php</a></li>
                        <li><a href="index.php?action=account">account.php</a></li>
                        <li><a href="index.php?action=usersArticle">usersArticle.php</a></li>
                        <li><a href="index.php?action=userSettings">userSettings.php</a></li>
                        <li><a href="index.php?action=stats">stats.php</a></li>
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