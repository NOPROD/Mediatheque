<?php
$this->titre = "Vos Media";
$this->script = '<script src="Vue/Jscripts/mediaScript.js" type="text/javascript"></script>';


$rech = json_decode($recherche);
echo ' <h3 class="title title-short">Rechercher un Media</h3>
            <select id="comboActeur" name="acteur">
                <option value="0" selected="selected">Choisissez un Acteur</option>
            </select>
            <select id="comboGenre" name="genre">
                <option value="0" selected="selected">Choisissez un Genre</option>
            </select>
            <select id="comboLangue" name="langue">
                <option value="0" selected="selected">Choisissez une Langue</option>
            </select>
            <select id="comboFormat" name="format">
                <option value="0" selected="selected">Choisissez un Format</option>
            </select>
            <select id="comboType" name="type">
                <option value="0" selected="selected">Choisissez un Type</option>
            </select>
            <select id="comboStatut" name="statut">
                <option value="0" selected="selected">Choisissez un Statut</option>
            </select>
            <select id="comboCentre" name="Centre">
                <option value="0" selected="selected">Choisissez un Centre</option>
            </select>
           <select  id="comboLignesParPages" name="lignesParPages">
                <option value="5"' . (($rech->lignesParPages == 5) ? " selected" : "") . '>5 articles / page</option>
                <option value="10"' . (($rech->lignesParPages == 10) ? " selected" : "") . '>10 articles / page</option>
                <option value="15"' . (($rech->lignesParPages == 15) ? " selected" : "") . '>15 articles / page</option>
                <option value="20"' . (($rech->lignesParPages == 20) ? " selected" : "") . '>20 articles / page</option>
                <option value="50"' . (($rech->lignesParPages == 50) ? " selected" : "") . '>50 articles / page</option>
            </select>
            <input type="hidden" id="total">
            <input type="hidden" value = "0" id="numPage"/>';

echo "<div class='matable'>";


echo "<div id='pag'></div>";
echo "<table id='tableMedia'>\n";
echo "<tr><th class='id'>ISBN</th><th class = 'nom' id='nbMedia'>Media</th><th class ='AchatExpress'></th></tr>";

echo "</table>";

echo "</div>";
?>

<script>
    $(document).ready(refreshMedia());

    recherche = <?php echo $recherche; ?>;
    acteur = <?php echo $acteur; ?>;
    genre = <?php echo $genre; ?>;
    langue = <?php echo $langue; ?>;
    format = <?php echo $format; ?>;
    type = <?php echo $type; ?>;
    statut = <?php echo $statut; ?>;
    centre = <?php echo $centre; ?>;

    afficheCombos(acteur, genre, langue, format, type, statut, centre, recherche);
    $('input[name="numPage"]').val(recherche.numPage);
</script>