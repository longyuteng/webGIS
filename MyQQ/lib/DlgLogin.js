var username = "";

DlgLogin = function (opts) {
    var me = this;

    me._usernameID = uuid();
    me._passwordID = uuid();

    me._dlg = $("#" + opts.div).html(
            "   <label>用户名</label><br>"
            + " <input id='" + me._usernameID + "' class='ui-corner-all' type='text'/><br>"
            + " <label>密码</label><br>"
            + " <input id='" + me._passwordID + "' class='ui-corner-all' type='password'/>"
            ).dialog({
        height: 250,
        width: 350,
        modal: true,
        buttons: [{
                text: "登录",
                click: function () {
                    me._onLogin();
                }
            }, {
                text: "取消",
                click:function(){
                    me._dlg.dialog("close");
                }
            },{
                text:"注册",
                        click:function(){
                    window.location.href="register.html";
                }
            }]
    });
};


DlgLogin.prototype._onLogin = function () {
    var me = this;

    Connector({
        data: {
            type: "USER_LOGIN",
            params: {
                username: $("#" + me._usernameID).val(),
                password: $("#" + me._passwordID).val()
            }
        },
        success:function(json){
            me._dlg.dialog("close");
//            me._onSkip();
            $("#myqq").removeClass("hidden");
            me._getFriends();
            // show friends list
        }
    });
    
    username = $("#" + me._usernameID).val();
};

DlgLogin.prototype._onSkip = function () {
    var me = this;
    window.location.href="list.html";
};

DlgLogin.prototype._getFriends = function(){
    var me = this;

    Connector({
        data: {
            type: "FRIENDS_GET",
            params: {
                username: username
            }
        },
        success:function(json){
            data = json["data"];
            for (var i = 0; i<data.length; i++){
                $("div#nav").append(function(){
                    return data[i]["user2"]+'<br>';
                })
            }
        }
    });
}





