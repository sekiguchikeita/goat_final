<!--結果まとめページ-->

<?php


session_start();
include("funcs.php");
loginCheck();

$lid = $_SESSION['lid'];
$name = $_SESSION["name"];
$kanri_flg = $_SESSION["kanri_flg"];
// ここでsessionデータをjs 側に渡すため、json化
$j = [ $name, $kanri_flg ];

$jinfo = json_encode($j);

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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザーページ（結果まとめページ想定）</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href='css/reset.css'>
<link rel="stylesheet" href="css/index.css">

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
  <h1>ユーザーページ（結果まとめページ想定）</h1>
    <div class="container jumbotron"><?=$view?></div>

    <div class="profile container" style="display:flex; flex-direction: column; text-align: center; background-color:#40e0d0; border:none; border-radius: 10px 10px 0 0;">
        <h1 style=> User Info</h1>
        <div id=profile></div>
    </div>
    <h2 style="text-align: center">Your Posts</h2>
    <div id=archive class=wrapper style="display: flex;
        display: grid;
        margin: auto;
        grid-template-columns: 1fr ;
    ">
    </div>

</div>
<!-- Main[End] -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  //const datas = JSON.parse('<?=$json?>')
  const prof = JSON.parse('<?=$jinfo?>')
 
  

  // 入力されたrole のナンバーに職業を挿入, 0番ならlearner
  const rolechecker = [ 'user', 'user']
  let icon;

  // それぞれの職業に合わせたアイコンを表示
  if (rolechecker[prof[1]] === 'user' ){
    icon = '<i class="fas fa-user-shield"></i>'
  }else if (rolechecker[prof[1]] === 'user'){
    icon = '<i class="fas fa-graduation-cap"></i>'
  }
  


// html Main part , id=profile　の部分にユーザーデータを貼り付け
$('#profile').append( 
    `<div>
        <span><h3>User: ${prof[0]}</h3><i class="far fa-user-circle"></i></span>
        <span><h3>Role: ${rolechecker[prof[1]]}<h3>${icon}</span>
        
    </div>`)
    
// html Main part , id=archive　の部分にデータ１つずつを貼り付け
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
            <img src="https://robohash.org/${data.id}?200*200" style="width:20%">
            

            <div class="container">
            <h3>User: ${prof[0]} </h3>
              <a href="detail.php?taskid=${data.taskid}">
              <h3> ${data.task} </h3> </a>
              <h3> ${data.indate} </h3> 
              <h3> ${data.end_date} </h3> 
              <h3> ${data.tag} </h3> 
              <h3> ${data.how_long} </h3>

            <a href="delete.php?taskid=${data.taskid}"> <i class="far fa-trash-alt"></i></a>
            <br>
           
            <p> ${data.comment} </p>
          </div>


            </div>
        <div>`)
    )
  }
</script>


</body>
</html>