<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
    <!-- page settigns de l'utilisateur -->
    <main id="userSettings">
        <!-- section titre -->
        <section id="pageUserSettings">
            <header id="userSettingsTitle">
                <h3>Modifier vos informations</h3>
                <h3>Vous pouvez changé votre adresse mail, votre pseudo, et votre mot de passe ici</h3>
            </header>
        </section>
        <!-- section permettant de modifier les infos et le mdp de l'utilisateur -->
        <section id="accountSettings">
            <!-- formulaire pour les infos -->
            <form id="modifyInfo" method="post" action="" name="modifyInfo">
            <?php if(isset($errors)) :
                if($errors):
            foreach($errors as $error) : ?>
             <h3><?= $error ?><h3>
            <?php endforeach; else : ?>           
            <h3>youpi ça marche<h3>
            <?php endif; endif ?>
                <label from="changeEmail">taper votre nouvelle email</label>
                <input id="changeEmail" name="email" type="email" placeholder="<?= $infos['email']?>" values="<?php if(isset($_POST['email']))echo $_POST['email'] ?>" required>
                <span id="forgetNewEmail"></span>
                <label from="newPseudo">Taper votre nouveau pseudo</label>
                <input id="newPseudo" name="pseudo" type="text" placeholder="<?= $infos['pseudo']?>" values="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>" required>
                <span id="forgetNewPseudo"></span>
                <div class="buttonSettings">
                    <button type="submit" id="btnModifyInfo">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
            <!-- formulaire pour le mot de passe -->
            <form id="modifyPassword" method="post" action="" name="modifyPassword">
            <?php if(isset($errors)) :
                if($errors):
            foreach($errors as $error) : ?>
            <h3><?= $error ?><h3>   
            <?php endforeach; else : ?>           
            <h3>youpi ça marche<h3>           
            <?php endif; endif ?>
                <label from="oldPassword">Taper votre ancien mot de passe</label>
                <input id="oldPassword" name="password" type="password" placeholder="Votre ancien mot de passe" required>   
                <span id="forgetOldPassword"></span>
                <label from="newPassword">Taper votre nouveau mot de passe</label>
                <input id="newPassword" name="newPassword" type="password" placeholder="Votre nouveau mot de passe" required>
                <span id="forgetNewPassword"></span>
                <label from="verifyNewPassword">Confirmer votre nouveau mot de passe</label>
                <input id="verifyNewPassword" name="verifyNewPassword" type="password" placeholder="Confirmer le mot de passe" required>
                <span id="forgetNewPassConf"></span>
                <div class="buttonSettings">
                    <button type="submit" id="btnSubPass">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </section>
        <!-- bouton permettant de suprimer son compte -->
        <section id="deleteAccount">
            <p>Si vous le souhaitez vous pouvez supprimer votre 
            compte, l'intégralité de vos information seront supprimer</p>
            <a href="index.php?action=deleteUsers&id=<?=$infos['id'] ?>">Supprimer mon compte</a>
        </section>
    </main>
<?php include_once 'app/views/front/layouts/footer.php'; ?>