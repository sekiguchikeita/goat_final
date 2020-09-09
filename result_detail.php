<!--結果まとめページ-->

<?php


session_start();
include("funcs.php");
loginCheck();

$lid = $_SESSION['lid'];
$alltags = $_SESSION['alltags'];
echo $alltags[0];

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
                      WHERE (outcome_table.lid=:lid) AND (DATE_FORMAT(outcome_table.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y'))ORDER BY taskid DESC"); //（ORDER BY taskid DESC）ソート機能
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
$today = $pdo->prepare("SELECT plan_today.lid, plan_today.today, plan_today.taskid, plan_today.tag
                      FROM plan_today
                      -- INNER JOIN outcome_table ON plan_table.taskid = outcome_table.taskid
                      -- INNER JOIN plan_today ON plan_table.taskid = plan_today.taskid
                      WHERE (plan_today.lid=:lid) AND (DATE_FORMAT(plan_today.indate,'%M %d %Y') = DATE_FORMAT(sysdate(),'%M %d %Y'))ORDER BY taskid DESC");
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
                      WHERE outcome_table.lid=:lid ORDER BY taskid DESC");
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
$sql = $pdo->prepare("SELECT plan_table.taskid, plan_table.how_long, plan_table.lid, plan_table.tag
                      FROM plan_table
                      WHERE plan_table.lid=:lid ORDER BY taskid DESC");
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
<title>ユーザーページ（結果まとめページ想定）</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="css/result_detail.css">
<!-- ファビコン追加 -->
<link rel="shortcut icon" href='img/goat_32.ico' >

</head>
<body>
<!--id="main"-->
!-- Head[Start] -->
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
  <h2 class="title">achievement rate as a whole</h2>
    <div class="container jumbotron"><?=$view?></div>

    <div class="profile container" style="display:flex; flex-direction: column; text-align: center;  border:none; border-radius: 10px 10px 0 0;">
        <!-- <h1 style=> User Info</h1> -->
        <!-- <a class="navbar-brand" href="result_summary-1.php"><button type="button">戻る</button></a> -->
        <!-- <div id=profile></div> -->

    <!-- chart.js -->
    <!-- aily_progress(chart) -->
    <div class="chart">
    <h3 class="title">today's achievement</h3>
        <canvas id="myChart" width="1500" height="400"></canvas>
        <div class="count" id="archive_daily">
        </div>
    </div>

    <br>
    <br>
    <!-- total_progress(chart) -->
    <div class="chart">
    <h3 class="title">Total achievement</h3>
        <canvas id="myChart_" width="1500" height="400"></canvas>
        <div class="count" id="archive_total">
        </div>
    </div>

  
<br>
<br>
    
<div class="title">
  <p> (C) g's academy</p>
</div>



</div>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- <script src="https://unpkg.com/chartjs-plugin-colorschemes"></script> -->

<!-- Javascript -->
<script>

//-------- daily progress_stop_watch ---------
let datas_a; 
  if (!'<?=$j_a?>') {
    datas_a = ("empty")
  } else {
    datas_a = JSON.parse('<?=$j_a?>')
  }
//console.log(datas_a);

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
console.log(datas_p)

//------- total progress_how_long --------
let datas_s; 
  if (!'<?=$j_s?>') {
    datas_s = ("empty")
  } else {
    datas_s = JSON.parse('<?=$j_s?>')
  }
// console.log(datas_s)


// ------ tasksoter ------
tasksorter=(input)=>{
        var outcome = []
        var onerecord = [input[0]] // one record
        if(input.length === 0 ){
            return 0
        } else if (input.length === 1) {
            return onerecord
        }else {
            for (i = 0; i+1 < input.length; i++) {
                thistaskind = input[i].taskid
                nexttaskind = input[i+1].taskid
                nexttask = input[i+1]
                if (thistaskind === nexttaskind){
                    onerecord.push(nexttask)
                    if (i+2 === input.length){
                        outcome.push(onerecord)
                        return outcome
                    }
                } else{
                    outcome.push(onerecord)
                    onerecord = [nexttask]
                    if (i+2 === input.length){
                        outcome.push(onerecord)
                        return outcome
                    }
                }
            }
        }
}

var datas_a_sorter = tasksorter(datas_a)
    // console.log(datas_a_sorter);

var datas_t_sorter = tasksorter(datas_t)
    // console.log(datas_t_sorter);

var datas_p_sorter = tasksorter(datas_p)
    // console.log(datas_p_sorter);

var datas_s_sorter = tasksorter(datas_s)
    // console.log(datas_s_sorter);


// ------ daily progress_stop_watch ------
newobj=(outcome, key)=>{
        totalarr = []
        if(outcome.length === 0 ){
            return 0
        } else {
            outcome.map(data => {
                arr = []
                let record;
                data.map(data1 => {
                    arr.push(parseInt(data1[key]))
                    reacord = ({"taskid": parseInt(data1.taskid), "tag": data1.tag, [key]: arr })
                    // console.log(reacord)
                })
                if (reacord[key].length === 1) {
                    reacord['total'] = reacord[key][0]
                    //console.log(reacord.stop_watch[0] + "total1")
                    totalarr.push(reacord)
                } else {
                    reacord['total'] = reacord[key].reduce(function(a, b){
                        return a + b;
                    }, 0);
                    //console.log(reacord['total'])
                    totalarr.push(reacord)
                }
                //reacord['achievement'] = reacord.total / reacord.total_today
                //totalarr.push(reacord)
            })
            return totalarr
        }
    }

// ------ daily progress_stop_watch(taskid) ------
var daily_progress_stop_watch = newobj(datas_a_sorter, 'stop_watch')
    console.log(daily_progress_stop_watch)

// ------ daily progress_today(taskid) ------
var daily_progress_today = newobj(datas_t_sorter, 'today')
    console.log(daily_progress_today);

//------ total progress_stop_watch(taskid) ------
var total_progress_stop_watch = newobj(datas_p_sorter, 'stop_watch')
    // console.log(total_progress_stop_watch);

//------ total progress_how_long(taskid) ------
var total_progress_how_long = newobj(datas_s_sorter, 'how_long')
    console.log(total_progress_how_long);

// eroprogressChecker
zeroprogressChecker=(howlong,stopwatch, func)=> {
        arr = []
        howids = func(howlong)
        stopids = func(stopwatch)
        for (i = 0; i < howids.length; i++) {
            if(!stopids.includes(howids[i])) {
                //arr.push(howids[i])
                arr.push({"taskid": howids[i], "tag": howlong[i].tag, "progress" : 0, "total_hour" : howlong[i].total, "total_stopwatch" : 0 } )
            }
        }
        return arr
}

// taskidcollec
taskidcollector =(howarr)=> {
  var arr = []
  for (i = 0; i < howarr.length; i++) {
      arr.push(howarr[i].taskid)
  }
  return arr
}

// checkthedefference
checkthedefference=(howlong, stopwatch, func, zerochecker)=>{
  var test = zerochecker(howlong, stopwatch, func)
  arr = []
  for (i = 0; i < test.length; i++) {
      arr.push(test[i])
  }
  for (i = 0; i < howlong.length; i++) {
      for (j = 0; j < stopwatch.length; j++) {
          if (howlong[i].taskid ===  stopwatch[j].taskid){
              var total = Math.round((stopwatch[j].total / 60 / 60) / howlong[i].total * 100)
              arr.push({ "taskid": howlong[i].taskid, "tag": howlong[i].tag, "progress" : total, "total_hour" : howlong[i].total, "total_stopwatch" : stopwatch[j].total} )
          }
      }
  }
  return arr
}

// ----- daily_progress -----
var daily_progress = checkthedefference(daily_progress_today, daily_progress_stop_watch, taskidcollector, zeroprogressChecker)
console.log(daily_progress)

// ----- total_progress -----
var total_progress = checkthedefference(total_progress_how_long, total_progress_stop_watch, taskidcollector, zeroprogressChecker)
console.log(total_progress)

// tagcollector
tagcollector=(outcome)=>{
        var arr = []
        for (i = 0; i < outcome.length; i++) {
            arr.push(outcome[i].tag)
        }
        return arr
}

// tag
var tags = tagcollector(total_progress)
  //console.log(tags)


daily_tagcollector=(outcome)=>{
      var arr = []
      for (i = 0; i < outcome.length; i++) {
          arr.push(outcome[i].tag)
      }
      return arr
}

// tag
var daily_tags = daily_tagcollector(daily_progress)
  console.log(daily_tags)

// daily_progresscollector
daily_progresscollector=(outcome)=>{
        var arr = []
        for (i = 0; i < outcome.length; i++) {
            arr.push(outcome[i].progress)
        }
        return arr
}

// daily_progress_per
var daily_progress_per = daily_progresscollector(daily_progress)
  console.log(daily_progress_per)
  console.log('yo')

// total_progresscollector
total_progresscollector=(outcome)=>{
        var arr = []
        for (i = 0; i < outcome.length; i++) {
            arr.push(outcome[i].progress)
        }
        return arr
}

// total_progress_per
var total_progress_per = total_progresscollector(total_progress)
  console.log(total_progress_per)
  console.log('yo1')

// total_progress_howlong_collector
total_progress_howlong_collector=(outcome)=>{
        var arr = []
        for (i = 0; i < outcome.length; i++) {
            arr.push(outcome[i].total)
        }
        return arr
}

// total_progress_per
var total_progress_how_long_per = total_progress_howlong_collector(total_progress_how_long)
  //console.log(total_progress_how_long_per)

// daily_progress(ajax)
for (i = 0; i < daily_progress.length; i++) {
        
    $.ajax({
        url: "result_insert_detail.php", // post先のページを入力
        type: "POST",//メソッド
        data: {      
          'daily_taskid' : daily_progress[i].taskid,
          'daily_progress' : daily_progress[i].progress,
          'daily_tag' : daily_progress[i].tag,
          'total_today' : daily_progress[i].total_hour,
          'total_stopwatch' : daily_progress[i].total_stopwatch,

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
};

// total_progress(ajax)
for (i = 0; i < total_progress.length; i++) {
        
        $.ajax({
            url: "result_insert_detail2.php", // post先のページを入力
            type: "POST",//メソッド
            data: {      
              'total_taskid' : total_progress[i].taskid,
              'total_progress' : total_progress[i].progress,
              'total_tag' : total_progress[i].tag
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
    };
 
</script>

<script>


// $('#archive_daily').append(
//   `<em>${daily_progress_per}</em>
//   <span class="caption">%</span>`
// );

// var taglist = ['total_tag']
// var taglist = ['total_tag']
var ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.global.elements.rectangle = {
    borderWidth: 2,       // 枠線の太さ
    borderSkipped: 'bottom'  // 上部の枠線の除外
};
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'bar',
  // The data for our dataset
  data: {
  // labels: ['achievement', 'not yet'],
  labels: daily_tags,
  datasets: [{
  // label: 'My First dataset',
  data: daily_progress_per,
  backgroundColor: [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(255, 159, 64, 0.2)'
  ],
  borderColor: [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(255, 159, 64, 1)'
 
  ]
}]
},
  // Configuration options go here
  options: {
    scales: {
      yAxes: [
        {
        gridLines: {   // 補助線
            color: "rgba(247, 247, 247, 0.2)", // 補助線の色
            zeroLineColor: "rgba(247, 247, 247, 0.2)"    // y=0（Ｘ軸の色）
        },
        ticks: {
            beginAtZero: true,
            min: 0,
            max: 100,
            fontColor: "white",
        }
        }
      ]
    },
    legend: {
            display: false
         },
    events: ['mousemove'],
    // the bigger the narrower . you can change the thickness of the circle of the chart
    cutoutPercentage : 80
  }
});



// $('#archive_total').append(
//   `<em>${total_progress_par}</em>
//   <span class="caption">%</span>`
// );

var ctx = document.getElementById('myChart_').getContext('2d');
Chart.defaults.global.elements.rectangle = {
    borderWidth: 2,       // 枠線の太さ
    borderSkipped: 'bottom'  // 上部の枠線の除外
};
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'bar',
  // The data for our dataset
  data: {
    // labels: ['achievement', 'not yet'],
    labels: tags,
    datasets: [{
      // label: 'My First dataset',
      data: total_progress_per,
      // data: [70,50],
    //   background: linear-gradient(to bottom,rgba(7,27,82,1) 100%, rgba(0,128,128,1) 0%);
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
 
  ],

    // },
    // {
    //   type: 'line', // 追加
    //     label: 'sample-bar',
    //     data: total_progress_how_long_per,
    //     borderColor : "rgba(54,164,235,0.8)",
    //     backgroundColor : "rgba(54,164,235,0.5)",
    },
    ],
  
},
  // Configuration options go here
  options: {
    scales: {
      yAxes: [
        {
        gridLines: {   // 補助線
            color: "rgba(247, 247, 247, 0.2)", // 補助線の色
            zeroLineColor: "rgba(247, 247, 247, 0.2)"    // y=0（Ｘ軸の色）
        },
        ticks: {
            beginAtZero: true,
            min: 0,
            max: 100,
            fontColor: "white",
        }
        }
      ]
    },
    legend: {
            display: false
         },
    events: ['mousemove'],
    // the bigger the narrower . you can change the thickness of the circle of the chart
    cutoutPercentage : 80
  }
});

</script>
</body>
</html>