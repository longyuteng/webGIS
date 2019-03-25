<?php

//get the parameters
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
//connect to the db sever 
$constr = "host=127.0.0.1 port=5432 dbname=gisdb  user=postgres password=Ljj135488";
$conn = pg_connect($constr);
if (!$conn) {
    echo json_encode(array(
        "success" => false
    ));
    exit(1);
}
//construt a sql statenet
$sql = "select count(1) from gis_users where username='{$username}'and passward='{$password}'";
//send the statement to db sever
$result = pg_query($conn, $sql);
$row = pg_fetch_row($result, 0);
if (intval($row[0]) === 1) {
    echo json_encode(array(
        "success" => true,
        "username" => $username
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "sorry,the username you input don't existed"
    ));
}
pg_free_result($result);
pg_close($conn);


