<?php require_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; ?>
    <!-- page power 4 -->
    <main id="pagePower4">
        <section id="headerPower4">
            <h1>Welcome to power 4</h1>
            <h2 id="turnPower4">Tour du joueur 1</h2>
            <div id="btnIa">
                <input type="checkbox" name="btnIaPower4" onchange="startIA()">
                <label for="btnIaPower4">Activate IA</label>
            </div>   
        </section>
        <!-- section permettant de géré le jeux power 4 en javascript -->
        <section id="j1"></section>
        <section id="power4"></section>
        <section id="j2"></section> 
        <section id="successPower4"></section> 
    </main>
<?php require_once 'app/views/front/layouts/footer.php'; ?>