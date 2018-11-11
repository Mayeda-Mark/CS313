var http = require('http');

function onRequest(req, res) {
	if (req.url == "/home") {
		res.writeHead(200, {"Content-Type": "text/html"});
		res.write("<h1>Welcome to my Homepage</h1>");
		res.end();
	}
	else if(req.url == "/getData"){
		'use strict';
		res.writeHead(200, {"Content-Type": "application/json"});
		var fs = require('fs');
		let info = {
			name: 'Mark Mayeda',
			class: 'cs313'
		};
		let data = JSON.stringify(info);
		fs.writeFileSync('file.json', data);

		let rawdata = fs.readFileSync('file.json');
		let me = JSON.parse(rawdata);
		console.log(me);
		res.write("JSON file written and displayed in console");
		res.end();
	}
	else{
		res.write("<h1>Error 404: <br> Page Not Found</h1>");
		res.end();
	}
}

var server = http.createServer(onRequest);
server.listen(8888);