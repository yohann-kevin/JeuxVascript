<?php  
$page = "";
$title = "Settings";
$description = "Modifier vos paramètres et personnaliser votre éxperience JeuxVascript";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>

    <main id="userSettings">
        <section id="pageUserSettings">
            <header id="userSettingsTitle">
                <h3>Modifier vos informations</h3>
                <h3>Vous pouvez changé votre adresse mail, votre pseudo, et votre mot de passe ici</h3>
            </header>
        </section>
        <section id="accountSettings">

            <form id="modifyInfo">
                <label from="changeEmail">taper votre nouvelle email</label>
                <input id="changeEmail" name="changeEmail" type="email" placeholder="Email" values="">
                <label from="newPseudo">Taper votre nouveau pseudo</label>
                <input id="newPseudo" name="newPseudo" type="text" placeholder="First name" values="">
                <div class="buttonSettings">
                    <button type="submit">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>

            <form id="modifyPassword">
                <label from="oldPassword">Taper votre ancien mot de passe</label>
                <input id="oldPassword" name="oldPassword" type="password" placeholder="Votre ancien mot de passe">   
                <label from="newPassword">Taper votre nouveau mot de passe</label>
                <input id="newPassword" name="newPassword" type="password" placeholder="password">
                <label from="verifyNewPassword">Confirmer votre nouveau mot de passe</label>
                <input id="verifyNewPassword" name="verifyNewPassword" type="password" placeholder="password">
                <div class="buttonSettings">
                    <button type="submit">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
                
           
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>