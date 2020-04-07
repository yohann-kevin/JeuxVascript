<?php  
$page = "";
$title = "ERROR404";
$description = "ERREUR 404 La page que vous cherchez n'éxiste pas ou plus !";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>

    <main id="error404">
        <section id="pageError404">
            <img src="app/public/images/logo/error404.jpg" id="imgError404"/>
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>
