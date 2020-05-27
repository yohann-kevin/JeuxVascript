<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
    <!-- page jeux -->
    <main id="games">
        <section id="pageGame">
            <!-- titre -->
            <header id="pageGameTitle">
                <h3>Nos Jeux</h3>
            </header>
            <!-- article du jeux snake -->
            <article id="snakeArticle">
                <div class="gameTitle">
                    <h4>Snake</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/snake.png">
                </div>
                <div id="contentGame1">
                    <p class="gamePara">
                        Sur JeuxVascript nous vous proposons de revivre l'experience Snake
                        en ligne sur votre navigateur. pour ce faire vous devrez utiliser votre clavier.
                        Les touches sont indiques sur notre page about !
                    </p>
                    <a href="index.php?action=about" class="buttonInfoGame">Plus...</a>
                    <a href="index.php?action=snake" class="buttonPlayGame">Play</a>
                </div>
            </article>
            <!-- article du jeux power 4 -->
            <article id="power4Article">
                <div class="gameTitle">
                    <h4>Power 4</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/puissance4.png">
                </div>
                <div id="contentGame2">
                    <p class="gamePara">
                        soyez le premier joueur a aligner quatre piont !
                        Vous avez la possibilite de jouer avec un ami present avec vous, vous n'aurez cas jouer chacun
                        votre tour et que le meilleur gagne ! 
                        Pour les joueurs solo JeuxVascript vous a concocter une petite IA (entièrement en javascript)
                        qui se revele etre un vrai defi ! serez vous de taille a l'affronter ?
                    </p>
                    <a href="index.php?action=about" class="buttonInfoGame">Plus...</a>
                    <a href="index.php?action=power4" class="buttonPlayGame">Play</a>
                </div>
            </article>
            <!-- article du jeux battleship -->
            <article id="battleshipArticle">
                <div class="gameTitle">
                    <h4>Battleship</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/battleship1.png">
                </div>
                <div id="contentGame3">
                    <p class="gamePara">
                        une grille des bateaux et c'est tout ! Entierement fait en JavaScript.
                        Vous vous retrouverez face a l'imbattable IA de JeuxVascript. Vous devrez
                        couler chacun de ses navires !
                    </p>
                    <a href="index.php?action=about" class="buttonInfoGame">Plus...</a>
                    <a href="index.php?action=battleship" class="buttonPlayGame">Play</a>
                </div>
            </article>
        </section>
    </main>



<?php require_once 'app/views/front/layouts/footer.php'; ?>