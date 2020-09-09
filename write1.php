<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
session_start();
// data for outcome_table
$lid = $_SESSION['lid'];
$stop_watch = $_POST['user'];
$taskid = $_POST['taskid'];
$tag = $_SESSION["tag"];
// data for plan_today


//echo gettype($sum_1day);




//2. DB接続します
include("funcs.php");
$pdo = db_conn();




// --> Outcome_table
$order = $pdo->prepare("INSERT INTO outcome_table(lid,taskid,indate, stop_watch,tag )VALUES(:lid, :taskid, sysdate(), :stop_watch, :tag)");
$order->bindValue(":lid", $lid, PDO::PARAM_STR); 
$order->bindValue(":taskid", $taskid, PDO::PARAM_INT);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$order->bindValue(":stop_watch", $stop_watch, PDO::PARAM_INT);
$order->bindValue(":tag", $tag, PDO::PARAM_STR);
$condition = $order->execute(); // IT returns boolean (fail or success)

//４．データ登録処理後
if($condition==false){
//*** function化する！*****************
  sql_error($order);
}else{
//*** function化する！*****************
  //redirect("stop.php");
}



?>