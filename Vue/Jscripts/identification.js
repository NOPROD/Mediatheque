function identification()
{
    var ligne = "<div id='dlg' title='Identification'>" +
        "<label for='user'>Login :</label><input type='text' is='p-inputtext' value='' size='30' id = 'user'/><br><br>" +
        "<label for='password'>Mot de passe :</label><input type='password' is='p-inputtext' value='' size='30' id = 'password'/><br><br>" +
        "<div id ='nouveau'></div><p-messages id=\"msgs\"></p-messages></div>";
    $('body').html(ligne);
    $('#dlg').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: false,
        maximizable: false,
        responsive: true,
        closable: false,
        width: 420,
        modal: true,
        buttons: [{
            text: 'S\'identifier',
            icon: 'fa-key',
            click: function () {
                //  Début
                recherche = new Object();
                recherche.user = $('#user').val();
                recherche.password = $('#password').val();
                $.ajax({
                    // url du programme à executer
                    url: 'Ajax/validate.php',
                    // type d'envoi des paramètres ('POST' ou 'GET')
                    type: 'POST',
                    // Données envoyées avec la requête
                    data: recherche,
                    // Format du retour
                    dataType: 'json',
                    // En cas de réussite
                    // la variable retour est un array qui contiendra le résultat envoyé par le programme ajaxArticle.php
                    success: function (retour) {
                        //alert(retour);
                        if (retour == 'ok') window.location = document.location;
                        else document.getElementById('msgs').show('info', {
                            summary: 'Login ou mot de passe incorrect !!!<br>',
                            detail: '<br><button is="p-button" icon="fa-tags" onclick="login()">Rappel Login</button> ' +
                            '<button is="p-button" icon="fa-refresh" onclick="password()">Mot de Passe</button>'
                        });
                        ;
                    }
                });
            }
        },
            {
                text: 'Créer compte',
                icon: 'fa-user',
                click: function () {
                    nouveauCompte();
                }
            }
        ]
    });
    $('#dlg').puidialog('show');
}

function password()
{
    var ligne = "<div id='dlg' title='Reinitialisation du mot de passe'>" +
        "<label for='user'>Login :</label><input type='text' is='p-inputtext' value='' size='30' id = 'user'/><br><br>" +
        "<div id ='nouveau'></div><p-messages id=\"msgs\"></p-messages></div>";
    $('body').html(ligne);
    $('#dlg').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: false,
        maximizable: false,
        responsive: true,
        closable: false,
        width: 450,
        modal: true,
        buttons: [{
            text: 'Envoyer',
            icon: 'fa-send',
            click: function () {
                //  Début
                recherche = new Object();
                recherche.user = $('#user').val();
                $.ajax({
                    // url du programme à executer
                    url: 'Ajax/reinitialisePassword.php',
                    // type d'envoi des paramètres ('POST' ou 'GET')
                    type: 'POST',
                    // Données envoyées avec la requête
                    data: recherche,
                    // Format du retour
                    dataType: 'json',
                    // En cas de réussite
                    // la variable retour est un array qui contiendra le résultat envoyé par le programme ajaxArticle.php
                    success: function (retour) {
                        if (retour == 'ok')
                        {
                            document.getElementById('msgs').show('info', {
                                summary: 'Un lien de reinitialisation a été envoyé <br>',
                                detail: '<br> à l\'adresse de contact associée au compte : <i>' + recherche.user + '</i>'
                            });
                            setTimeout(function () {
                                window.location = document.location
                            }, 100);
                        }
                        else
                        {
                            document.getElementById('msgs').show('info', {
                                summary: 'Ce compte n\'existe pas !!!<br>',
                                detail: ''
                            });
                        }
                    }
                });
            }
        }
        ]
    });
    $('#dlg').puidialog('show');
}

