<?php include_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; ?>
    <!-- page d'inscription -->
    <main id="register">
        <!-- section titre -->
        <section class="pageTitle">
            <h1 class="title">Vous etes nouveaux <span class="strong">par ici</span></h1>
            <h2 class="subtitle"><span class="strong">Inscrivez-vous !</span></h2>
        </section>
        <!-- section permettant de s'inscrire -->
        <section id="sectionRegister">
            <p id="paraRegister">Pour une expérience optimale JeuxVascript vous propose de vous inscrire afin 
                d'accéder a plein de nouvelles fonctionnalité, 
                vous pourrez enregistrer vos scores consultés vos statistiques sur vos différents jeux et 
                bien sûr vous aurez la possibilité de poster des articles sur notre espace blog de 
                commenter les articles d'autres joueurs etc...<p>
            <!-- formulaire d'inscription -->
            <form method="post" action="index.php?action=registerUsers" id="registerForm">
                <?php
                    if(isset($errors)) :
                        if($errors):
                    foreach($errors as $error) :
                ?>
                <h3><?= $error ?><h3>
                <?php endforeach; else : ?>
                <h3>Votre compte à bien été crée<h3>
                <?php endif; endif ?>
                <!-- input pour le pseudo et le mail -->
                <div id="pseudoRegister">
                    <label for="emailRegister">Votre email</label>
                    <input id="emailRegister" name="email" type="email" placeholder="Email" values="<?php if(isset($_POST['email']))echo $_POST['email'] ?>" required>
                    <span id="forgetEmailRegister"></span>
                    <label for="firstNameRegister">Votre pseudo</label>
                    <input id="firstNameRegister" name="pseudo" type="text" placeholder="First name" values="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>" required>
                    <span id="forgetPseudoRegister"></span>
                </div>
                <!-- input pour le mdp -->
                <div id="passwordRegister">
                    <label for="passwordRegister">Votre mot de passe</label>
                    <input id="passwordRegister" name="password" type="password" placeholder="password" required>
                    <span id="forgetPasswordRegister"></span>
                    <label for="verifyPasswordRegister">Confirmer votre mot de passe</label>
                    <input id="verifyPasswordRegister" name="verifyPassword" type="password" placeholder="password" required>
                    <span id="forgetPassConfRegister"></span>
                </div>
                <!-- bouton d'envoie de formulaire -->
                <div id="buttonRegister">
                    <button type="submit" id="btnSubRegister">Envoyer</button>
                    <button type="reset" id="btnResRegister">Annuler</button>
                </div>
            </form>
        </section>
    </main>
<?php include_once 'app/views/front/layouts/footer.php'; ?>