// terminal 输入node开启服务
var http = require("http");
var strMeth = require("querystring");
var server = http.createServer(function (request,response) {
    request.on("data",function () {
        
    });
    request.on("end",function () {
        var obj = strMeth.parse(request.url.split("?")[1]);
        obj.age=Number(obj.age)+5;
        response.writeHeader(200,{"content-type":"text/html","Access-Control-Allow-Origin":"*"});
        response.write(JSON.stringify(obj));
        response.end();
        console.log(request.url)
    })
});
server.listen(450,"192.168.0.106",function () {
    console.log("开启服务")
});