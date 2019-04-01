<?php

include_once './Server.php';
/**
 * Description of UserServer
 *
 * @author pcwang
 */
class UserServer extends Server{
    public function __construct() {
        parent::__construct();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function run() {
        parent::run();

        switch ($this->_request->type){
            case "USER_LOGIN":
                $this->login();
                break;
            case "USER_REGISTER":
                $this->register();
                break;
            case "FRIENDS_GET":
//                var_dump("friends_get");
                $this->getFriends();
                break;
        }
    }
    
    protected function login(){
        
        $sql = "select count(1) from qq_user where username=$1 and password=md5($2)";
        $result = pg_query_params($this->_connection,$sql,array(
            $this->_request->params->username,
            $this->_request->params->password
        ));
        $row = pg_fetch_row($result);
        if(intval($row[0]) === 1){
            $this->makeResponse(true, "Login success");
        }else{
            $this->makeResponse(false, "Login failed");
        }
        pg_free_result($result);
    }
    
    protected function register(){
        $this->makeResponse(true, "register ok");
    }
    
    protected function getFriends(){
        $username = $this->_request->params->username;
        $sql = "select user2 from qq_friendship where user1='$username';";
        $result = pg_query($this->_connection, $sql);
        $row = pg_fetch_all($result);
        $this->makeResponse(TRUE, "成功得到好友", $row);
    }
}
