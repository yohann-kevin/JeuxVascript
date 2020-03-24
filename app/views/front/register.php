<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>

    <main id="register">

        <section class="pageTitle">
            <h1 class="title">Vous etes nouveaux <span class="strong">par ici</span></h1>
            <h2 class="subtitle"><span class="strong">Inscrivez-vous !</span></h2>
        </section>

        <section id="sectionRegister">
            <p id="paraRegister">Pour une expérience optimale JeuxVascript vous propose de vous inscrire afin 
                d'accéder a plein de nouvelles fonctionnalité, 
                vous pourrez enregistrer vos scores consultés vos statistiques sur vos différents jeux et 
                bien sûr vous aurez la possibilité de poster des articles sur notre espace blog de 
                commenter les articles d'autres joueurs etc...<p>

            <form id="registerForm">

                <div id="pseudoRegister">
                    <label from="emailContact">Votre email</label>
                    <input id="emailContact" name="emailContact" type="text" placeholder="Email">
                    <label from="firstNameContact">Votre pseudo</label>
                    <input id="firstNameContact" name="firstNameContact" type="text" placeholder="First name">
                   
                </div>

                <div id="passwordRegister">
                    <label from="passwordRegister">Votre mot de passe</label>
                    <input id="passwordRegister" name="passwordRegister" type="password" placeholder="password">
                    <label from="verifyPasswordRegister">Confirmer votre mot de passe</label>
                    <input id="verifyPasswordRegister" name="verifyPasswordRegister" type="password" placeholder="password">
                </div>

                <div id="buttonRegister">
                    <button type="submit" id="btnSubRegister">Envoyer</button>
                    <button type="reset" id="btnResRegister">Annuler</button>
                </div>

            </form>
        </section>
    </main>



<?php include_once 'app/views/front/layouts/footer.php'; ?>