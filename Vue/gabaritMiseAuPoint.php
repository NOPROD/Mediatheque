<!DOCTYPE html>

<?php
$titre="Titre";
$script="Script";
$contenu="Contenu";
?>

<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="Contenu/Ressources/primeui-4.1.15/themes/bluesky/theme.css"/>
    <link rel="stylesheet" type="text/css" href="Contenu/Ressources/jquery-ui-1.12.1/jquery-ui.css"/>

    <link rel="stylesheet" type="text/css" href="Contenu/Ressources/font-awesome-4.7.0/css/font-awesome.css"/>

    <script type="text/javascript" src="Contenu/Ressources/js/jquery.js"></script>
    <script type="text/javascript" src="Contenu/Ressources/js/jquery-ui.js"></script>


    <!-- Mustache for templating support -->
    <script type="text/javascript"
            src="../Contenu/Ressources/js/mustache.min.js"></script>

    <!-- X-TAG for PrimeElements -->
    <script type="text/javascript" src="../Contenu/Ressources/primeui-4.1.15/x-tag-core.min.js"></script>
    <link rel="stylesheet" href="Contenu/Ressources/primeui-4.1.15/primeui.css"/>
    <script type="text/javascript" src="Contenu/Ressources/primeui-4.1.15/primeui.js"></script>
    <script type="text/javascript" src="Contenu/Ressources/primeui-4.1.15/primeelements.js"></script>

    <link rel="stylesheet" type="text/css" href="../Contenu/style.css" />

    <title><?= $titre ?></title>

    <?= $script ?>


</head>
<body>

<div id="global">
    <div id="messages"></div>
    <div id='entete'>
        <header>
            <a href="index.php"><h1 id="titreSite">TEST EN GRAND</h1></a>
            <p>Test entete</p>
        </header>
    </div>


    <div id="menu">
        <a href="vueAccueil.html" class="titreAccueil">Accueil</a>
        <a href="Billet.html" class="testbillet">test2</a>
        <a href="Article.html" class="testArticle">blabla</a>
    </div>
    <div id="corps">

        <?php echo session_id();?>


        <div id="contenu">

            <?= $contenu ?>
        </div>
    </div>
    <footer id="pied">
        TEST EN PETIT
        <?php echo realpath("Vue\gabarit.php"); ?>
    </footer>
</div>
</body>
</html>