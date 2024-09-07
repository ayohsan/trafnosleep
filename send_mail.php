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
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utiliser TLS
    $mail->Port = 587; // Port SMTP

    // Expéditeur et destinataire
    $mail->setFrom('rachid-meziyane@irrinat.com', 'IRRINAT');
    $mail->addAddress('rachid-meziyane@irrinat.com', 'Client'); // Remplacez par l'adresse du destinataire

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Nouveau message de contact';
    $mail->Body    = '<h3>Contact Form Submission</h3>' .
                      '<p><strong>Nom:</strong> ' . htmlspecialchars($_POST['name']) . '</p>' .
                      '<p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>' .
                      '<p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($_POST['message'])) . '</p>';
    $mail->AltBody = 'Nom: ' . htmlspecialchars($_POST['name']) . '\n' .
                     'Email: ' . htmlspecialchars($_POST['email']) . '\n' .
                     'Message: ' . htmlspecialchars($_POST['message']);

    $mail->send();
    echo 'L\'email a été envoyé avec succès.';
} catch (Exception $e) {
    echo 'Le message n\'a pas pu être envoyé. Mailer Error: ', $mail->ErrorInfo;
}
?>
