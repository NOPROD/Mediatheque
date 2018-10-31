<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

Class EnvoiMail
{
    public static function send($sujet, $messageHTML, $messageTexte, $piecejointe, $destinataire)
    {

//Create a new PHPMailer instance
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;
//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, 465 for ssl
        $mail->Port = 465;
//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "";
//Password to use for SMTP authentication
        $mail->Password = "";
//Set who the message is to be sent from
        $mail->setFrom('', 'Gestion Comptes');
//Set who the message is to be sent to
        $mail->addAddress("$destinataire", "$destinataire");
        //Set the subject line
        $mail->Subject = $sujet;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $mail->msgHTML("$messageHTML");
//Replace the plain text body with one created manually
        $mail->AltBody = $messageTexte;
//Attach an image file
        $mail->addAttachment("$piecejointe");
//send the message, check for errors
        if ($mail->send()) {
            return 'ok';
        } else {
            return 'ko';
        }
    }
}
