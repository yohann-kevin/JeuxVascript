<?php require_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; ?>
    <!-- page battleship -->
    <main id="pageBattleship">
            <!-- section titre -->
            <section id="headerBattleship">
                <h1>Welcome to Battleship</h1>
                <h2 id="turn">Tour du joueur 1</h2>   
            </section>
            <!-- section permettant de choisir le nombre de bateau -->
            <section id="choiceBoat">
                <label for="numberBoat">Nombre de bateaux :</label>
                <input type="number" id="numberBoat" placeholder="entre 2 et 4">
                <button onClick="startBattleship()" class="btnBoat">Play</button>
            </section>
            <!-- section permmettant de gérer les élément du jeux en javascript -->
            <section id="successBattleship"></section>
            <section id="j1Battleship"></section>
            <section id="battleship"></section>
            <section id="j2Battleship"></section>
            <section id=""></section>
    </main>
<?php require_once 'app/views/front/layouts/footer.php'; ?>