<?php 
$page = "";
$title = "Battleship";
$description = "Jouer aux célebre jeux de société bataille navale";
require_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; 
?>

<main id="pageLabyrinth">
    <section id="labyrinthGame">
        <article id="labyrinthe"></article>

        <article id="alertLabyrinth"></article>
    </section> 
</main>




<?php require_once 'app/views/front/layouts/footer.php'; ?>