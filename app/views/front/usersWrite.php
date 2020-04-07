<?php 
$page = "";
$title = "Writing";
$description = "Rédiger vos propres articles et poster les sur JeuxVascript afin que tout le monde puisse les voirs";
include_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; 
// $usersCategory = new \Project\controllers\ControllerFront();
// $categorys = $usersCategory->displayCategory(); 

if(!empty($_POST)){ 
    $postArticle = new \Project\controllers\ControllerFront();
    $errors = $postArticle->usersPostArticle();  
}
?>
<main id="pageUsersWrite">
    
    <section id="usersWriteTitle">
        <h2>rédiger votre propre article pour le poster dans l'espace communautaire de JeuxVascript</h2>
    <section>

    <form id="formUsersWrite" method="post" action="" enctype="multipart/form-data">

        <?php
            if(isset($errors)) :
                if($errors):
            foreach($errors as $error) :
        ?>

        <h3><?= $error ?><h3>
                
        <?php endforeach; else : ?>
                
        <h3>youpi ça marche<h3>
                
        <?php endif; endif ?>


        <div id="usersWriteName">
            <label for="title">Titre :</label>
            <input type="text" name="title" placeholder="title" value="<?php if(isset($_POST['title']))echo $_POST['title'] ?>">
        </div>
        <div id="usersSelectCategory">
            <label for="selectCategory">Choisisser une catégories:</label>
            <select name="category_id" id="selectCategory">
                <option value="">--Choisisser une catégories--</option>
                <option value="1">pixel-art</option>
                <option value="2">monde de l'indé</option>
                <option value="3">nouveaux jeux</option>
                <option value="4">rétro</option>
                <option value="5">au secours</option>
                <option value="6">divers</option>
                <?php if(isset($_POST['category_id'])) echo $_POST['category_id']; ?>
            </select>
        </div>
        <div id="usersSelectImg">
            <label for="img">Choisisser une image</label>
            <input type="file" name="file" placeholder="Parcourir...">
        </div>
        <div id="usersWriteContent">
            <label for="content">Rédiger votre article</label>
            <textarea name="content" value="<?php if(isset($_POST['content']))echo $_POST['content'] ?>"></textarea>
        </div>
        <div id="buttonUsersWrite">
            <button type="submit" id="btnSubUsersWrite">Envoyer</button>
            <button type="reset" id="btnResUsersWrite">Annuler</button>
        </div>
    </form>

</main>

<?php  include_once 'app/views/front/layouts/footer.php' ?>