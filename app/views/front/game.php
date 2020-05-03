<?php 
$page = 'game';
$title = "Games";
$description = "Découvrez nos jeux 100% JavaScript"; 
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
    <main id="games">

        <section id="pageGame">
            <header id="pageGameTitle">
                <h3>Nos Jeux</h3>
            </header>

            <article id="snakeArticle">
                <div class="gameTitle">
                    <h4>Snake</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/snake.png">
                </div>
                <div id="contentGame1">
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
                    <a href="index.php?action=about" class="buttonInfoGame">Plus...</a>
                    <a href="index.php?action=snake" class="buttonPlayGame">Play</a>
                </div>
            </article>

            <article id="power4Article">
                <div class="gameTitle">
                    <h4>Power 4</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/puissance4.png">
                </div>
                <div id="contentGame2">
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
                    <a href="index.php?action=about" class="buttonInfoGame">Plus...</a>
                    <a href="index.php?action=power4" class="buttonPlayGame">Play</a>
                </div>
            </article>

            <article id="battleshipArticle">
                <div class="gameTitle">
                    <h4>Battleship</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/battleship1.png">
                </div>
                <div id="contentGame3">
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
                    <a href="index.php?action=about" class="buttonInfoGame">Plus...</a>
                    <a href="index.php?action=battleship" class="buttonPlayGame">Play</a>
                </div>
            </article>
        </section>
    </main>



<?php require_once 'app/views/front/layouts/footer.php'; ?>