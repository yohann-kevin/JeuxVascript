<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
    <main id="adminLogin">

        <section id="adminLog">
            <img src="app/public/images/logo/admin.png" alt="JeuxVascript">
            <form id="logFormAdmin" method="post" action="indexAdmin.php?action=adminLogin">
            <?php if(isset($error)) : ?>
            <?= $error ?>
            <?php endif ?>
                <label from="">Votre identifiant</label>
                <input id="" name="pseudo" type="text" placeholder="Pseudo" 
                    value='<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>'>
                <label from="">Votre mot de passe</label>
                <input id="" name="password" type="password" placeholder="password">
                <div id="btnConnectAdmin">
                    <button type="submit">Connecter</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </section>

    </main>