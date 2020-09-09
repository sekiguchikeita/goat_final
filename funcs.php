<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    try {
        
        $db_name = "gs_db";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";  
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        return $pdo; // make it global, otherwise you cannot use it where you call it 
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}
    


function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
   
}
    
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}


function loginCheck() {
    if (
        !isset($_SESSION["chk_ssid"]) || // checking if THIS user has ssid
        $_SESSION["chk_ssid"] !=session_id() // checking if ssid of THIS user === ssid issed previous page (login page ) = the one browser holding
    
    ){

        echo '<body  style="background: #0f3854  ; background: radial-gradient(ellipse at center,  #0a2e38  0%, #000000 70%)"></body>';
        echo '<p style="font-size:50px ; text-align:center ; color:#daf6ff ;  text-shadow: 0 0 20px rgba(10, 175, 230, 1),  0 0 20px rgba(10, 175, 230, 0);">login error</p>';
        exit();
       
    }else{ // in the case user DID login, regenerate id and re-assign it to session key for safty
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    

    }
}

?>



