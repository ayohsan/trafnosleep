const http = require('http');

// Création du serveur
const server = http.createServer((req, res) => {
  res.writeHead(200, {'Content-Type': 'text/html'});
  res.end('<html><body><h1>Bonjour ! Ceci est un test en JavaScript avec Node.js.</h1></body></html>');
});

// Le serveur écoute sur le port 3000
server.listen(3000, () => {
  console.log('Serveur en fonctionnement sur http://localhost:3000/');
});


