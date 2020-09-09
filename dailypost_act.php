<?php

//※summary_tableの内容が未定のため、受取情報が未定のため、項目がわからないが
//dailypost.phpからデータを受け取り、ranking_tableへのデータinsertのため設置

//1. POSTデータ取得

session_start();
$lid = $_SESSION['lid'];
$name = $_SESSION['name'];
$total_stopwatch = $_POST['total_study_time'];
$total_achievement = $_POST['total_achievement'];
$comment = $_POST['comment'];
$tag = $_POST['str'];

    //classの分割は難しい場合は後回し
$class_1 = $_SESSION['class_1'];
$class_2 = $_SESSION['class_2'];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html
$stmt = $pdo->prepare("INSERT INTO ranking_table(lid, name, tag, total_stopwatch, total_achievement, comment, class_1, class_2, indate)VALUES(:lid, :name, :tag, :total_stopwatch, :total_achievement, :comment, :class_1, :class_2, sysdate() )");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":tag", $tag, PDO::PARAM_STR);  
$stmt->bindValue(":total_stopwatch", $total_stopwatch, PDO::PARAM_INT);  
$stmt->bindValue(":total_achievement", $total_achievement, PDO::PARAM_INT); 
$stmt->bindValue(":comment", $comment, PDO::PARAM_STR);  
$stmt->bindValue(":class_1", $class_1, PDO::PARAM_STR);  
$stmt->bindValue(":class_2", $class_2, PDO::PARAM_INT);  

$status = $stmt->execute(); // IT returns boolean (fail or success)

//４．データ登録処理後
if($status==false){
  //*** function化する！*****************
  sql_error($stmt);
}else{
  //*** function化する！*****************
  redirect("select.php");
}

?>