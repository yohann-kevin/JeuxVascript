<?php $page = 'game'; ?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
    <main id="games">

        <section id="pageGame">
            <header id="pageGameTitle">
                <h3>Nos Jeux</h3>
            </header>
            <article id="articleSpaceGame">
                <div class="gameTitle">
                    <h4>Space Invaders</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/spaceInvaders2.png">
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
                    <a href="index.php?action=spaceInvaders" class="buttonPlayGame">Play</a>
                </div>
            </article>

            <article id="articleSnake">
                <div class="gameTitle">
                    <h4>Snake</h4>
                </div>
                <div class="gameImg">
                    <img src="app/public/images/gameplay/snake.png">
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
                    <a href="index.php?action=snake" class="buttonPlayGame">Play</a>
                </div>
            </article>
        </section>
    </main>



<?php require_once 'app/views/front/layouts/footer.php'; ?>