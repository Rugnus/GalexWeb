const http = require('http');
const fs = require('fs');
const path = require('path');
const PORT = 8080;

const server = http.createServer((req, res) => {
    res.writeHead(200, {
        'Content-Type': 'text/html',
        'Expires': '0'
    });
    fs.createReadStream(path.resolve(__dirname, 'index.html')).pipe(res)
})

server.listen(PORT, '0.0.0.0', () => {
    console.log('Server started!');
});