function login()
{
    var ligne = "<div id='dlg' title='Envoi des identifiants'>" +
        "<label for='email'>Email :</label><input type='text' is='p-inputtext' value='' size='30' id = 'email' onblur='verifMail(this)'/><br><br>" +
        "<div id ='nouveau'></div><p-messages id=\"msgs\"></p-messages></div>";
    $('body').html(ligne);
    $('#dlg').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: false,
        maximizable: false,
        responsive: true,
        closable: false,
        width: 450,
        modal: true,
        buttons: [{
            text: 'Envoyer',
            icon: 'fa-send',
            click: function () {
                //  Début
                recherche = new Object();
                recherche.email = $('#email').val();
                if (!verifMail(document.getElementById('email')))
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'adresse mail non conforme !!!',
                        detail: ''
                    });
                }
                else
                {
                    $.ajax({
                        // url du programme à executer
                        url: 'Ajax/renvoiLogin.php',
                        // type d'envoi des paramètres ('POST' ou 'GET')
                        type: 'POST',
                        // Données envoyées avec la requête
                        data: recherche,
                        // Format du retour
                        dataType: 'json',
                        // En cas de réussite
                        // la variable retour est un array qui contiendra le résultat envoyé par le programme ajaxArticle.php
                        success: function (retour) {
                            if (retour == 'ok')
                            {
                                document.getElementById('msgs').show('info', {
                                    summary: 'Vos indentifiants on été envoyés à <br>',
                                    detail: '<br>' + recherche.email
                                });
                                setTimeout(function () {
                                    window.location = document.location
                                }, 100);
                            }
                            else
                            {
                                document.getElementById('msgs').show('info', {
                                    summary: 'Aucun compte n\'est rattaché à cet adresse !!!<br>',
                                    detail: ''
                                });
                            }
                        }
                    });
                }
            }
        }
        ]
    });
    $('#dlg').puidialog('show');
}


function nouveauCompte()
{
    var ligne = "<div id='dlg' title='Nouveau compte'>" +
        "<label for='user'>Login :</label><input type='text' is='p-inputtext' value='' size='30' id = 'user' onblur='verifLogin(this)'/><br><br>" +
        "<label for='user'>Email :</label><input type='text' is='p-inputtext' value='' size='30' id = 'email' onblur='verifMail(this)'/><br><br>" +
        "<label for='password'>Mot de passe :</label><input type='password' is='p-password' value='' size='30' id = 'password' onblur='verifPassword(this)'/><br><br>" +
        "<label for='password2'>Confirmation :</label><input type='password' is='p-password' value='' size='30' id = 'password2' onblur='verifPassword(this)'/><br><br>" +
        "<div id ='nouveau'></div><p-messages id=\"msgs\"></p-messages></div>";
    $('body').html(ligne);
    $('#dlg').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: false,
        maximizable: false,
        responsive: true,
        closable: false,
        width: 420,
        modal: true,
        buttons: [{
            text: 'Créer',
            icon: 'fa-key',
            click: function () {
                //  Début
                recherche = new Object();
                recherche.user = $('#user').val();
                recherche.password = $('#password').val();
                recherche.password2 = $('#password2').val();
                recherche.email = $('#email').val();
                if (!verifLogin(document.getElementById('user')))
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'Le Login n\'est pas valide !!!',
                        detail: 'Il ne doit comporter que des caractères et avoir une longueur de 4 à 8 caractères'
                    });
                }
                else if (!verifMail(document.getElementById('email')))
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'L\'adresse mail n\'est pas correcte !!!',
                        detail: ''
                    });
                }
                else if (!verifPassword(document.getElementById('password')))
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'Mot de passe trop simple',
                        detail: '<p>il doit contenir au moins 6 caractètres et :</p><ul><li>une majuscule</li><li>une minuscule</li><li>un chiffre</li><li>et un caractère spécial</li></ul>'
                    });
                }
                else if (recherche.password === recherche.password2)
                {
                    $.ajax({
                        // url du programme à executer
                        url: 'Ajax/newCompte.php',
                        // type d'envoi des paramètres ('POST' ou 'GET')
                        type: 'POST',
                        // Données envoyées avec la requête
                        data: recherche,
                        // Format du retour
                        dataType: 'json',
                        // En cas de réussite
                        // la variable retour est un array qui contiendra le résultat envoyé par le programme ajaxArticle.php
                        success: function (retour) {
                            if (retour == 'ok')
                            {
                                document.getElementById('msgs').show('info', {
                                    summary: 'Un mail de confirmation a été envoyé à :<br>',
                                    detail: '<br>' + recherche.email
                                });
                                setTimeout(function () {
                                    window.location = document.location
                                }, 100);
                            }
                            else
                            {
                                document.getElementById('msgs').show('info', {
                                    summary: 'Le compte existe déjà !!!<br>',
                                    detail: ''
                                });
                            }
                        }
                    });
                }
                else
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'Mots de passe différents !!!',
                        detail: ''
                    });
                }
            }
        }
        ]
    });
    $('#dlg').puidialog('show');
}

