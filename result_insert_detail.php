<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
session_start();
$lid = $_SESSION['lid'];

$daily_taskid = $_POST['daily_taskid'];
$daily_progress = $_POST['daily_progress'];
$daily_tag = $_POST['daily_tag'];
$total_today = $_POST['total_today'];
$total_stopwatch = $_POST['total_stopwatch'];
$alltags = $_SESSION['alltags'];
echo $alltags;
//$taskids = $_POST['taskids'];
// $total_taskid = $_POST['total_taskid'];
// $total_progress = $_POST['total_progress'];
// $total_tag = $_POST['total_tag'];

//echo $taskids;


$total_taskid = 1;
$total_progress = 50;
$total_tag = 'js';

// $user = $_POST['user'];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();



$checking = $pdo->prepare("SELECT * FROM detail_summary1 WHERE taskid=:taskid AND DATE_FORMAT(detail_summary1.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y')");
$checking->bindValue(":taskid", $daily_taskid, PDO::PARAM_INT); 

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
$update = $pdo->prepare("UPDATE detail_summary1 SET lid=:lid, taskid=:taskid, total_today=:total_today, total_stopwatch=:total_stopwatch, achievement=:achievement, tag=:tag, display=:display, indate=sysdate() WHERE lid=:lid AND DATE_FORMAT(detail_summary1.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y')");
$update->bindValue(":lid", $lid, PDO::PARAM_STR);
$update->bindValue(":taskid", $daily_taskid, PDO::PARAM_INT); 
$update->bindValue(":total_today", $total_today, PDO::PARAM_INT);
$update->bindValue(":total_stopwatch", $total_stopwatch, PDO::PARAM_INT);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$update->bindValue(":achievement", $daily_progress, PDO::PARAM_INT);
$update->bindValue(":tag", $daily_tag, PDO::PARAM_STR); 
$update->bindValue(":display", 0 , PDO::PARAM_INT);   
$status = $update->execute(); // IT returns boolean (fail or success)
} else { 
//echo "17?";

$stmt = $pdo->prepare("INSERT INTO detail_summary1 (lid, taskid, total_today, total_stopwatch, achievement, tag, display, indate)VALUES(:lid, :taskid, :total_today, :total_stopwatch, :achievement, :tag, :display, sysdate() )");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);
$stmt->bindValue(":taskid", $daily_taskid, PDO::PARAM_INT); 
$stmt->bindValue(":total_today", $total_today, PDO::PARAM_INT);
$stmt->bindValue(":total_stopwatch", $total_stopwatch, PDO::PARAM_INT);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(":achievement", $daily_progress, PDO::PARAM_INT);
$stmt->bindValue(":tag", $daily_tag, PDO::PARAM_STR); 
$stmt->bindValue(":display", 0 , PDO::PARAM_INT);
 
$status = $stmt->execute(); 
}

//４．データ登録処理後
//if($status==false){
  //*** function化する！*****************
  //sql_error($stmt);
//}else{
  //*** function化する！*****************
//   redirect("index.php");
//}


//３．データ登録SQL作成 // bined var (:dsakj) to recieved value from Post request to html
//$stmt_ = $pdo->prepare("INSERT INTO detail_summary2(lid,taskid,progress,tag,indate )VALUES(:lid, :taskid, :progress, :tag, sysdate() )");
//$stmt_->bindValue(":lid", $lid, PDO::PARAM_STR);
//$stmt_->bindValue(":taskid", $total_taskid, PDO::PARAM_INT);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
//$stmt_->bindValue(":progress", $total_progress, PDO::PARAM_INT);
//$stmt_->bindValue(":tag", $total_tag, PDO::PARAM_STR);  
//$status_ = $stmt_->execute(); // IT returns boolean (fail or success)

//４．データ登録処理後
if($status==false){
  //*** function化する！*****************
  sql_error($stmt);
}else{
  //*** function化する！*****************
  redirect("result_detail.php");
}


if($status==false){
  //*** function化する！*****************
  sql_error($update);
}else{
  //*** function化する！*****************
  redirect("result_detail.php");
}