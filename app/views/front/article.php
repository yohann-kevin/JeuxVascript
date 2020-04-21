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

$comment = new \Project\controllers\ControllerFront();
$comments = $comment->displayCom(); 

if(!empty($_POST)){
    $commentPost = new \Project\controllers\ControllerFront();
    $error = $commentPost->postCom(); 
}
?>
    <?php if(!empty($article)) : ?>
    <main id="pageArticle">
        <section>
            <header id="articleHeader">
                <h2 id="articleTitle"><?= $article['title'] ?><h2>
            </header>
            <div id="article">
                <img src="app/public/images/articles/<?= $article['images'] ?>" alt="<?= $article['images'] ?>" id="articleImg">
                <div id="articleContent">
                    <h4 id="articlePseudo">Rédigé par <?= $article['pseudo'] ?> le <?= $date->dateFormating($article['created_date'])?></h4>
                    <p id="articlePara"><?= $article['content'] ?></p>
                <div>
            </div>
        </section>
        <?php if(isset($_SESSION['user'])) : ?>
        <div id="sectionComment">
            <section id="spaceComment">
                <h2>Commentaires :</h2>
                <?php foreach ($comments as $comment): ?>
                <article class="comment">
                    <h3>posté par <?= $comment['pseudo'] ?> le : <?= $date->dateFormating($comment['created_date'])?></h3>
                    <p><?= $comment['content']?></p>
                </article>
                <?php endforeach ?>
            </section>
            

            <section id="postComment">
                <h2>Réagisser à cette article en postant un commentaire</h2>
                <form method="post" action="" id="writeComment">
                    <?php if(isset($error)) : 
                        if($error) : 
                    ?>
                    <h3><?= $error ?></h3>
                    <?php
                    else :
                    ?>
                    <h3>Votre Commentaire a bien été ajouter</h3>
                    <?php
                    endif;
                    endif
                    ?>
                    <textarea name="contentComment" placeholder="Votre commentaire *"></textarea>
                    <input type="submit" value="commenter">
                </form>
            </section>
        </div>
        <?php endif ; ?>
    </main>
    <?php endif ; ?>

<?php include_once 'app/views/front/layouts/footer.php'; ?>