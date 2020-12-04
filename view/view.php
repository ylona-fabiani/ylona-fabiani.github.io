<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/cssindex.css">
		<title><?php echo "BioSurfers"; ?></title>
        <script src="./amongUS/amongUs.js">
            start();
        </script>
	</head>
	<body>
    <div class="tout">
        <div><a href="?controller=accueil"><img src="./css/img/_logo.png" alt="logo BioSurfers" class="logo"</a></div>
        <div class="presquetout">
            <div class="connexions">
            <?=(isset($_SESSION['login'])) ? "<div><a href='?action=read&controller=utilisateur&login=".$_SESSION['login']."'>Profil</a></div>" : ""?>
            <?=(!isset($_SESSION['login'])) ? "<div><a href='?action=create&controller=utilisateur'>Inscription</a></div>" : ""?>
            <?=(!isset($_SESSION['login'])) ? "<div><a href='?action=connect&controller=utilisateur'>Connexion</a></div>" : ""?>
            <?=(isset($_SESSION['login'])) ? "<div><a href='?action=deconnect&controller=utilisateur'>Deconnexion</a></div>" : ""?>
            </div>

            <header>
                <nav>
                    <div><a href="?controller=accueil">Accueil</a></div>
                    <div><a href="#">Spots</a>
                        <div class="submenu">
                            <div><a href="?action=readAll&controller=spot">Liste</a></div>
                            <?=(isset($_SESSION['login'])) ? "<div><a href='?action=create&controller=spot'>Créateur</a></div>" : ""?>
                        </div>
                    </div>
                    <div><a href="#">Comptes Rendus</a>
                        <div class="submenu">
                            <div><a href="?action=readAll&controller=CompteRendu">Liste</a></div>
                            <?=(isset($_SESSION['login'])) ? "<div><a href='?action=create&controller=CompteRendu'>Créateur</a></div>" : ""?>
                        </div>
                    </div>
                    <div><a href="?controller=apropos">A Propos</a></div>
                    <div><a href="?controller=contact">Contact</a></div>
                </nav>
            </header>
        </div>
    </div>



    <main>
        <p>
            <?php
            $filepath = File::build_path(array("view", static::$controller, "$view.php"));
            require $filepath;
            ?>
        </p>
    </main>


	<footer>
        <p onclick="alert('Tu as éliminé ' + calculerMort() +' personnes')">Afficher mon nombre de meurtre!</p>
        <p>
            © Site BioSurfers <img src="./amongUS/img/vert.png" id="vert" onclick="tuerVert()" style="height: 2%; width: 2%">
        </p>
	</footer>
	</body>
</html>
