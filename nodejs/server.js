/**
 *Name: Alauddin F-a
 *Designation: Software Engineer
 *Date: 02-Dec-20 2:28 PM
 */
/*var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
const cors = require('cors');
app.use(cors());

server.listen(8890);
app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
// app.set('view engine', 'ejs');
io.on('connection', function (socket) {

    console.log("client connected");
    var redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message", function(channel, data) {
        console.log("mew message add in queue "+ data['message'] + " channel");
        socket.emit(channel, data);
    });

    socket.on('disconnect', function() {
        redisClient.quit();
    });

});*/
/*const express = require('express')
const path = require('path')
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

console.log("outside io");

io.on('connection', function(socket){

    console.log('User Conncetion');

    socket.on('connect user', function(user){
        console.log("Connected user ");
        io.emit('connect user', user);
    });

    socket.on('on typing', function(typing){
        console.log("Typing.... ");
        io.emit('on typing', typing);
    });

    socket.on('chat message', function(msg){
        console.log("Message " + msg['message']);
        io.emit('chat message', msg);
    });
});

http.listen(app.get('port'), function() {
    console.log('Node app is running on port', app.get('port'));
});*/
var baseURL               = getBaseURL(); // Call function to determine it
var socketIOPort          = 8080;
var socketIOLocation      = baseURL + socketIOPort; // Build Socket.IO location
var socket                = io.connect(socketIOLocation);

// Build the user-specific path to the socket.io server, so it works both on 'localhost' and a 'real domain'
function getBaseURL()
{
    baseURL = location.protocol + "//" + location.hostname + ":" + location.port;
    return baseURL;
}
