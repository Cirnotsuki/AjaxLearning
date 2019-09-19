// terminal 输入node开启服务
var http = require("http");
// var strMeth = require("querystring");
var server = http.createServer(function (request,response) {
    var str="";
    request.on("data",function (_data) {
       str+=_data;
    });
    request.on("end",function () {
        var obj = JSON.parse(decodeURIComponent(str));
        // var obj = strMeth.parse(str);
        obj.age=Number(obj.age)+5;
        response.writeHeader(200,{"content-type":"text/html","Access-Control-Allow-Origin":"*"});
        response.write(JSON.stringify(obj));
        response.end();
    })
});
server.listen(12450,"192.168.0.106",function () {
    console.log("开启服务")
});