// Gestion des Combos de recherche
function afficheCombos(acteur, genre, langue, format, type, statut, centre, recherche)
{
    $(function () {

        $('#comboLignesParPages').puidropdown({
            change: (function () {
                refreshMedia();
            })
        });
        for (item in acteur)
        {
            $('#comboActeur').append('<option value="' + acteur[item].id + '">' + acteur[item].nom + '</option>');
        }
        for (item in genre)
        {
            $('#comboGenre').append('<option value="' + genre[item].id + '">' + genre[item].nom + '</option>');
        }
        for (item in langue)
        {
            $('#comboLangue').append('<option value="' + langue[item].id + '">' + langue[item].nom + '</option>');
        }
        for (item in format)
        {
            $('#comboFormat').append('<option value="' + format[item].id + '">' + format[item].nom + '</option>');
        }
        for (item in type)
        {
            $('#comboType').append('<option value="' + type[item].id + '">' + type[item].nom + '</option>');
        }
        for (item in statut)
        {
            $('#comboStatut').append('<option value="' + statut[item].id + '">' + statut[item].nom + '</option>');
        }
        for (item in centre)
        {
            $('#comboCentre').append('<option value="' + centre[item].id + '">' + centre[item].nom + '</option>');
        }


        $('#comboActeur').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });
        $('#comboGenre').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });
        $('#comboLangue').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });
        $('#comboFormat').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });
        $('#comboType').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });
        $('#comboStatut').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });
        $('#comboCentre').puidropdown({
            change: (function () {
                $('input[id="numPage"]').val(0);
                refreshMedia();
            })
        });

        $('#comboActeur').puidropdown('selectValue', recherche.acteur);
        $('#comboGenre').puidropdown('selectValue', recherche.genre);
        $('#comboLangue').puidropdown('selectValue', recherche.langue);
        $('#comboFormat').puidropdown('selectValue', recherche.format);
        $('#comboType').puidropdown('selectValue', recherche.type);
        $('#comboStatut').puidropdown('selectValue', recherche.statut);
        $('#comboCentre').puidropdown('selectValue', recherche.centre);

        $('#comboLignesParPages').puidropdown('selectValue', recherche.lignesParPages);
    });
}


function pagination()
{
    //
    $(function () {
        $('#pag').puipaginator({
            totalRecords: recherche.total,
            rows: recherche.lignesParPages,
            page: parseInt(recherche.numPage),
            pageLinks: 5,
            paginate: function (event, state) {
                if (state.page != recherche.numPage)
                {
                    $('input[id="numPage"]').val(state.page);
                    refreshMedia();
                }
            }
        });
    });
}

function refreshMedia()
{
    // récupération des critères de recherche
    recherche = new Object();





    recherche.acteur = $('#comboActeur option:selected').val();
    recherche.genre = $('#comboGenre option:selected').val();
    recherche.langue = $('#comboLangue option:selected').val();
    recherche.format = $('#comboFormat option:selected').val();
    recherche.type = $('#comboType option:selected').val();
    recherche.statut = $('#comboStatut option:selected').val();
    recherche.centre = $('#comboCentre option:selected').val();

    recherche.numPage = $('#numPage').val();
    recherche.lignesParPages = $('#comboLignesParPages option:selected').val();
    recherche.total = $('#total').val();
    // Requete AJAX
    $.ajax({
        // url du programme à executer
        url: 'Ajax/ajaxMedia.php',
        // type d'envoi des paramètres ('POST' ou 'GET')
        type: 'POST',
        // Données envoyées avec la requête
        data: recherche,
        // Format du retour
        dataType: 'json',
        // En cas de réussite
        // la variable retour est un array qui contiendra le résultat envoyé par le programme ajaxArticle.php
        success: function (retour) {
            // On recupère le nombre total d'enregistrements correspondants à la requête
            recherche.total = retour[retour.length - 1];
            $('#nbMedia').html("Media (" + recherche.total + ")");
            // On met à jour le champ caché d'Id total
            $('input[id="total"]').val(recherche.total);
            // on supprime toutes les lignes (tr) qui sont parentes des lignes de detail du tableau d'Id tableArtiste
            $('#tableMedia td').parent('tr').remove();
            // On Actualise la pagination
            pagination();
            // On balaie tous les éléments du tableau retour

            if (retour.length == 1)
            {
                $('#tableMedia').append('<tr><td colspan="4" align="center"><b>Désolé aucun media ne correspond à votre sélection !!!</td></tr>');
            }
            else
            {
                for (i = 0; i < retour.length - 1; i++)
                {
                    a = retour[i];
                    // On prépare la ligne de détail
                    ligne = "<tr><td>" + a.id + "</td><td>" + a.nom + "</td><td><button value =' " + a.id + "' onclick= 'ajoutePanier(" + JSON.stringify(a) + ");'>Acheter</button></td></tr>";
                    // on ajoute la ligne de détail au tableau tableArtiste
                    $('#tableMedia').append(ligne);
                }
            }
        }
    });
}

function ajoutePanier(ligne)
{
    alert(ligne.id + " - " + ligne.nom + " Ajouté au Panier");
    //$.post("index.php?action=ajoutPanier", ligne);
}


