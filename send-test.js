const nodemailer = require('nodemailer');

// Remplacez ces valeurs avec vos informations de test
const name = 'John Doe'; // Nom de test
const email = 'johndoe@example.com'; // Email de test
const message = 'Ceci est un message de test.'; // Message de test

// Fonction pour échapper les caractères HTML
function htmlEscape(text) {
  return text
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}

// Configuration du transporteur SMTP
const transporter = nodemailer.createTransport({
  host: 'smtp.zoho.eu',
  port: 587,
  secure: false, // Utilisez TLS
  auth: {
    user: 'rachid-meziyane@irrinat.com',
    pass: 'gangganG1!@&'
  }
});

// Données de l'email
const mailOptions = {
  from: '"IRRINAT" <rachid-meziyane@irrinat.com>',
  to: 'ayohsan@live.fr',
  subject: 'Nouveau Prospect Irrinat.com',
  html: `
    <h3>Informations prospect</h3>
    <p><strong>Nom:</strong> ${htmlEscape(name)}</p>
    <p><strong>Email:</strong> ${htmlEscape(email)}</p>
    <p><strong>Message:</strong><br>${htmlEscape(message).replace(/\n/g, '<br>')}</p>
  `
};

// Envoi de l'email
transporter.sendMail(mailOptions, (error, info) => {
  if (error) {
    return console.log('L\'email n\'a pas pu être envoyé. Erreur :', error);
  }
  console.log('Email envoyé :', info.response);
});

