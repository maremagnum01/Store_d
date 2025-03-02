// server.js
const { createServer } = require('http');
const { parse } = require('url');
const { exec } = require('child_process');

const server = createServer((req, res) => {
  const { pathname } = parse(req.url, true);

  // Rutas que deseas manejar
  if (pathname === '/api') {
    // Aquí puedes ejecutar el backend de Laravel a través de un proceso PHP
    exec('php artisan serve', (err, stdout, stderr) => {
      if (err) {
        res.statusCode = 500;
        res.end(`Error: ${stderr}`);
        return;
      }
      res.statusCode = 200;
      res.end(stdout);
    });
  } else {
    // Si no es la ruta de la API, redirige a Vercel a la ruta predeterminada
    res.statusCode = 200;
    res.end('Laravel está ejecutándose.');
  }
});

server.listen(3000, () => {
  console.log('Servidor ejecutándose en http://localhost:3000');
});
