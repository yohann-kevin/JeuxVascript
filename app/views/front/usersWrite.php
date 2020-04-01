<?php include_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
<main id="pageUsersWrite">
    
    <section id="usersWriteTitle">
        <h2>rédiger votre propre article pour le poster dans l'espace communautaire de JeuxVascript</h2>
    <section>

    <form id="formUsersWrite">
        <div id="usersWriteName">
            <label for="title">Titre :</label>
            <input type="text" name="title" placeholder="title">
        </div>
        <div id="usersSelectImg">
            <label for="img">Choisisser une image</label>
            <input type="file" name="img" value="image" placeholder="Parcourir...">
        </div>
        <div id="usersWriteContent">
            <label for="Content">Rédiger votre article</label>
            <textarea name="Content"></textarea>
        </div>
        <div id="buttonUsersWrite">
            <button type="submit" id="btnSubUsersWrite">Envoyer</button>
            <button type="reset" id="btnResUsersWrite">Annuler</button>
        </div>
    </form>

</main>

<?php include_once 'app/views/front/layouts/footer.php' ?>