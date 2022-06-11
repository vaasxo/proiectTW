const http = require('http')

const server = http.createServer((request, response) => {
    if(request.url === '/homepage' && request.method === 'GET') {
        response.writeHead(200, {'Content-Type': 'application/json'})
        response.end(JSON.stringify({message: 'hello'}))
    }
    else{
        response.writeHead(404, {'Content-Type': 'application/json'})
        response.end(JSON.stringify({message: 'page not found'}))
    }
})

const PORT = process.env.port || 5000

server.listen(PORT, () => console.log(`server running on port ${PORT}`))
