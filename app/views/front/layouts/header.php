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