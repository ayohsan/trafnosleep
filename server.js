const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const app = express();
const port = 3001;
const sendMail = require('./send-mail'); // Importer le fichier send_mail.js

// Middleware pour parser les requêtes POST
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Servir des fichiers statiques (HTML, CSS, JS)
app.use(express.static(__dirname));

// Route pour le formulaire de contact
app.post('/send-mail', (req, res) => {
  console.log('Requête POST reçue à /send-mail');
  console.log('Données reçues:', req.body); // Log les données pour débogage
  sendMail(req.body, (error, info) => {
    if (error) {
      console.error('Erreur lors de l\'envoi de l\'email:', error);
      return res.status(500).send('Erreur lors de l\'envoi de l\'email : ' + error.message);
    }
    // Rediriger vers la page de succès après envoi
    res.redirect('/success.html');
  });
});

// Démarrage du serveur
app.listen(port, '0.0.0.0',() => {
  console.log(`Serveur à l'écoute sur http://localhost:${port}`);
});
