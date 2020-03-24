<body>
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