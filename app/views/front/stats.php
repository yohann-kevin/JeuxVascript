<?php 
$page = "";
$title = "Stats";
$description = "Consulter vos statistiques et garder un oeil sur votre progréssion";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>

    <main id="stats">
        <section id="pageStats">
            <header id="statsTitle">
                <h3>Bientot vous pourrez consulter vos stats ici</h3>
                <h3>Page en production</h3>
            </header>
            <canvas id="myChart" width="400" height="200"></canvas>
            <script>
               
            </script>
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>