<?php  
$page = "";
$title = "Article";
$description = "";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
<?php
$singleArticle = new \Project\controllers\ControllerFront();
$article = $singleArticle->article(); 

$date = new \Project\controllers\ControllerFront();
?>

    <main id="pageArticle">
        <section>
            <header id="articleHeader">
                <h2 id="articleTitle"><?= $article['title'] ?><h2>
            </header>
            <div id="article">
                <img src="app/public/images/articles/<?= $article['images'] ?>" alt="<?= $article['images'] ?>" id="articleImg">
                <div id="articleContent">
                    <h4 id="articlePseudo">Rédigé par plop le <?= $date->dateFormating($article['created_date'])?></h4>
                    <p id="articlePara"><?= $article['content'] ?></p>
                <div>
            </div>
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>