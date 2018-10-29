var typeSelected = new Object();
function afficheTableau(src, ancre)
{

    typeSelected.id = 0;

    $(function () {
        $(ancre).puidatatable({
            caption: 'Resultat de la Requête DAO',
            paginator: {
                rows : 10
            },
            columns: [
                {field: 'id', headerText:'Id', sortable: true},
                {field: 'nom', headerText: 'Nom', sortable: true},
            ],
            datasource: src,
            selectionMode: 'single',
            rowSelect: function (event, data) {
                $('#messages').puigrowl('show', [{severity: 'info', summary:'Row selected', detail: (typeSelected.id + "->" + data.id + '' + data.nom)}]);
                typeSelected = data;
            },
            rowUnselect: function (event, data) {
                $('#messages').puigrowl('show', [{severity: 'info', summary: 'Row Unselected', detail: (data.id + ' ' + data.nom)}]);

            }
        });
        $('#messages').puigrowl();
    });
}
function afficheSelected()
{
    alert (typeSelected.id + " "+ typeSelected.nom);
}