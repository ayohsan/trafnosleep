const nodemailer = require('nodemailer');

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
  to: 'rachid-meziyane@irrinat.com, irrinat-rachid@outlook.com',
  subject: 'Nouveau Prospect Irrinat.com',
  html: `
    <h3>Informations prospect</h3>
    <p><strong>Nom:</strong> ${htmlEscape(req.body.name)}</p>
    <p><strong>Email:</strong> ${htmlEscape(req.body.email)}</p>
    <p><strong>Message:</strong><br>${htmlEscape(req.body.message).replace(/\n/g, '<br>')}</p>
  `
};

// Fonction pour échapper les caractères HTML
function htmlEscape(text) {
  return text
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}

// Envoi de l'email
transporter.sendMail(mailOptions, (error, info) => {
  if (error) {
    return console.log('L\'email n\'a pas pu être envoyé. Erreur :', error);
  }
  console.log('Email envoyé :', info.response);
  // Vous pouvez ajouter une redirection ou une autre logique ici
});

