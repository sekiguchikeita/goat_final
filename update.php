<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
session_start();
$lid = $_SESSION['lid'];
$task = $_POST['task'];
$indate = $_POST['indate'];
$end_date = $_POST['end_date'];
$tag = $_POST['tag'];
$comment = $_POST['comment'];
$how_long = $_POST['how_long'];
$taskid = $_POST['taskid'];







//2. DB接続します
include("funcs.php");
$pdo = db_conn();





//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html
$update = $pdo->prepare("UPDATE plan_table SET task=:task, indate=:indate, end_date=:end_date, tag=:tag, comment=:comment, how_long=:how_long  WHERE taskid=:taskid");
$update->bindValue(":task", $task, PDO::PARAM_STR);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$update->bindValue(":indate", $indate, PDO::PARAM_STR);
$update->bindValue(":end_date", $end_date, PDO::PARAM_STR);
$update->bindValue(":tag", $tag, PDO::PARAM_STR);
$update->bindValue(":comment", $comment, PDO::PARAM_STR);
$update->bindValue(":how_long", $how_long, PDO::PARAM_STR);
$update->bindValue(":taskid", $taskid, PDO::PARAM_INT);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $update->execute(); // IT returns boolean (fail or success)




//４．データ登録処理後

if($status==false){
  //*** function化する！*****************
  sql_error($stmt);
}else{
  //*** function化する！*****************
  redirect("select.php");

}


?>
