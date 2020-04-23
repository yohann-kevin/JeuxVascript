<?php
$page = "";
$title = "Register";
$description = "Inscrivez-vous afin de profiter de l'intégralié des fonctionnalités de JeuxVascript";
include_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; 
    // if(!empty($_POST)){
    //     $register = new \Project\controllers\ControllerFront();
    //     $errors = $register->registerUsers();
    // }
?>

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

            <form method="post" action="index.php?action=registerUsers" id="registerForm">
                <?php
                    if(isset($errors)) :
                        if($errors):
                    foreach($errors as $error) :
                ?>

                    <h3><?= $error ?><h3>
                
                <?php endforeach; else : ?>
                
                    <h3>youpi ça marche<h3>
                
                <?php endif; endif ?>
                
                <div id="pseudoRegister">
                    <label for="emailContact">Votre email</label>
                    <input id="emailContact" name="email" type="email" placeholder="Email" values="<?php if(isset($_POST['email']))echo $_POST['email'] ?>">
                    <label for="firstNameContact">Votre pseudo</label>
                    <input id="firstNameContact" name="pseudo" type="text" placeholder="First name" values="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>">
                   
                </div>

                <div id="passwordRegister">
                    <label for="passwordRegister">Votre mot de passe</label>
                    <input id="passwordRegister" name="password" type="password" placeholder="password">
                    <label for="verifyPasswordRegister">Confirmer votre mot de passe</label>
                    <input id="verifyPasswordRegister" name="verifyPassword" type="password" placeholder="password">
                </div>

                <div id="buttonRegister">
                    <button type="submit" id="btnSubRegister">Envoyer</button>
                    <button type="reset" id="btnResRegister">Annuler</button>
                </div>

            </form>
        </section>
    </main>



<?php include_once 'app/views/front/layouts/footer.php'; ?>