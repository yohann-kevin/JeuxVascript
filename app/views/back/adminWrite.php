<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php include_once 'app/views/back/layouts/headerAdmin.php'; ?>

<main id="pageAdminWrite">
    
    <section id="adminWriteTitle">
        <h2>rédiger votre propre article pour le poster dans l'espace communautaire de JeuxVascript</h2>
    <section>

    <form id="formAdminWrite">
        <div id="adminWriteName">
            <label for="title">Titre :</label>
            <input type="text" name="title" placeholder="title">
        </div>
        <div id="adminSelectImg">
            <label for="img">Choisisser une image</label>
            <input type="file" name="img" value="image" placeholder="Parcourir...">
        </div>
        <div id="adminWriteContent">
            <label for="Content">Rédiger votre article</label>
            <textarea name="Content"></textarea>
        </div>
        <div id="buttonAdminWrite">
            <button type="submit" id="btnSubAdminWrite">Envoyer</button>
            <button type="reset" id="btnResAdminWrite">Annuler</button>
        </div>
    </form>

</main>


<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>