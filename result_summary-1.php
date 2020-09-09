<!--結果まとめページ-->

<?php


session_start();
include("funcs.php");
loginCheck();

$lid = $_SESSION['lid'];

// $name = $_SESSION["name"];
// $kanri_flg = $_SESSION["kanri_flg"];
// // ここでsessionデータをjs 側に渡すため、json化
// $j = [ $name, $kanri_flg ];

// $jinfo = json_encode($j);

//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL作成
// $stmt = $pdo->prepare("SELECT * FROM plan_table INNER JOIN outcome_table ON plan_table.lid = outcome_table.lid WHERE plan_table.taskid=1");

//-------- daily progress_stop_watch ---------
$stmt = $pdo->prepare("SELECT outcome_table.lid, outcome_table.stop_watch, outcome_table.taskid
                      FROM outcome_table
                      -- INNER JOIN outcome_table ON plan_table.taskid = outcome_table.taskid
                      -- INNER JOIN plan_today ON plan_table.taskid = plan_today.taskid
                      WHERE (outcome_table.lid=:lid) AND (DATE_FORMAT(outcome_table.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y'))");
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);
$status_a = $stmt->execute();

//３．データ表示
$view="";
if($status_a==false) {
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
    $j_a = json_encode($r);
    
  }

}

//-------- daily progress_today ---------
$today = $pdo->prepare("SELECT plan_today.lid, plan_today.today, plan_today.taskid
                      FROM plan_today
                      -- INNER JOIN outcome_table ON plan_table.taskid = outcome_table.taskid
                      -- INNER JOIN plan_today ON plan_table.taskid = plan_today.taskid
                      WHERE (plan_today.lid=:lid) AND (DATE_FORMAT(plan_today.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y'))");
$today->bindValue(":lid", $lid, PDO::PARAM_STR);
$status_t = $today->execute();

//３．データ表示
$view="";
if($status_t==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $today->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
 
  while( $t[] = $today->fetch(PDO::FETCH_ASSOC)){ 
    //$view .= '<p>'.$r['id'].": ".$r['title'].'</p>';  //.= ,eams += in js , connect & update one by one
    //$view .= "$r[url]";
    //$view .= "<p>";
    $j_t = json_encode($t);
    
  }

}

//------- total progress_stop_watch --------
$query = $pdo->prepare("SELECT outcome_table.taskid, outcome_table.stop_watch, outcome_table.lid
                      FROM outcome_table
                      WHERE outcome_table.lid=:lid");
$query->bindValue(":lid", $lid, PDO::PARAM_STR);
$status_p = $query->execute();

//３．データ表示
$view="";
if($status_p==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $query->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
 
  while( $z[] = $query->fetch(PDO::FETCH_ASSOC)){ 
    //$view .= '<p>'.$r['id'].": ".$r['title'].'</p>';  //.= ,eams += in js , connect & update one by one
    //$view .= "$r[url]";
    //$view .= "<p>";
    $j_p = json_encode($z);
    
  }

}

//------- total progress_how_long --------
$sql = $pdo->prepare("SELECT plan_table.taskid, plan_table.how_long, plan_table.lid
                      FROM plan_table
                      WHERE plan_table.lid=:lid");
$sql->bindValue(":lid", $lid, PDO::PARAM_STR);
$status_s = $sql->execute();

//３．データ表示
$view="";
if($status_s==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $sql->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
 
  while( $y[] = $sql->fetch(PDO::FETCH_ASSOC)){ 
    //$view .= '<p>'.$r['id'].": ".$r['title'].'</p>';  //.= ,eams += in js , connect & update one by one
    //$view .= "$r[url]";
    //$view .= "<p>";
    $j_s = json_encode($y);
    
  }

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>結果</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href='css/reset.css'>
<link rel="stylesheet" type="text/css" href="css/result.css">
<link rel="stylesheet" type="text/css" href="css/chart.css">
<!-- ファビコン追加 -->
<link rel="shortcut icon" href='img/goat_32.ico' >
<!-- <link rel="stylesheet" href="./chart.css"> -->


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

  
  <a class="navbar-brand" href="result_detail.php"><button type="button">詳細</button></a>
    <div class="container jumbotron"><?=$view?></div>

   

   <!-- Main[Start] -->
  
  
    <!-- chart.js -->
    <!-- aily_progress(chart) -->


    <div class="container jumbotron"><?=$view?></div>
    <div class="profile container" >
        <div id=profile></div>
    </div>
    <!-- chart.js -->
    <!-- aily_progress(chart) -->
    <div class=all>
    <div class="chart1">
      <p>Today's achievement</p>
      <div class="maintop1">
        <canvas id="myChart" width="400" height="400"></canvas>
        <div class="count" id="archive_daily" style="color:white"></div>
      </div>

      <div class="maindown">

        <div id="daily_progress_stop_watch"></div>
        <div id=""></div>
      </div>
    </div>
    
    <!-- total_progress(chart) -->
    <div class="chart2">
    <p>All achievement</p>
    <div class="maintop2">
        <canvas id="myChart_" width="400" height="400"></canvas>
        <div class="count" id="archive_total" style="color:white;"></div>

  </div>

      <div class="maindown">

      </div>
    </div>

  </div>

<!-- Main[End] -->

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<!-- Javascript -->
<script>

//-------- daily progress_stop_watch ---------
let datas_a; 
  if (!'<?=$j_a?>') {
    datas_a = ("empty")
  } else {
    datas_a = JSON.parse('<?=$j_a?>')
  
  }

//-------- daily progress_today ---------
let datas_t; 
  if (!'<?=$j_t?>') {
    datas_t = ("empty")
  } else {
    datas_t = JSON.parse('<?=$j_t?>')
  }
// console.log(datas_t);

//------- total progress_stop_watch --------
let datas_p; 
  if (!'<?=$j_p?>') {
    datas_p = ("empty")
  } else {
    datas_p = JSON.parse('<?=$j_p?>')
  }
//console.log(datas_p)

//------- total progress_how_long --------
let datas_s; 
  if (!'<?=$j_s?>') {
    datas_s = ("empty")
  } else {
    datas_s = JSON.parse('<?=$j_s?>')
  }
console.log(datas_s)


sum =(data, key)=> {

  all_stop_watch = []
        for (i = 0; i <data.length; i++) {
            all_stop_watch.push(parseInt(data[i][key]))
        }
    // console.log(all_stop_watch);

    var sum = all_stop_watch.reduce(function(a, b){
        return a + b;
    }, 0);
    return sum;
}

taskidcollector=(outcome)=>{
        var arr = []
        for (i = 0; i < outcome.length; i++) {
            arr.push(outcome[i].taskid)
        }
        return arr
}

var taskidtoday = taskidcollector(datas_t)




//-------- daily progress_stop_watch ---------
var daily_progress_stop_watch = sum(datas_a, 'stop_watch')/ 60 / 60;
  console.log(daily_progress_stop_watch + " total-stopwatch");

//-------- daily progres_today ---------
var daily_progress_today = sum(datas_t, 'today');
  console.log(daily_progress_today + "total-today");

//-------- daily progress ---------
var daily_progress_total = daily_progress_stop_watch / daily_progress_today
var daily_progress = Math.round(daily_progress_total * 100);   //達成率
  // console.log(daily_progress);

//------- total progress_stop_watch --------
var total_progress_how_long = sum(datas_p, 'stop_watch')/60 / 60;
  console.log(total_progress_how_long + 'total_progress_how_long');

//------- total progress_how_long --------
var total_progress_stop_watch = sum(datas_s, 'how_long');
  console.log(total_progress_stop_watch + 'total_progress_stop_watch');

//------- total progress --------
var total_progress_total = total_progress_how_long / total_progress_stop_watch
var total_progress = Math.round(total_progress_total * 100);   //達成率
  //console.log(total_progress);
    
console.log(daily_progress_today);
$.ajax({
  url: "result_insert_summary-1.php", // post先のページを入力
  type: "POST",//メソッド
  data: {      
    'achievement' : daily_progress,
    'progress' : total_progress,
    'alltags' : taskidtoday
  },
  success: function (data, textStatus, jqXHR) {
      // alert('success data');
        //whatever
   },
  error: function (jqXHR, textStatus, errorThrown) {
        //if fails
        alert('fail');
   }
    
});

</script>

<script>

$('#archive_daily').append(
  `<em style="white">${daily_progress}</em>
  <span style="white"class="caption">%</span>`
);
console.log(daily_progress)
console.log("does it work")

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'doughnut',
  // The data for our dataset
  data: {
  labels: ['achievement', 'not yet'],
  datasets: [{
  label: 'My First dataset',
  // backgroundColor: 'rgb(21, 99, 132)',
  data: [daily_progress, 100 - daily_progress],
  backgroundColor: [
    '#3333FF',
    '#DEEDFB',
  ],
}]
},
  // Configuration options go here
  options: {
      responsive: false,
      maintainAspectRatio: false,
  events: ['mousemove'],
  // the bigger the narrower . you can change the thickness of the circle of the chart
  cutoutPercentage : 90,
  legend:{
          position: 'bottom',
  }
  }
});


$('#archive_total').append(
  `<em>${total_progress}%</em>
  <span class="caption"></span>`
);

console.log("works?")
console.log(total_progress)
var ctx = document.getElementById('myChart_').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'doughnut',
  // The data for our dataset
  data: {
  labels: ['achievement', 'not yet'],
  datasets: [{
  label: 'My First dataset',
  // backgroundColor: 'rgb(21, 99, 132)',
  data: [total_progress, 100 - total_progress],
  backgroundColor: [
    '#3333FF',
    '#DEEDFB',
 
  ]

  
}]
},
  // Configuration options go here
  options: {
    
      responsive: false,
      maintainAspectRatio: false,
  events: ['mousemove'],
  // the bigger the narrower . you can change the thickness of the circle of the chart
  cutoutPercentage : 90,
  legend:{
          position: 'bottom',
      }
  } 
  
});


</script>

    



</body>
</html>