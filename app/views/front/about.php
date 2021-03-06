<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
    <!-- page a propos -->
    <main id="about">
        <!-- section titre -->
        <section class="pageTitle">
            <h1 class="title">Vous souhaitez en savoir plus sur <span class="strong">un de nos jeux ?</span></h1>
            <h2 class="subtitle">Ou sur <span class="strong">JeuxVascript ?</span></h2>
        </section>
        <!-- début de la section about qui présente les different jeux de la plateforme -->
        <section id="sectionAbout">
            <header id="aboutTitle">
                <h3>Vous trouverez toutes vos réponses en dessous<h3>
            </header>
            <!-- article qui parle de jeuxvascript en général -->
            <article class="articleAbout">
                <div class="headerArticleAbout">
                    <h1 class="articleAboutTitle">JeuxVascript</h1>
                    <img class="imgAbout1" src="app/public/images/logo/bottom.png">
                    <img class="imgAbout2" src="app/public/images/logo/left.png">
                </div>
                <div class="contentAbout1">
                    <p>JeuxVascript est une plateforme communautaire
                        principalement orienté vers les jeux indépendant nous 
                        mettons a disposition de la communauté un éspace blog pour que vous 
                        puissiez vous éxprimer librement et discuter de vos jeux vidéo indépendant préféré.
                    </p><br>
                    <p>Nous éssayons d'éxclure un maximum les articles traitant 
                        des jeux triple AAA de notre blog. Nous souhaitons donner un maximum
                        de visibilité aux développeurs et créateurs de jeux indépendants.
                    </p><br>
                    <p>Pour les développeur et créteur de jeux indépendant 
                        Nous vous invitons à venir présenter vos projet à la communauté 
                        Vous pourrez peut être trouver de l'aide pour la 
                        conception de votre jeux ou échanger sur différente technologie 
                        ou bien tout simplement communiqué autour de votre jeux et des différentes 
                        mise à jour que vous éffectuer 
                    </p><br>
                    <p>Vous l'aurez compris JeuxVascript est une plateforme singulière
                        ou la priorité et au jeux vidéo, aux indépendant, a la communauté 
                        et à la découverte de nouvelle éxperience  
                    </p><br>
                    <p>
                        Nous vous proposons aussi (entre la lecture de deux articles très intéréssant)
                        de découvrir les jeux développer par JeuxVascript Le Snake, 
                        Le Battleship et le Power 4 . Ces jeux sont tout simplement des démonstration
                        de ce qu'il est possible de faire avec seulement du javascript !
                    </p><br>
                    <p class="contentCenter">
                        Nous vous remercions de fréquenter notre plateforme et surtout... Amusez vous bien !
                    </p>
                </div>
            </article>
            <!-- article qui parle du jeux snake -->
            <article class="articleAbout">
                <div class="headerArticleAbout">
                    <h1 class="articleAboutTitle">Le jeux snake</h1>
                    <img class="imgAbout3" src="app/public/images/logo/bottom.png">
                    <img class="imgAbout4" src="app/public/images/logo/left.png">
                </div>
                <div class="contentAbout2">
                    <p>Le snake, de l'anglais signifiant « serpent », 
                    est un genre de jeu vidéo dans lequel le joueur dirige une ligne qui 
                    grandit et constitue ainsi elle-même un obstacle. Bien que le concept tire 
                    son origine du jeu vidéo d'arcade Blockade, il n'existe pas de version standard. 
                    Son concept simple l'a amené à être porté sur l'ensemble des plates-formes de jeu 
                    existantes sous différents noms.</p>
                    <img src="app/public/images/about/snakeRetro.jpg" id="snakeRetro">
                    <p class="contentCenter">Le jeu a connu un regain de popularité à partir de 1998 quand Nokia, 
                    une entreprise de télécommunications, l'a intégré dans ses produits. 
                    Avec l'émergence du nouveau support de jeu qu'est le téléphone mobile, 
                    il est devenu un classique du jeu sur appareil mobile.</p>
                    <p class="contentCenter">Sur JeuxVascript nous vous proposons de revivre l'éxperience Snake
                    en ligne sur votre navigateur. pour ce faire vous devrez utiliser votre clavier.
                    Les touches sont indiqués ci-dessous : 
                    </p>
                    <div id="touchSnake">
                        <img src="app/public/images/logo/up-arrow.png" alt="arrow-up">
                        <img src="app/public/images/logo/equals.png" alt="equal">
                        <img src="app/public/images/logo/z.png" alt="z">

                        <img src="app/public/images/logo/left-arrow.png" alt="left-up">
                        <img src="app/public/images/logo/equals.png" alt="equal">
                        <img src="app/public/images/logo/q.png" alt="q">

                        <img src="app/public/images/logo/down-arrow.png" alt="down-up">
                        <img src="app/public/images/logo/equals.png" alt="equal">
                        <img src="app/public/images/logo/s.png" alt="s">

                        <img src="app/public/images/logo/right-arrow.png" alt="right-up">
                        <img src="app/public/images/logo/equals.png" alt="equal">
                        <img src="app/public/images/logo/d.png" alt="d">
                    </div>
                </div>
            </article>
            <!-- article qui parle du jeux batlleship -->
            <article class="articleAbout">
                <div class="headerArticleAbout">
                    <h1 class="articleAboutTitle">Battleship</h1>
                    <img class="imgAbout5" src="app/public/images/logo/bottom.png">
                    <img class="imgAbout6" src="app/public/images/logo/left.png">
                </div>
                <div class="contentAbout3">
                    <p id="textBattleship">Le Battleship , de l'anglais signifiant "Battaille navale", 
                        appelée aussi touché-coulé, est un jeu de 
                        société dans lequel deux joueurs doivent placer des  "navires"  
                        sur une grille tenue secrète et tenter de  "toucher"  les navires 
                        adverses. Le gagnant est celui qui parvient à couler tous les navires 
                        de l'adversaire avant que tous les siens ne le soient. On dit qu'un 
                        navire est coulé si chacune de ses cases a été touchées par un coup de 
                        l'adversaire
                    </p>
                    <img src="app/public/images/about/retroBattleship.jpg" alt="battleship" id="retroBattleship">
                    <p class="contentCenter">Ce jeux très populaires et indémodable, est connu sous de très nombreuses variantes dans le jeux 
                        vidéo depuis des années les développeur aime s'inspirer de jeux simple afin de le refaire découvrir
                        au grand public sous une nouvelle forme, une nouvelle éxperience du battleship ...  
                    </p>
                    <p class="contentCenter">Chez JeuxVascript nous vous proposons, nous aussi une nouvelles éxperiences du battleship.
                        Nous avons voulu vous proposez une éxperience qui se rapproche le plus possible de celle du jeux
                        de société de base à savoir une grille des bateaux et c'est tout, entièrement fait en JavaScript.
                        Vous vous retrouverez face à l'imbattable IA de JeuxVascript.
                    <p><br>
                </div>
            </article>
            <!-- article qui parle du jeux power 4 -->
            <article class="articleAbout lastArticleAbout">
                <div class="headerArticleAbout">
                    <h1 class="articleAboutTitle">Power4</h1>
                    <img class="imgAbout7" src="app/public/images/logo/bottom.png">
                    <img class="imgAbout8" src="app/public/images/logo/left.png">
                </div>
                <div class="contentAbout4">
                    <p id="textPower4">Le Power 4 , de l'anglais signifiant "Puissance 4", appelé aussi parfois 4 en ligne 
                        est un jeu de stratégie combinatoire abstrait, commercialisé pour la première 
                        fois en 1974 par la Milton Bradley Company, plus connue sous le nom de MB et détenue 
                        depuis 1984 par la société Hasbro.
                    </p>
                    <img src="app/public/images/about/power4.jpg" alt="power 4" id="retroPower4">
                    <p class="contentCenter">Ce jeux de société, (comparer au battleship) n'a eu que très peut d'exportation au format
                        jeux vidéo mais il est quand même possible de trouver certaine version du jeux sur internet
                    </p>
                    <p class="contentCenter">Quand à nous, nous vous proposons de revivre vos meileur partie de power 4.
                        La version du power 4 sur JeuxVascript ce rapproche énormément de la version de base du jeux
                        vous devrez être le premier joueur à aligné quatre piont.
                        Vous avez la possibilité de jouer avec un ami présent avec vous, vous n'aurez cas jouer chacun
                        votre tour et que le meilleur gagne ! 
                        Pour les joueurs solo JeuxVascript vous a concocter une petite IA (entièrement en javascript)
                        qui se révèle être un vrai défi ! serez vous de taille à l'affronter ?
                    </p>
                </div>
            </article>
        </section>
    </main>
<?php require_once 'app/views/front/layouts/footer.php'; ?>