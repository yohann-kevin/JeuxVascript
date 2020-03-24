<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- lien vers les feuilles de style -->
    <link rel="stylesheet" href="app/public/style/header.css">
    <link rel="stylesheet" href="app/public/style/headerAdmin.css">
    <link rel="stylesheet" href="app/public/style/admin.css">
    <!-- <link rel="stylesheet" href="app/public/style/home.css"> -->
    <link rel="stylesheet" href="app/public/style/footer.css">
    <!-- icône -->
    <link rel="icon" href="app/public/images/logo/icone.png">
    
    <!-- Charge la bibliothèque jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin</title>
</head>

<header id="headerAdmin">
    <!-- <img src="Jeuxvacsript.png" alt="Jeuxvacsript"> -->
    <div id="logo">
        <a href="indexAdmin.php?action=admin">
            <img src="app/public/images/logo/admin.png" alt="Jeuxvacsript">
        </a>
    </div>
    <div id="smartphone">
        <img src="app/public/images/logo/menu.png" onclick="displayMenu()">
    </div>
    <!-- script temporaire -->
    <script type="text/javascript">   
        function displayMenu() {
            var menu = document.getElementById("nav");
            menu.style.display = "block";
        }
    </script>
    <nav id="navAdmin">
        <ul>
            <li class="fromLeft"><a href="indexAdmin.php?action=admin">Admin</a></li>
            <li class="fromLeft"><a href="indexAdmin.php?action=write">Rédiger</a></li>
            <li class="fromLeft"><a href="indexAdmin.php?action=modify">Modifier</a>
        </ul>
    </nav>
    
</header>