<?php 
include_once 'app/views/front/layouts/header.php';
?>
<body>
    <main id="home">

        <section id="sectionTitle">
            <h1 id="homeTitle">Bienvenue sur <span class="strong">JeuxVascript</span></h1>
            <h2 id="homeSubtitle">Le site pour les joueurs 100% <span class="strong">JavaScript</span></h2>
        </section>

        <section id="presentation">
            <header id="presentationTitle">
                <h3>Presentation</h3>
            </header>
            <article id="presentationArticle">
                <h4>Une communaute</h4>
                <p><span class="strong2">JeuxVascript</span> est principalement une plateforme
                     <span class="strong2">communautaire</span> vous avez la possibilite de commente des articles
                    les <span class="strong2">jeux</span> de laisse des <span class="strong2">notes</span> et meme de poste des <span class="strong2">articles</span>, suffit 
                    juste de <a class="strong2" href="#">s'inscrire.</a></p>
                <h4>De l'actualite</h4>
                <p>JeuxVascript est aussi une source <span class="strong2">d'information </span>sur l'actualite
                     du monde du jeux video <span class="strong2">independant</span> et de la programmation en 
                     javascript.</p>
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
                <h2>Consulter les derniers articles et <span class="strong2">commentaires</span> de la <span class="strong2">communautee</span></h2>
            </header>
            <article class="article">
                <img src="app/public/images/image/pixel-art.jpg" alt="pixel-art" class="imgArticle">
                <h2 class="articleTitle">Lorem ipsum dolor <span class="strong2">sit amet.</span></h2>
                <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi esse doloribus maiores! Nostrum veritatis odit suscipit quia. Quod blanditiis expedita dolor distinctio praesentium sed quo aut debitis facilis obcaecati est itaque rerum nobis, sequi minima ullam aliquam asperiores, impedit totam! Iusto et iste voluptatem rem dicta nulla at iure similique.</p>
                <a href="#">Read more...</a>
            </article>
            <article class="article">
                <img src="app/public/images/image/pixel-art.jpg" alt="pixel-art" class="imgArticle">
                <h2 class="articleTitle">Lorem ipsum dolor <span class="strong2">sit amet.</span></h2>
                <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi esse doloribus maiores! Nostrum veritatis odit suscipit quia. Quod blanditiis expedita dolor distinctio praesentium sed quo aut debitis facilis obcaecati est itaque rerum nobis, sequi minima ullam aliquam asperiores, impedit totam! Iusto et iste voluptatem rem dicta nulla at iure similique.</p>
                <a href="#">Read more...</a>
            </article>
            <article class="article">
                <img src="app/public/images/image/pixel-art.jpg" alt="pixel-art" class="imgArticle">
                <h2 class="articleTitle">Lorem ipsum dolor <span class="strong2">sit amet.</span></h2>
                <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi esse doloribus maiores! Nostrum veritatis odit suscipit quia. Quod blanditiis expedita dolor distinctio praesentium sed quo aut debitis facilis obcaecati est itaque rerum nobis, sequi minima ullam aliquam asperiores, impedit totam! Iusto et iste voluptatem rem dicta nulla at iure similique.</p>
                <a href="#">Read more...</a>
            </article>
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
            <article id="spaceInvaders">
                <div class="gameTitle">
                    <h4>Space Invaders</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/spaceInvaders2.png">
                </div>
                <div id="gameContent1">
                <p class="gamePara">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                </p>
                <a href="#" class="buttonPlayHome">Play</a>
                </div>
            </article>

            <article id="snake">
                <div class="gameTitle">
                    <h4>Snake</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/snake.png">
                </div>
                <div id="gameContent2">
                <p class="gamePara">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Molestias deserunt nulla culpa!
                </p>
                <a href="#" class="buttonPlayHome">Play</a>
                </div>
            </article>
        </section>

        <section class="homeQuote">
            <h1 class="quote">Les rudiments de la connaissance 
                <span class="strong"> sont assimiles au fil des jeux.</span></h1>
            <h2 class="author">Mahatma <span class="strong">Gandhi</span></h2>
        </section>

    

        <section id="test">

        </section>

    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>


<!-- <h1>PLOP !!!</h1>
<h2>Home</h2>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="index.php?action=about">About</a></li>
        <li><a href="index.php?action=contact">Contact</a></li>
    </ul>
</nav> -->