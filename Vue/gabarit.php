<!DOCTYPE html>

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
            src="Contenu/Ressources/js/mustache.min.js"></script>

    <!-- X-TAG for PrimeElements -->
    <script type="text/javascript" src="Contenu/Ressources/primeui-4.1.15/x-tag-core.min.js"></script>
    <link rel="stylesheet" href="Contenu/Ressources/primeui-4.1.15/primeui.css"/>
    <script type="text/javascript" src="Contenu/Ressources/primeui-4.1.15/primeui.js"></script>
    <script type="text/javascript" src="Contenu/Ressources/primeui-4.1.15/primeelements.js"></script>
    <script src="Vue/Jscripts/style.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="style.css" />

    <title><?= $titre ?></title>

    <?= $script ?>


</head>
<body>

<div id="global">
    <header>
    <div id='entete'>

            <a href="index.php"><h1 id="titreSite">Mediatheque</h1></a>
            <p></p>
    </div>
    </header>

    <ul id="stickymenu">
        <li> <a data-icon="fa-home" href="Accueil.html" class="Accueil">Accueil</a>
        </li>
        <li><a data-icon="fa-book" href="Type.html" class="Type">Type</a></li>
        <li><a data-icon="fa-flag" href="Langue.html" class="Langue">Langue</a></li>
    </ul>





    <div id="contenu">

        <?= $contenu ?>
    </div>
</div>
    <footer id="foot">


    </footer>

</body>
</html>