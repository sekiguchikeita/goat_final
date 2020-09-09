<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
session_start();
$lid = $_SESSION['lid'];
$task = $_POST['task'];
$end_date = $_POST['end_date'];
$tag = $_POST['tag'];
$comment = $_POST['comment'];
$how_long = $_POST['how_long'];



//2. DB接続します
include("funcs.php");
$pdo = db_conn();





//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html
$stmt = $pdo->prepare("INSERT INTO plan_table(lid,task,indate,end_date,tag,comment,how_long )VALUES(:lid, :task, sysdate(), :end_date, :tag, :comment, :how_long )");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR); 
$stmt->bindValue(":task", $task, PDO::PARAM_STR);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(":end_date", $end_date, PDO::PARAM_STR);
$stmt->bindValue(":tag", $tag, PDO::PARAM_STR);  
$stmt->bindValue(":comment", $comment, PDO::PARAM_STR);  
$stmt->bindValue(":how_long", $how_long, PDO::PARAM_STR); 
$status = $stmt->execute(); // IT returns boolean (fail or success)

//４．データ登録処理後
if($status==false){
  //*** function化する！*****************
  sql_error($stmt);
}else{
  //*** function化する！*****************
  redirect("index.php");
}

?>