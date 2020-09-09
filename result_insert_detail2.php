<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
session_start();
$lid = $_SESSION['lid'];

$total_taskid = $_POST['total_taskid'];
$total_progress = $_POST['total_progress'];
$total_tag = $_POST['total_tag'];

// $user = $_POST['user'];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();



$checking = $pdo->prepare("SELECT * FROM detail_summary2 WHERE taskid=:taskid AND DATE_FORMAT(detail_summary2.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y')");
$checking->bindValue(":taskid", $total_taskid, PDO::PARAM_INT); 

$condition = $checking->execute();


// get taskid(created today exist) here from db
$view="";
if($condition==false) {
  sql_error();
}else{
  while( $r[] = $checking->fetch(PDO::FETCH_ASSOC)){
  $view .= $r['taskid'];
}
}

if ($view){
 
$update = $pdo->prepare("UPDATE detail_summary2 SET lid=:lid, taskid=:taskid, progress=:progress, tag=:tag, indate=sysdate() WHERE lid=:lid AND DATE_FORMAT(detail_summary2.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y')");
$update->bindValue(":lid", $lid, PDO::PARAM_STR);
$update->bindValue(":taskid", $total_taskid, PDO::PARAM_INT);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$update->bindValue(":progress", $total_progress, PDO::PARAM_INT);
$update->bindValue(":tag", $total_tag, PDO::PARAM_STR);   
$status = $update->execute();
 // IT returns boolean (fail or success)
} else { 
echo "what?";
$stmt = $pdo->prepare("INSERT INTO detail_summary2(lid,taskid,progress,tag,indate )VALUES(:lid, :taskid, :progress, :tag, sysdate() )");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);
$stmt->bindValue(":taskid", $total_taskid, PDO::PARAM_INT);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(":progress", $total_progress, PDO::PARAM_INT);
$stmt->bindValue(":tag", $total_tag, PDO::PARAM_STR);  
$status = $stmt->execute(); // IT returns boolean (fail or success) 
}



//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html


//４．データ登録処理後
if($status==false){
  //*** function化する！*****************
  sql_error($status);
}else{
  //*** function化する！*****************
  redirect("result_detail.php");
}
