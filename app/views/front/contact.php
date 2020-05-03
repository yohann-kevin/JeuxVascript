<?php 
$page = 'contact';
$title = "Contact";
$description = "Vous avez quelques choses a nous dire ? N'hesitez pas,contacter nous.";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
    <main id="contact">

        <section class="pageTitle">
            <h1 class="title">Vous avez quelques <span class="strong">choses a nous dire ?</span></h1>
            <h2 class="subtitle">N'hesitez pas, <span class="strong">contacter nous.</span></h2>
        </section>

        <section id="sectionContact">
            <p id="paraContact">Vous avez une suggestion à nous faire ? Ou alors vous avez trouver un bug dans un de nos jeux ?
                 Ou bien vous voulez juste papoter comme ça entre deux partie de snake ! 
                 Eh bien, allez-y envoyer nous votre message via le formulaire ci-dessous, 
                 nous tacherons de vous répondre au plus vite !</p>

            
            
            <form id="contactForm" method="post" action="">

            <?php
                if(isset($errors)) :
                    if($errors):
                foreach($errors as $error) :
            ?>

            <?= $error ?>

            <?php endforeach; else : ?>

            <p>votre message a bien été envoyer</p>

            <?php endif; endif ?>

                <div id="nameContact">
                    <label from="firstNameContact">Votre prenom</label>
                    <input id="firstNameContact" name="name" type="text" placeholder="First name" 
                        value='<?php if(isset($_POST['name']))echo $_POST['name'] ?>'>
                    <label from="emailContact">Votre email</label>
                    <input id="emailContact" name="email" type="text" placeholder="Email"
                        value='<?php if(isset($_POST['email']))echo $_POST['email'] ?>'>
                </div>
                <div id="messageContact">
                    <label from="message">Votre message</label>
                    <input type="text" name="objetMessage" placeholder="objet" id="objetMessage">
                    <textarea name="content" id="message" placeholder="Your message..."
                        value='<?php if(isset($_POST['content']))echo $_POST['content'] ?>'></textarea>
                </div>
                <div id="buttonContact">
                    <button type="submit" id="btnSubContact">Envoyer</button>
                    <button type="reset" id="btnResContact">Annuler</button>
                </div>
            </form>

            



        </section>

        <section id="findUs">
            <header id="findUsTitle">
                <h3>Nous trouver<h3>
            </header>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.930240644158!2d-2.7743341808006945!3d47.646922423849475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48101c1e45bf9d89%3A0xf1b4ec0fcc4d768d!2s20%20Rue%20Winston%20Churchill%2C%2056000%20Vannes!5e0!3m2!1sfr!2sfr!4v1573737469116!5m2!1sfr!2sfr" 
                width="600" height="350" frameborder="0" style="border:0;"></iframe>
                <address id="address">
                    <span id="titleProject">JeuxVascrirpt</span><br>
                    20 rue Winston Churchill<br>
                    56000 Vannes<br>
                    <a href="tel:+33297466666">02 97 46 66 66 </a><br>
                </address>
        </section>

    </main>

<?php require_once 'app/views/front/layouts/footer.php'; ?>