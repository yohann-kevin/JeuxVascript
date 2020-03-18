<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- lien vers les feuilles de style -->
    <link rel="stylesheet" href="app/public/style/header.css">
    <link rel="stylesheet" href="app/public/style/home.css">
    <link rel="stylesheet" href="app/public/style/footer.css">
    <link rel="stylesheet" href="app/public/style/mediaQueries.css">
    <link rel="stylesheet" href="app/public/style/contact.css">
    <link rel="stylesheet" href="app/public/style/snake.css">
    <link rel="stylesheet" href="app/public/style/register.css">
    <!-- icône -->
    <link rel="icon" href="app/public/images/logo/icone.png">
    <!-- Charge la bibliothèque jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>test</title>
</head>

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
                    <li><a href="#">Space Invaders</a></li>
                    <li><a href="index.php?action=snake">Snake</a></li>
                </ul>
            </li>
            <li class="deroulant fromLeft"><a href="index.php?action=blog">Communauté</a>
                <ul class="sous">
                    <li><a href="#">Best Score</a></li>
                    <li><a href="#">Article</a></li>
                </ul>
            </li>
            <li class="fromLeft"><a href="index.php?action=about">A propos</a></li>
            <li class="fromLeft"><a href="index.php?action=contact">Contact</a></li>
        </ul>
    </nav>
    <div id="buttonHeader">
        <a>Connexion</a>
        <a href="index.php?action=register">Inscription</a>
        <input type="text" name="search" placeholder="Search.." id="search">
    </div>
</header>