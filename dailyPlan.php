<?php


session_start();
include("funcs.php");
loginCheck();

$lid = $_SESSION['lid'];
$taskid = $_POST['taskid'];
$lid = $_SESSION['lid'];
$stop_watch = $_POST['user'];

// data for plan_today
$today = $_POST['today'];
$tag = $_POST['tag'];




//1.  DB接続します
$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM plan_table WHERE lid=:lid");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
 
  while( $r[] = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    //$view .= '<p>'.$r['id'].": ".$r['title'].'</p>';  //.= ,eams += in js , connect & update one by one
    //$view .= "$r[url]";
    //$view .= "<p>";
    $json = json_encode($r);
    
  }

}




//$checking = $pdo->prepare("SELECT * FROM plan_today WHERE taskid=:taskid AND DATE_FORMAT(plan_today.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y')");
//$checking->bindValue(":taskid", $taskid, PDO::PARAM_STR);
//$condition = $checking->execute();



?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>計画表</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href='css/reset.css'>
  <link rel="stylesheet" type="text/css" href="css/dailyplan.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- ファビコン追加 -->
  <link rel="shortcut icon" href='img/goat_32.ico' >

  <style>div{padding: 10px;font-size:16px;float:left;margin:0 auto;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<nav>
 <div class="drawer">
 <!--- いわゆるロゴ svg を利用------>
 <div id="logo"><a href="main.php"><img src="img/Logo.jpg" alt="GOATロゴ"></a></div>
 

  </div>
 <!-------------- drawer ここまで-->
 
 <div class="menu">
  <ul>
   <li ><a href="main.php">Home</a></li>
   <li ><a href="index.php">Plan</a></li>
   <li ><a href="result_summary-1.php">Record</a></li>
   <li><a href="dailypost.php">Post</a></li>
   <li><a href="select.php">Ranking</a></li>
   <li ><a href="logout.php">Logout</a></li>
  </ul>
 </div>
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h1>本日のタスクメニュー</h1>
<!---plan 一覧-->

<h2 style="text-align: center">Your Posts</h2>
    <div id=archive class=wrapper style="
        display: grid;
        margin: auto;
        grid-template-columns: 1fr ;
    ">
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let datas; 
    if (!'<?=$json?>') {
        datas = ("empty")
    } else {
        datas = JSON.parse('<?=$json?>')

  
    
        datas.map(data => 
        $('#archive').append( 
                `<div class="card" style=
                "width:100%; 
                margin: auto;
                display: flex;
                ">
                  

                    <div class="container">

                    <div class="up1">
                      <a href="detail.php?taskid=${data.taskid}">
                      <h3> ${data.task} </h3> </a>
                      <h3> アップ日：${data.indate} </h3> 
                      <h3> 完了予定日：${data.end_date} </h3> 
                      <h3> カテゴリー：${data.tag} </h3> 
                      <h3> 所要時間：${data.how_long} </h3>
                    </div>
                    
                    <div class="up2">
                    <form method="post" id="plan_post" action="dailyinsert.php">
                        <label>目標時間  Hour: <select id="today" name="today"></label><br>
                            <option selected="selected"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option>
                            <option value="12">12</option> 
                            <option value="13">13</option> 
                            <option value="14">14</option>
                            <option value="15">15</option>  

                        </select>
                        <label>Minute:<select id="today" name="todaymin"></label>分:<br>
                            <option selected="selected"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option>
                            <option value="12">12</option> 

                        </select>
                        <input type="hidden" name="tag" value=${data.tag}>
                        <input type="hidden" name="taskid" value=${data.taskid}>
                       
                        
                    </form></br>

                    
                    <br>

                    
                
                    <p> ${data.comment} </p><br>
                    <input type="submit" id=plan_submit value="学習スタート">
                    <a href="delete.php?taskid=${data.taskid}"> <i class="far fa-trash-alt"></i></a>
                  </div>
                </div>

                    </div>
                <div>`)
            )
    }

  
</script>
</body>
</html>