<!--仮想sns postページ -->

<?php

session_start();
include("funcs.php");
loginCheck();

// 同じクラスの人の情報のみ表示するため、class_1,2をsessionで取得

$class_1 = $_SESSION['class_1'];
$class_2 = $_SESSION['class_2'];


//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL
// 日別の学習時間ランキングの表記については下記URL参照
//https://qiita.com/seki-moto/items/bf0adba6237b9a05ac04
$stmt = $pdo->prepare("SELECT
                      id, lid, name, total_stopwatch, tag, total_achievement, comment, class_1, class_2, indate,
                        IF(CONCAT(
                          CASE
                            WHEN @befor_indate = indate AND @befor_total_stopwatch = total_stopwatch THEN CONCAT( @idx := @idx + 1                )
                            WHEN @befor_indate = indate                                              THEN CONCAT( @idx := @idx + 1, @rank := @idx )
                            ELSE                                                                          CONCAT( @idx := 1       , @rank := 1    )
                          END, CONCAT(@befor_indate := indate, @befor_total_stopwatch := total_stopwatch)
                          ) = ''
                        , null, @rank ) AS rank
                      FROM
                          (SELECT
                            @befor_indate := ''
                            ,@befor_total_stopwatch := ''
                            ,@idx := 0
                            ,@rank := 0
                          ) AS rowinfo
                          ,ranking_table
                      WHERE (DATE_FORMAT(ranking_table.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y'))                
                      ORDER BY indate asc ,total_stopwatch desc;
                      
                    ");

// $stmt->bindValue(":class_1", $class_1, PDO::PARAM_STR);
// $stmt->bindValue(":class_2", $class_2, PDO::PARAM_INT);
$stmt->bindValue(":total_stopwatch", $total_stopwatch, PDO::PARAM_STR);
//$stmt = $pdo->prepare("SELECT * FROM crud");
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  // the belw says extract line by line
  // $result is like (event) of event listner
  // if you have 10 rows, result ganna work 10 times (like map 's elem)
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Today's Ranking</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!-- UIkit CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" /> -->

<!-- UIkit JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="css/select.css"> 
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- ファビコン追加 -->
<link rel="shortcut icon" href='img/goat_32.ico' >

<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!--id="main"-->

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
<div>
    <h1>Today's Ranking -- Time --</h1>
    <div class=""></div>
    <div id=cg_time class=wrapper style="display: flex;
        display: grid;
        margin: auto;
        grid-template-columns: 1fr ;   
    ">
    </div>

</div>
<!-- Main[End] -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  let datas; 
  if (!'<?=$json?>') {
    datas = ("empty")
  } else {
    datas = JSON.parse('<?=$json?>')
    
  console.log(datas)
  console.log(datas[0].lid)
  datas.map(data => 
    $('#cg_time').append( 
      `<div class="card" style=
        "width:80%; 
        margin: auto;
        display: flex;
        
        ">
          <img src="https://robohash.org/${data.id}?200*200" style="width:20%">

          <div class="container">
            <h3>Rank : ${data.rank} </h3>
            <a href="result.php?lid=${data.lid}">  
            <h3>Name : ${data.name} </h3></a>
            <h4>Tag : ${data.tag} </h4></a>
            <h4>Total Study time : ${data.total_stopwatch} </h4>
            <h4>Achievement : ${data.total_achievement} %</h4>
            <h4>Comment : ${data.comment}</h4>
          </div>
        </div>
      <div>`)
    )
  }

             
  
</script>


</body>
</html>
