<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php //include_once 'app/views/back/layouts/headerAdmin.php'; ?>

    <main id="adminLogin">

        <section id="adminLog">
            <img src="app/public/images/logo/admin.png" alt="JeuxVascript">
            <form id="">
                <label from="">Votre identifiant</label>
                <input id="" name="" type="text" placeholder="Pseudo">
                <label from="">Votre mot de passe</label>
                <input id="" name="" type="password" placeholder="password">
                <div id="buttonConnect">
                    <button type="submit" id="btnSubConnect">Connecter</button>
                    <button type="reset" id="btnResConnect">Annuler</button>
                </div>
                <ul>
                    <li><a href="indexAdmin.php?action=admin">Admin</a></li>
                    <li><a href="indexAdmin.php?action=write">Rédiger</a></li>
                    <li><a href="indexAdmin.php?action=modify">Modifier</a></li>
                </ul>
            </form>
        </section>

    </main>


<?php //include_once 'app/views/back/layouts/footerAdmin.php'; ?>