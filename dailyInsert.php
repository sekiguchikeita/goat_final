<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
session_start();
// data for outcome_table
$lid = $_SESSION['lid'];
$taskid = $_POST['taskid'];
$_SESSION["taskid"] = $taskid;
 
// data for plan_today
$today = $_POST['today'];
$tag = $_POST['tag'];
$_SESSION["tag"] = $tag;
//echo gettype($sum_1day);
//echo $today;


//2. DB接続します
include("funcs.php");
$pdo = db_conn();


// 3. checking if this taskid has already created today
$checking = $pdo->prepare("SELECT * FROM plan_today WHERE taskid=:taskid AND DATE_FORMAT(plan_today.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y')");
$checking->bindValue(":taskid", $taskid, PDO::PARAM_STR);
$condition = $checking->execute();


// get taskid(created today exist) here from db
$view="";
if($condition==false) {
  sql_error();
}else{
  while( $r = $checking->fetch(PDO::FETCH_ASSOC)){
  $view .= $r["taskid"];
}
}

// if there is already, update it 

if ($today == ""){
 
   
} elseif ($view) { 
  echo "it works";
  $update = $pdo->prepare("UPDATE plan_today SET lid=:lid, taskid=:taskid, today=:today, indate=sysdate(), tag=:tag WHERE taskid=:taskid");
  $update->bindValue(":lid", $lid, PDO::PARAM_STR);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
  $update->bindValue(":taskid", $taskid, PDO::PARAM_INT);
  $update->bindValue(":today", $today, PDO::PARAM_INT);
  $update->bindValue(":tag", $tag, PDO::PARAM_STR);  
  $status = $update->execute();

} else {
// if it is newly created, insert it   
  $stmt = $pdo->prepare("INSERT INTO plan_today(lid,taskid,today, indate,tag)VALUES(:lid,:taskid,:today,sysdate(),:tag)");
  $stmt->bindValue(":lid", $lid, PDO::PARAM_STR);  // IT SHOULD BE CORRESPONDED TO YOUR SETTING ON DB IN MYSQLFOR STR : Integer（数値の場合 PDO::PARAM_INT) 
  $stmt->bindValue(":taskid", $taskid, PDO::PARAM_INT);
  $stmt->bindValue(":today", $today, PDO::PARAM_INT);
  $stmt->bindValue(":tag", $tag, PDO::PARAM_STR); 
  $status = $stmt->execute(); 

}

if($condition==false){
    //*** function化する！*****************
      sql_error($order);
    }else{
    //*** function化する！*****************
     redirect("stop.php");
}
    