var http = require('http');
var url = require('url');
var path = require('path');
var fs = require('fs');

var server = http.createServer(function(req, res){
	var pathname = url.parse(req.url).pathname;
	var realpath = "assets" + pathname;
	console.log(realpath);
	fs.exists(realpath, function(exists){
		if(!exists){
			res.writeHead(404,{'Content-Type': 'text/plain'});
			res.write("你访问的目录:" + pathname + "不合法...!");
			res.end();
		}else{
			fs.readFile(realpath, "binary", function(err, file){
			  if(err){
				res.writeHead(500,{'Content-Type': 'text/plain'});
				res.end(err);
			  }else{
				res.writeHead(200);
				res.write(file, "binary");
				res.end();
			  }
			});
			
				
			
			
		}
	});
	// var html = "";

	// res.writeHead(200,{'Content-Type': 'text/html'});
	// res.write(html);
	// res.end();
});
server.listen(8888);