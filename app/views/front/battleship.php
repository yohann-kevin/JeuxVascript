<?php 
$page = "";
$title = "Battleship";
$description = "Jouer aux célebre jeux de société bataille navale";
require_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; 
?>

<main id="pageBattleship">
        <section id="headerBattleship">
            <h1>Welcome to Battleship</h1>
            <h2 id="turn">Tour du joueur 1</h2>
            
        </section>

        <section id="choiceBoat">
            <label for="numberBoat">Nombre de bateaux :</label>
            <input type="number" id="numberBoat" placeholder="entre 2 et 4">
            <button onClick="startBattleship()" class="btnBoat">Play</button>
        </section>

        <section id="successBattleship"></section>

        <section id="j1Battleship"></section>

        <section id="battleship"></section>
        
        <section id="j2Battleship"></section>

        <section id=""></section>

        <!-- <button onClick="battleshipSaveScore()">plop</button> -->

</main>



<?php require_once 'app/views/front/layouts/footer.php'; ?>