$(document).ready(function () {
    //当 DOM（文档对象模型） 已经加载，并且页面（包括图像）已经完全呈现时，会发生 ready 事件。
    //     $("#submit").on("click", function () {
    //on() 方法在被选元素及子元素上添加一个或多个事件处理程序。向 <id="submit"> 元素添加 click 事件处理程序
    //      onRegister();
    //    });
    // });
    $("#submit").click(function () {
        if (($("#username").val() !== '') && ($("#password").val() !== '') && ($("#realname").val() !== '') && ($("#email").val() !== '') && ($("#mobile").val() !== '')){
            onRegister();
        }else {
            alert("请完善信息！");
        }
        
    });

    $("#login").click(function () {
        onLogin();
    });
    
    $("#password1").blur(function(){
       if ($("#password").val() !== $("#password1").val()){
           alert('两次密码应该一致')
       }
    }); 
});
function onRegister() {
    $.ajax({
        //ajax方法通过 HTTP 请求加载远程数据。
        type: "POST",
        //默认值: "GET")。请求方式 ("POST" 或 "GET")， 默认为 "GET"。注意：其它 HTTP 请求方法，如 PUT 和 DELETE 也可以使用，但仅部分浏览器支持。
        url: "php/register.php",
        //类型：String 默认值: 当前页地址。发送请求的地址。
        data: {
            username: $("#username").val(),
            password: $("#password").val(),
            realname: $("#realname").val(),
            email: $("#email").val(),
            mobile: $("#mobile").val()
        },
        //发送到服务器的数据。将自动转换为请求字符串格式。GET 请求中将附加在 URL 后。

        success: function (data) {
            console.log(data);
            alert(data);
        },
        /*success类型：Function,请求成功后的回调函数。
         * 参数：由服务器返回，并根据 dataType 参数进行处理后的数据；描述状态的字符串。*/
        error: function (data) {
            console.log("asdfasf");
            alert("failed");
        }
        /*类型：Function默认值: 自动判断 (xml 或 html)。请求失败时调用此函数。
         有以下三个参数：XMLHttpRequest 对象、错误信息、（可选）捕获的异常对象。
         如果发生了错误，错误信息（第二个参数）除了得到 null 之外，
         还可能是 "timeout", "error", "notmodified" 和 "parsererror"。这是一个 Ajax 事件。*/
    });
}

function onLogin() {

    $.ajax({
        //ajax方法通过 HTTP 请求加载远程数据。
        type: "POST",
        //默认值: "GET")。请求方式 ("POST" 或 "GET")， 默认为 "GET"。注意：其它 HTTP 请求方法，如 PUT 和 DELETE 也可以使用，但仅部分浏览器支持。
        url: "php/login.php",
        //类型：String 默认值: 当前页地址。发送请求的地址。
        data: {
            username: $("#username").val(),
            password: $("#password").val()
        },
        //发送到服务器的数据。将自动转换为请求字符串格式。GET 请求中将附加在 URL 后。

        success: function (data) {
            alert(data);
        },
        /*success类型：Function,请求成功后的回调函数。
         * 参数：由服务器返回，并根据 dataType 参数进行处理后的数据；描述状态的字符串。*/
        error: function (data) {
            console.log("asdfasf");
            alert("failed");
        }
        /*类型：Function默认值: 自动判断 (xml 或 html)。请求失败时调用此函数。
         有以下三个参数：XMLHttpRequest 对象、错误信息、（可选）捕获的异常对象。
         如果发生了错误，错误信息（第二个参数）除了得到 null 之外，
         还可能是 "timeout", "error", "notmodified" 和 "parsererror"。这是一个 Ajax 事件。*/
    });
}


