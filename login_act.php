<?php
//1. POSTデータ取得
session_start();

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

echo $lid;

//2. DB接続します
include("funcs.php");
$pdo = db_conn();





//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid=:lid AND lpw=:lpw");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR); 
$stmt->bindValue(":lpw", $lpw, PDO::PARAM_STR);

$status = $stmt->execute(); // IT returns boolean (fail or success)

//４．データ登録処理後

  //*** function化する！*****************
// get the record 
// the below method for getting ONE record , assuming we'll get only one record since id is unique
$val = $stmt->fetch();
// when successfully login,
if ($val["id"] != "") {
    $_SESSION["chk_ssid"] = session_id(); // when session start, it issues nuique key
    $_SESSION["name"] = $val['name']; // fetch data from server to Session (in live)　
    $_SESSION["lid"] = $val['lid'];                      // for displaying username when you log out or staying login
    $_SESSION["kanri_flg"] = $kanri_flg;  // $Session means that server handle it 
    
    redirect("main.php");
} else {
    // when there is no such record in DB 
    redirect("login.php");

}




?>