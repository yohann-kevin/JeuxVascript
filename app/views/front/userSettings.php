<?php  
$page = "";
$title = "Settings";
$description = "Modifier vos paramètres et personnaliser votre éxperience JeuxVascript";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
<?php  
$usersInfo = new \Project\controllers\ControllerFront();
$infos = $usersInfo->displayInfo();

if(!empty($_POST['email']) || !empty($_POST['pseudo'])){ 
    $usersModifyInfo = new \Project\controllers\ControllerFront();
    $modifyInfos = $usersModifyInfo->modifyInfo();  
}

if(!empty($_POST['password']) || !empty($_POST['newPassword']) || !empty($_POST['verifyNewPassword'])){ 
    $usersModifyPassword = new \Project\controllers\ControllerFront();
    $modifyPassword = $usersModifyPassword->modifyPassword();  
}
?>

    <main id="userSettings">
        <section id="pageUserSettings">
            <header id="userSettingsTitle">
                <h3>Modifier vos informations</h3>
                <h3>Vous pouvez changé votre adresse mail, votre pseudo, et votre mot de passe ici</h3>
            </header>
        </section>
        <section id="accountSettings">

            <form id="modifyInfo" method="post" action="" name="modifyInfo">
            <?php if(isset($errors)) :
                if($errors):
            foreach($errors as $error) : ?>
             <h3><?= $error ?><h3>
                
            <?php endforeach; else : ?>
                        
            <h3>youpi ça marche<h3>
                        
            <?php endif; endif ?>
                <label from="changeEmail">taper votre nouvelle email</label>
                <input id="changeEmail" name="email" type="email" placeholder="<?= $infos['email']?>" values="<?php if(isset($_POST['email']))echo $_POST['email'] ?>">
                <label from="newPseudo">Taper votre nouveau pseudo</label>
                <input id="newPseudo" name="pseudo" type="text" placeholder="<?= $infos['pseudo']?>" values="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>">
                <div class="buttonSettings">
                    <button type="submit">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>

            <form id="modifyPassword" method="post" action="" name="modifyPassword">
            <?php if(isset($errors)) :
                if($errors):
            foreach($errors as $error) : ?>
             <h3><?= $error ?><h3>
                
            <?php endforeach; else : ?>
                        
            <h3>youpi ça marche<h3>
                        
            <?php endif; endif ?>
                <label from="oldPassword">Taper votre ancien mot de passe</label>
                <input id="oldPassword" name="password" type="password" placeholder="Votre ancien mot de passe">   
                <label from="newPassword">Taper votre nouveau mot de passe</label>
                <input id="newPassword" name="newPassword" type="password" placeholder="Votre nouveau mot de passe">
                <label from="verifyNewPassword">Confirmer votre nouveau mot de passe</label>
                <input id="verifyNewPassword" name="verifyNewPassword" type="password" placeholder="Confirmer le mot de passe">
                <div class="buttonSettings">
                    <button type="submit">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
                
           
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>