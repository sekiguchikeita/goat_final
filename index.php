<!---Register form for 計画表-->

<?php


session_start();
include("funcs.php");
loginCheck();

$lid = $_SESSION['lid'];
//$name = $_SESSION["name"];
//$kanri_flg = $_SESSION["kanri_flg"];
// ここでsessionデータをjs 側に渡すため、json化
//$j = [ $name, $kanri_flg ];

//$jinfo = json_encode($j);

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


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>計画表</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <!-- <link rel="stylesheet" href='css/reset.css'> -->
  <link rel="stylesheet" href="css/index.css">
  <!-- <link rel="stylesheet" href='css/signup.css'> -->
  
 <!-- ファビコン追加 -->
 <link rel="shortcut icon" href='img/goat_32.ico' >
  
  <style>div{padding: 10px;font-size:16px;}</style>
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

<!-- <h1>計画表</h1> -->
<legend>POST form</legend>
<form method="post" id="plan_post" style="" action="insert.php">
  <div class="jumbotron">
  <!-- <button id="switch"> switch </button> -->
   <fieldset>
    <div class="cp_iptxt">
     <label class="ef">Task<br><input type="text" name="task" placeholder="Task:"></label>
    </div>
    <div class="cp_iptxt">
     <label class="ef">end date<br><input type="text" name="end_date" placeholder="end date:"></label>
    </div>
    <div class="cp_iptxt">
     <label class="ef">estimated time required <br>
     <input class="ttt" type="number" name="how_long"></label>
    </div>
    <div class="cp_iptxt">
     <label>leave some commment here<br> <textArea  class="com" name="comment" rows="4" cols="55" placeholder="leave some commment here : "></textArea></label>
    </div>
    <!-- <div class="category">Category</div> -->
    <div class="cp_ipselect cp_sl01">
        <select id="tag" name="tag">
            <option value="" hidden>Choose</option>
            <option value="html">html</option>
            <option value="css">css</option>
            <option value="C">C</option>
            <option value="Java">Java</option>
            <option value="python">Python</option>
            <option value="Swift">Swift</option>
            <option value="Ruby">Ruby</option>
            <option value="Go">Go</option>
            <option value="php">PHP</option>
            <option value="React">React</option>
            <option value="Javascript">Javascript</option> 
        </select>
    </div>
    <br>
     <input type="submit" id=plan_submit value="submit" class="button">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<!---plan 一覧-->
<div style="text-align: center"><a href="dailyPlan.php"> <button class="button"> 今日の作業へgo! </button> </a>
</div>

  <h2 style="text-align: center">Your Posts</h2>
    <div id=archive class=wrapper style="
        display: grid;
        margin: auto;
        grid-template-columns: 1fr ;
    ">
    </div>

    <!-- <footer>
  <p class="footer"> (C) g's academy</p>
</footer> -->




<!---ページ分けてリダイレクトもあり！！！---->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script> 
  
  /*init=()=>{
    if (toggle) {
      $('#plan_post').show()
      $('#archive').hide()
    } else {
      $('#plan_post').hide()
      $('#archive').show()
    }
  }*/
  

  let datas; 
  if (!'<?=$json?>') {
    datas = ("empty")
  } else {
    datas = JSON.parse('<?=$json?>')

  
    
  datas.map(data => 
    $('#archive').append( 
        `<div class="card" style=
          "width:80%; 
          margin: auto;
          display: flex;
        ">
            

            <div class="container">
              <a href="detail.php?taskid=${data.taskid}">
              <h3> ${data.task} </h3> </a>
              <h3> アップ日：${data.indate} </h3> 
              <h3> 完了予定日：${data.end_date} </h3> 
              <h3> カテゴリー：${data.tag} </h3> 
              <h3> 所要時間：${data.how_long} </h3>
              <p> ${data.comment} </p>

              <a href="delete.php?taskid=${data.taskid}"> <i class="far fa-trash-alt"></i></a>
              <br>
            
          </div>


            </div>
        <div>`)
    )
  }

 
  
  </script>
</body>
</html>