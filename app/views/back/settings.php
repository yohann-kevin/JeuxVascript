<?php $page = 'settings' ?>
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
            <form id="addAdmin" method="post" action="indexAdmin.php?action=registerAdmin">
            <?php
                    if(isset($errors)) :
                        if($errors):
                    foreach($errors as $error) :
                ?>

                    <h3><?= $error ?><h3>
                
                <?php endforeach; else : ?>
                
                    <h3>youpi ça marche<h3>
                
                <?php endif; endif ?>
                <label for="email">Email du nouvelle admin</label>
                <input type="email" value="<?php if(isset($_POST['email']))echo $_POST['email'] ?>" name="email">

                <label for="pseudo">Pseudo du nouvelle admin</label>
                <input type="text" value="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>" name="pseudo">

                <label for="password">Mot de passe</label>
                <input type="password" value="password" name="password">

                <label for="verifyPassword">Confirmer le mot de passe</label>
                <input type="password" value="verifyPassword" name="verifyPassword">

                <div id="settingsButton">
                    <button type="submit">Ajouter</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </article>
        <article id="deleteAdmin">
            <a href="indexAdmin.php?action=deleteAdmin&id=<?=$infos['id'] ?>">Supprimer mon compte</a>
        </article>
    </section>
</main>

<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>