<?php $page = 'settings' ?>
<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php include_once 'app/views/back/layouts/headerAdmin.php'; ?>
<main id="settings">
    <!-- page sttings pour l'admin -->
    <section>
        <header id="headerSettings">
            <h1>Settings</h1>
            <h2>sur cette page vous pouvez ajouter un autre administrateur ,
                si il y a plusieurs administrateur vous pouvez supprimer votre compte</h2>
        </header>
        <!-- article permmettant d'ajouter un nouvel admin -->
        <article id="newAdmin">
            <form id="addAdmin" method="post" action="indexAdmin.php?action=registerAdmin">
                <?php if(isset($errors)) :
                        if($errors):
                foreach($errors as $error) :?>
                <h3><?= $error ?><h3>
                <?php endforeach; else : ?>
                <h3>Le nouvel admin a bien été enregistrer<h3>
                <?php endif; endif ?>
                <label for="adminEmail">Email du nouvelle admin</label>
                <input id="adminEmail" type="email" value="<?php if(isset($_POST['email']))echo $_POST['email'] ?>" name="email" required>
                <span id="forgetAdminEmail"></span>

                <label for="pseudoNewAdmin">Pseudo du nouvelle admin</label>
                <input id="pseudoNewAdmin" type="text" value="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>" name="pseudo" required>
                <span id="forgetNewAdminPseudo"></span>

                <label for="passNewAdmin">Mot de passe</label>
                <input id="passNewAdmin" type="password" name="password" required>
                <span id="forgetPassNewAdmin"></span>

                <label for="verifyPassAdmin">Confirmer le mot de passe</label>
                <input id="verifyPassAdmin" type="password" name="verifyPassword" required>
                <span id="forgetVerifyPasAdmin"></span>

                <div id="settingsButton">
                    <button type="submit" id="btnNewAdmin">Ajouter</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </article>
        <!-- article permettant de supprimer son compte -->
        <article id="deleteAdmin">
            <a href="indexAdmin.php?action=deleteAdmin&id=<?=$infos['id'] ?>">Supprimer mon compte</a>
        </article>
    </section>
</main>
<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>