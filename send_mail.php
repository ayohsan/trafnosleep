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
    $mail->addAddress('ayohsan@live.fr', 'DG'); // Adresse du destinataire
    

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Nouveau Prospect Irrinat.com';
    $mail->Body    = '<h3>Informations prospect</h3>' .
                     '<p><strong>Nom:</strong> ' . htmlspecialchars($_POST['name']) . '</p>' .
                     '<p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>' .
                     '<p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($_POST['message'])) . '</p>';

    // Envoyer l'email
    $mail->send();
    // Redirection ou affichage du succès
    header('Location: success.php'); // Remplacez par le nom du fichier où vous voulez rediriger après l'envoi
    exit();
} catch (Exception $e) {
    // Gestion des erreurs
    echo "L'email n'a pas pu être envoyé. Erreur : ", $mail->ErrorInfo;
}
?>
