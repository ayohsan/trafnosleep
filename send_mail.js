const nodemailer = require('nodemailer');

// Créer un transporteur SMTP
const transporter = nodemailer.createTransport({
  host: 'smtp.zoho.eu',
  port: 587,
  secure: false, // Utiliser TLS
  auth: {
    user: 'rachid-meziyane@irrinat.com',
    pass: 'gangganG1!@&'
  }
});

// Fonction pour envoyer un email
function sendMail(mailData, callback) {
  console.log('Données pour l\'email:', mailData);
  const mailOptions = {
    from: '"IRRINAT" <rachid-meziyane@irrinat.com>',
    to: 'rachid-meziyane@irrinat.com, irrinat-rachid@outlook.com',
    subject: 'Nouveau Prospect Irrinat.com',
    html: `
      <h3>Informations prospect</h3>
      <p><strong>Nom:</strong> ${htmlEscape(mailData.name)}</p>
      <p><strong>Email:</strong> ${htmlEscape(mailData.email)}</p>
      <p><strong>Message:</strong><br>${htmlEscape(mailData.message).replace(/\n/g, '<br>')}</p>
    `
  };

  transporter.sendMail(mailOptions, callback);
}

// Fonction pour échapper les caractères HTML
function htmlEscape(text) {
  return text
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}

module.exports = sendMail;
