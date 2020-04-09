<?php
// if(!empty($_POST)){
//     $login = new \Project\controllers\ControllerFront();
//     $errors = $login->loginUsers();
// }
?>
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
            <ul id="navBar">
                <li class="fromLeft menu">
                    <a href="index.php?action=home" class="<?= $page === 'home' ? 'active' : '' ?>">Accueil</a>
                </li>
                <li class="deroulant fromLeft menu">
                    <a href="index.php?action=game" class="<?= $page === 'game' ? 'active' : '' ?>">Jeux</a>
                    <ul class="sous">
                        <li><a href="index.php?action=spaceInvaders" >Space Invaders</a></li>
                        <li><a href="index.php?action=snake">Snake</a></li>
                    </ul>
                </li>
                <li class="deroulant fromLeft menu">
                    <a href="index.php?action=news"  class="<?= $page === 'news' ? 'active' : '' ?>">News</a>
                    <ul class="sous">
                        <!-- lien temporaire  -->
                        <li><a href="index.php?action=article">article.php</a></li>
                        <li><a href="index.php?action=error404">error404.php</a></li>
                        <li><a href="index.php?action=usersModify">usersModify.php</a></li>
                    </ul>
                </li>
                <li class="fromLeft menu">
                    <a href="index.php?action=about"  class="<?= $page === 'about' ? 'active' : '' ?>">A propos</a>
                </li>
                <li class="fromLeft menu">
                    <a href="index.php?action=contact"  class="<?= $page === 'contact' ? 'active' : '' ?>">Contact</a>
                </li>
            </ul>
        </nav>
        <div id="buttonHeader">

            
            <?php if(isset($_SESSION['user'])) : ?>
            <a href="index.php?action=account">Mon compte</a>
            <a href="index.php?action=disconnect">Déconnexion</a>
            <?php else : ?>
            <a id="btnModalConnect">Connexion</a>
            <a href="index.php?action=register">Inscription</a>
            <?php endif ?>
            <input type="text" name="search" placeholder="Search.." id="search">
            <!-- The Modal -->
            <div id="modalConnect">
                <!-- Modal content -->
                <div id="modalContent">
                    <span id="closeConnect">&times;</span>
                    <h1 id="modalConnectTitle">De retour parmi nous ?</h1>
                    <form id="idConnect" method="post" action="index.php?action=login">
                    <?php if(isset($error)) : ?>
                    <?= $error ?>
                    <?php endif ?>
                        <label from="pseudoConnect">Votre pseudo</label>
                        <input id="pseudoConnect" name="pseudo" type="text" placeholder="Pseudo">
                        <label from="passwordConnect">Votre mot de passe</label>
                        <input id="passwordConnect" name="password" type="password" placeholder="password"
                            value='<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>'>
                        <div id="btnGoogle" class="g-signin2" data-onsuccess="onSignIn"></div>
                        <div id="buttonConnect">
                            <button type="submit" id="btnSubConnect">Envoyer</button>
                            <button type="reset" id="btnResConnect">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </header>