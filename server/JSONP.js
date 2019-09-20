// terminal 输入node开启服务
var http = require("http");
var strMeth = require("querystring");
var server = http.createServer(function (request,response) {
    request.on("data",function () {

    });
    request.on("end",function () {
        var obj = strMeth.parse(request.url.split("?")[1]);
        response.writeHeader(200,{"content-type":"text/plain"});
        console.log(obj.a,obj.b,obj.fn);
        obj.a = Number(obj.a)+10;
        obj.b = Number(obj.b)+20;
        response.write(obj.fn+"("+obj.a+","+obj.b+")");
        response.end();

    })
});
server.listen(3003,"192.168.0.106",function () {
    console.log("开启服务")
});