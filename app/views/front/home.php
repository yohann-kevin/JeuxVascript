<?php 
require_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php';
?>
    <main id="home">

        <section class="pageTitle">
            <h1 class="title">Bienvenue sur <span class="strong">JeuxVascript</span></h1>
            <h2 class="subtitle">Le site pour les joueurs 100% <span class="strong">JavaScript</span></h2>
        </section>

        <section id="presentation">
            <header id="presentationTitle">
                <h3>Presentation</h3>
            </header>
            <article id="presentationArticle">
                <h4>Une communautée</h4>
                <p><span class="strong2">JeuxVascript</span> est principalement une plateforme
                    <span class="strong2">communautaire</span> vous avez la possibilite de commenter des articles
                    de <span class="strong2">jouer</span> et meme de
                    poster des <span class="strong2">articles</span>, suffit
                    juste de <a class="strong2" href="index.php?action=register">s'inscrire.</a></p>
                <h4>De l'actualité</h4>
                <p>JeuxVascript est aussi une source <span class="strong2">d'information </span>sur l'actualite
                    du monde du jeux video <span class="strong2">independant</span>.</p>
                <h4>Des jeux des jeux et encore des jeux</h4>
                <p>Et bien evidemment JeuxVascript vous propose de vous <span class="strong2">amusez</span>
                    en passsant un moment sur un de nos <span class="strong2">jeux</span> 100% javascript</p>
            </article>
            <article id="presentationImg">
                <img src="app/public/images/image/pixel-art.jpg" alt="pixel-art">
                <img src="app/public/images/gameplay/spaceInvaders2.png" alt="space invaders">
                <img src="app/public/images/gameplay/snake.png" alt="snake">
            </article>
        </section>
        <section id="homeSticky">
            <header id="homeStickyTitle">
                <h2>Consulter les derniers articles et <span class="strong2">commentaires</span> de la <span
                        class="strong2">communautée</span></h2>
            </header>



            <?php foreach ($lastArticles as $lastArticle): ?>
            <article class="article">
                <img src="app/public/images/articles/<?= $lastArticle['images'] ?>" alt="<?= $lastArticle['images'] ?>" class="imgArticle">
                <h2 class="articleTitle"><?= $lastArticle['title'] ?></h2>
                <p class="para"><?= $lastArticle['extract'] ?></p>
                <a href="index.php?action=article&id=<?=$lastArticle['id'] ?>">Voir plus...</a>
            </article>
            <?php endforeach ; ?>

        </section>

        <section class="homeQuote">
            <h1 class="quote">Le jeu est la forme <span class="strong"> la plus elevee de la recherche.</span></h1>
            <h2 class="author">Albert <span class="strong">Einstein</span></h2>
        </section>


        <section id="counter">
            <h3 id="counterTitle">Quelque chiffre</h3>
            <article class="counter">
                <p>Joueur: <br><span id="c1">x</span><br></p>
            </article>
            <article class="counter">
                <p>Article poste: <br><span id="c2">x</span><br></p>
            </article>
            <article class="counter">
                <p>Score total: <br><span id="c3">x</span><br></p>
            </article>
        </section>
        

        <section id="homeGame">
            <header id="homeGameTitle">
                <h3>Nos Jeux</h3>
            </header>
            <article id="articleSnake">
                <div class="gameTitle">
                    <h4>Snake</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/snake.png">
                </div>
                <div id="gameContent1">
                    <p class="gameParaHome">
                    Sur JeuxVascript nous vous proposons de revivre l'experience Snake
                    en ligne sur votre navigateur. pour ce faire vous devrez utiliser votre clavier.
                    Les touches sont indiques sur notre page about !
                    </p>
                    <a href="index.php?action=about" class="buttonInfoHome">Plus...</a>
                    <a href="index.php?action=snake" class="buttonPlayHome">Play</a>
                </div>
            </article>
            <article id="articleBattleship">
                <div class="gameTitle">
                    <h4>Battleship</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/battleship1.png">
                </div>
                <div id="gameContent2">
                    <p class="gameParaHome">
                        une grille des bateaux et c'est tout ! Entierement fait en JavaScript.
                        Vous vous retrouverez face a l'imbattable IA de JeuxVascript. Vous devrez
                        couler chacun de ses navires !
                    </p>
                    <a href="index.php?action=about" class="buttonInfoHome">Plus...</a>
                    <a href="index.php?action=battleship" class="buttonPlayHome">Play</a>
                </div>
            </article>
            <article id="articlePower4">
                <div class="gameTitle">
                    <h4>Puissance 4</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/puissance4.png">
                </div>
                <div id="gameContent3">
                    <p class="gameParaHome">
                        soyez le premier joueur a aligner quatre piont !
                        Vous avez la possibilite de jouer avec un ami present avec vous, vous n'aurez cas jouer chacun
                        votre tour et que le meilleur gagne ! 
                        Pour les joueurs solo JeuxVascript vous a concocter une petite IA (entièrement en javascript)
                        qui se revele etre un vrai defi ! serez vous de taille a l'affronter ?
                    </p>
                    <a href="index.php?action=about" class="buttonInfoHome">Plus...</a>
                    <a href="index.php?action=power4" class="buttonPlayHome">Play</a>
                </div>
            </article>
        </section>

        <section class="homeQuote">
            <h1 class="quote">Les rudiments de la connaissance
                <span class="strong"> sont assimiles au fil des jeux.</span></h1>
            <h2 class="author">Mahatma <span class="strong">Gandhi</span></h2>
        </section>

        <section id="advert">

            <header id="headerAdvert">
                <h2>Les dernieres annonces dans le jeux video indepandants</h2>
            </header>


            <?php foreach ($articleIndes as $articleInde): ?>

            <article class="advert">
                <h3 class="advertTitle"><?= $articleInde['title'] ?></h3>
                <div class="advertImg">
                    <img src="app/public/images/articles/<?= $articleInde['images'] ?>" alt="<?= $articleInde['images'] ?>">
                </div>
                <p class="advertPara"><?= $articleInde['extract'] ?></p>
                <a href="index.php?action=article&id=<?=$articleInde['id'] ?>">Voir plus...</a>
            </article>
            <?php endforeach ; ?>
        </section>




    </main>

    <?php include_once 'app/views/front/layouts/footer.php'; ?>