function changePass(compte)
{
    var ligne = "<div id='dlg' title='Réinitialiser Mot de passe'>" +
        "<p>Nouveau mot de passe pour : <b>" + compte.user + "</b></p><br>" +
        "<label for='password'>Mot de passe :</label><input type='password' is='p-password' value='' size='30' id = 'password' onblur='verifPassword(this)'/><br><br>" +
        "<label for='password2'>Confirmation :</label><input type='password' is='p-password' value='' size='30' id = 'password2' onblur='verifPassword(this)'/><br><br>" +
        "<div id ='nouveau'></div><p-messages id=\"msgs\"></p-messages></div>";
    $('body').html(ligne);
    $('#dlg').puidialog({
        showEffect: 'fade',
        hideEffect: 'fade',
        minimizable: false,
        maximizable: false,
        responsive: true,
        closable: false,
        width: 420,
        modal: true,
        buttons: [{
            text: 'Créer',
            icon: 'fa-key',
            click: function () {
                //  Début
                recherche = new Object();
                recherche.user = compte.user;

                compte.password = $('#password').val();
                compte.password2 = $('#password2').val();
                if (!verifPassword(document.getElementById('password')))
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'Mot de passe trop simple',
                        detail: '<p>il doit contenir au moins :</p><ul><li>une majuscule</li><li>une minuscule</li><li>un chiffre</li><li>et un caractère spécial</li></ul>'
                    });
                }
                else if (compte.password === compte.password2)
                {
                    $.ajax({
                        // url du programme à executer
                        url: 'Ajax/modifPassword.php',
                        // type d'envoi des paramètres ('POST' ou 'GET')
                        type: 'POST',
                        // Données envoyées avec la requête
                        data: compte,
                        // Format du retour
                        dataType: 'json',
                        // En cas de réussite
                        // la variable retour est un array qui contiendra le résultat envoyé par le programme ajaxArticle.php
                        success: function (retour) {
                            if (retour == 'ok')
                            {
                                document.getElementById('msgs').show('info', {
                                    summary: 'Votre mot de passe a été modifié avec succès<br>',
                                    detail: '<br>'
                                });
                                setTimeout(function () {
                                    window.location = 'index.php'
                                }, 100);
                            }
                            else
                            {
                                document.getElementById('msgs').show('info', {
                                    summary: 'Le lien a déjà été utilisé !!!<br>',
                                    detail: ''
                                });
                                setTimeout(function () {
                                    window.location = 'index.php'
                                }, 100);
                            }
                        }
                    });
                }
                else
                {
                    document.getElementById('msgs').show('info', {
                        summary: 'Mots de passe différents !!!',
                        detail: ''
                    });
                }
            }
        }
        ]
    });
    $('#dlg').puidialog('show');
}

function verifMail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

function verifPassword(champ)
{
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/;
    if (!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

function verifLogin(champ)
{
    var regex = /^[a-z,A-Z]{4,8}$/;
    if (!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

function surligne(champ, erreur)
{
    if (erreur)
        champ.style.backgroundColor = "#fba";
    else
        champ.style.backgroundColor = "";
}