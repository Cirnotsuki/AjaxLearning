// 聊天服务器
var http = require("http");
var msglist = [];
var server = http.createServer(function (request,response) {
    var str="";
    request.on("data",function (_data) {
        str+=_data;
    });
    request.on("end",function () {
        var obj = JSON.parse(decodeURIComponent(str));
        if(obj.type ===1){
            if(msglist>200){
                msglist.shift();
            }
            msglist.push({name:obj.name,msg:obj.msg,date:obj.date})
        }
        response.writeHeader(200,{"content-type":"text/html","Access-Control-Allow-Origin":"*"});
        response.write(JSON.stringify({result:msglist,error:null}));
        response.end();
    })
});
server.listen(9527,"192.168.0.106",function () {
    console.log("开启服务")
});