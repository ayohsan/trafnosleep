<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que le chemin est correct

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP(); 
    $mail->Host = 'smtp.zoho.eu'; // Remplacez par l'hôte SMTP de votre serveur
    $mail->SMTPAuth = true; 
    $mail->Username = 'rachid-meziyane@irrinat.com'; // Remplacez par votre adresse e-mail
    $mail->Password = 'gangganG1!@&'; // Remplacez par votre mot de passe
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utiliser TLS, modifiez si nécessaire
    $mail->Port = 587; // Port SMTP, modifiez si nécessaire

    // Expéditeur et destinataire
    $mail->setFrom('rachid-meziyane@irrinat.com', 'IRRINAT');
    $mail->addAddress('ayohsan@live.fr', 'Client'); // Remplacez par l'adresse du destinataire

    // Contenu
    $mail->isHTML(true); 
    $mail->Subject = 'Test d\'envoi d\'e-mail';
    $mail->Body    = 'Ceci est un test pour vérifier l\'envoi d\'e-mail via <b>PHPMailer</b>.';
    $mail->AltBody = 'Ceci est un test pour vérifier l\'envoi d\'e-mail via PHPMailer.';

    $mail->send();
    echo 'L\'email a été envoyé avec succès.';
} catch (Exception $e) {
    echo 'Le message n\'a pas pu être envoyé. Mailer Error: ', $mail->ErrorInfo;
}
?>
