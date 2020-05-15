<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
    <main id="adminLogin">

        <section id="adminLog">
            <img src="app/public/images/logo/admin.png" alt="JeuxVascript">
            <form id="logFormAdmin" method="post" action="indexAdmin.php?action=adminLogin">
            <?php if(isset($error)) : ?>
            <?= $error ?>
            <?php endif ?>
                <label from="adminPseudo">Votre identifiant</label>
                <input id="adminPseudo" name="pseudo" type="text" placeholder="Pseudo" 
                    value='<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>' required>
                    <span id="forgetAdminPseudo"></span>
                <label from="adminPassword">Votre mot de passe</label>
                <input id="adminPassword" name="password" type="password" placeholder="password" required>
                <span id="forgetAdminPass"></span>
                <div id="btnConnectAdmin">
                    <button type="submit" id="btnAdminLog">Connecter</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </section>

    </main>
    <script type="text/javascript" src="app/public/script/regexBack.js"></script>