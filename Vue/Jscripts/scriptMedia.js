function refreshArticles(){

    recherche = new Object();
    recherche.id = $('#comboId option:selected').val();
    recherche.auteur = $('#comboAuteur option:selected').val();
    recherche.date = $('#comboDate option:selected').val();
    recherche.numPage = $('#NumPages').val();
    recherche.lignesParPages = $('comboLignesParPages option:selected').val();
    recherche.total = $('#total').val();
    $.ajax({
        url : 'Ajax/ajaxMedia.php',
        type: 'POST',
        data: recherche,
        dataType: 'json',
        success: function (retour) {
            recherche.total = retour[retour.length - 1];
            $('#nbBillet').html("Billets (" + recherche.total + ")");
            $('input[id="total"]').val(recherche.total);
            $('#tableBillet td').parent('tr').remove();
            pagination();

            if (retour.lentgh == 1)
            {
                $('#tableBillet').append('<td><td colspan="4" align="center"<b>Désolé aucun billet n correspond a votre selection !!!</b></td></tr>')
            }
            else
            {
                for (i = 0; i < retour.length - 1; i++)
                {
                    a = retour[i];
                    ligne = "<tr><td>" + a.id + "</td><td>" + a.nom + "</td>";
                }
            }

        }
    })
}