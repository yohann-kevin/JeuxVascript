<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php include_once 'app/views/back/layouts/headerAdmin.php'; ?>

<main id="settings">
    <section>
        <header id="headerSettings">
            <h1>Settings</h1>
            <h2>sur cette page vous pouvez ajouter un autre administrateur ,
                si il y a plusieurs administrateur vous pouvez supprimer votre compte</h2>
        </header>
        <article id="newAdmin">
            <form id="addAdmin">
                <label for="email">Email du nouvelle admin</label>
                <input type="email" value="email" name="email">

                <label for="pseudo">Pseudo du nouvelle admin</label>
                <input type="text" value="pseudo" name="pseudo">

                <label for="password">Mot de passe</label>
                <input type="password" value="password" name="password">

                <div id="settingsButton">
                    <button type="submit" id="">Ajouter</button>
                    <button type="reset" id="">Annuler</button>
                </div>
            </form>
        </article>
        <article id="deleteAdmin">
            <button>Supprimer mon compte</button>
        </article>
    </section>
</main>

<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>