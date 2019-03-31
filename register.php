
<?php

//$connectster = "host=127.0.0.1 port=5432 dbname=gisdb user=postgres password=Ljj135488";
//$conn = @pg_connect($connectster);
//echo $conn;
// echo $target;
//if ($target === "login") {
//    $email = $_REQUEST['email'];
//    $passward = $_REQUEST['passward'];
//    $sql = "SELECT count(1) FROM users WHERE email= '$email' AND passward= '$passward'";
//    // echo $sql;
//    $result = @pg_query($con, $sql);
//    $row = @pg_fetch_row($result, 0);
//    // echo  $row[0];
//
//    if (intval($row[0]) === 1) {
//        $sql = "SELECT relname FROM users WHERE email= '$email' AND passward= '$passward'";
//        $result = @pg_query($con, $sql);
//        $row = @pg_fetch_row($result, 0);
//        echo "Welcome " . $row[0] . '!';
//    } else {
//        // echo $target;
//        echo "No this account";
//    };
//    pg_free_result($result);
//} else {
//    // echo $target;
//    $email = $_REQUEST['email'];
//    $passward = $_REQUEST['passward'];
//    $relName = $_REQUEST['relName'];
//    $telephone = $_REQUEST['telephone'];
//    $sql = "SELECT count(1) FROM users WHERE email= '$email'";
//    $result = @pg_query($con, $sql);
//    $row = @pg_fetch_row($result, 0);
//    if (intval($row[0]) === 1) {
//        echo "Account already exists！";
//    } else {
//        $sql = "INSERT INTO users(email, passward, relName, telephone) VALUES ('$email', '$passward', '$relName', '$telephone')";
//        $result = @pg_query($con, $sql);
//        // $row = pg_fetch_row($result, 0);
//        echo "Success register";
//    }
//    pg_free_result($result);
//}
//
//pg_close($con);


include_once 'DBConfig.php';
$connstr = " host=" . HOST . " port=" . PORT . " dbname=" . DBNAME . " user=" . USER . " password=" . PASSWORD;
$conn = pg_connect($connstr);
//echo $conn;
if ($conn) {
//    echo json_encode(array(
//        "success" => false,
//        "message" => "Can't connect to db server!"
//    ));
//    exit(1);
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $email = $_REQUEST["email"];
    $mobile = $_REQUEST["mobile"];
    $sql = "SELECT count(1) FROM qq_user WHERE username= '$username'";
    echo $sql;
    $result = @pg_query($conn, $sql);
    echo $result;
    $row = @pg_fetch_row($result, 1);
    echo $row;
    if (intval($row[0]) === 1) {
        echo "Account already exists！";
    } else {
        $sql = "INSERT INTO qq_user (username,password,mobile,email) VALUES ('$username', md5('$password'), '$mobile', '$email')";
        echo $sql;
        $result = @pg_query($conn, $sql);
        // $row = pg_fetch_row($result, 0);
        echo "Success register";
    }
//    $result = pg_query_params($conn, $sql, array(
//        $username,
//        $password,
//        $realname,
//        $email,
//        $mobile
//    ));
//    echo $result;
////    $result = pg_query_params($conn,$sql,array(
////        $username,
////        $password,
////        $realname,
////        $email,
////        $mobile
////    ));
////    
//    if (!$result) {
//        echo json_encode(array(
//            "success" => false,
//            "message" => pg_last_error($conn)
//        ));
//    }
    pg_close($conn);
    exit(1);
    pg_free_result($result);
}

//pg_close($conn);
//
//echo json_encode(array(
//    "success"=>true,
//    "message"=>"register ok"
//));

