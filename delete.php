<?php


$taskid = $_GET['taskid'];


include("funcs.php");
//2. DB接続します
$pdo = db_conn();




//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html
$sql = 'DELETE FROM plan_table WHERE taskid=:taskid';
$stmt = $pdo->prepare($sql);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(':taskid', $taskid, PDO::PARAM_INT);  // PDO::PARAM_INT FOR Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); // IT returns boolean (fail or success)

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト (you can decide where to redirect) basically take clinent back to home screen
  header("Location: select.php");  // after : " ", you must need a space otherwise you will error
  exit();

}



?>