<?php include_once 'app/views/front/layouts/head.php'; 
include_once 'app/views/front/layouts/header.php'; ?>
    <!-- page modifier -->
    <main id="pageUsersModify">
        <!-- section titre -->
        <section id="usersModifyTitle">
            <h2>modifier votre propre article pour le poster dans l'espace communautaire de JeuxVascript</h2>
        <section>
        <!-- formualire de modification d'article -->
        <form id="formUsersModify" method="post" action="" enctype="multipart/form-data">
            <div id="modifyError">
                <?php if(isset($errors)) :
                        if($errors):
                foreach($errors as $error) : ?>
                <h3><?= $error ?><h3>  
                <?php endforeach; else : ?>      
                <h3>Votre article à bien été modifier<h3>  
                <?php endif; endif ?>
            </div>

            <div id="usersModifyName">
                <label for="title">Titre :</label>
                <input type="text" name="title" placeholder="title" value="<?php echo($article['title']); if(isset($_POST['title']))echo $_POST['title'] ?>" required>
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
                <input type="file" name="file" placeholder="Parcourir..." required>
            </div>

            <div id="usersModifyContent">
                <label for="content">Rédiger votre article</label>
                <textarea name="content" value="<?php if(isset($_POST['content']))echo $_POST['content'] ?>"><?= $article['content'] ?></textarea>
            </div>
            
            <div id="buttonUsersModify">
                <button type="submit" id="btnSubUsersModify">Envoyer</button>
                <button type="reset" id="btnResUsersModify">Annuler</button>
            </div>
        </form>
    </main>
<?php  include_once 'app/views/front/layouts/footer.php' ?>