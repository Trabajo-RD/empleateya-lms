var WebSocketServer = require("websocket").server;
var http = require("http");
var htmlEntity = require("html-entities");
var PORT = 3280;

// List of currently connected clients (users)
var clients = [];

// Create http server
var server = http.createServer();

server.listen(PORT, function(){
    console.log("Server is listening in PORT:" + PORT);
});

// Create the websocket
wsServer = new WebSocketServer({
    httpServer: server
});

/**
 * The websocket server
 */
wsServer.on("request", function(request){
    var connection = request.accept(null, request.origin);

    // Pass each connection instance to each client
    var index = clients.push(connection) - 1;
    console.log('Client', index, "connected");

    /**
     * This is where the send message to all the clients connected
     */
    connection.on("message", function(message){
        console.log("message");
    });

    /**
     * When the client closes its connection to the websocket server
     */
    connection.on("close", function(connection){
        clients.splice(index, 1);
        console.log("Client", index, "was disconnected");
    });
});
