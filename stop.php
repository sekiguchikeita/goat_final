<?php

session_start();
//loginCheck();


$lid = $_SESSION['lid'];
$taskid = $_SESSION["taskid"];

//$id = $taskid;
//1.  DB接続します



include("funcs.php");
$pdo = db_conn();

//$today = $_POST['today'];
//$min = $_POST['todaymin'];
//$tag = $_POST['tag'];




// https://www.flatflag.nir87.com/select-932#SELECT 参考にしたurl
//dbから引っ張ってきた目標時間を試験的に表示するコード
//??はtodo画面でボタンが押された数字が入る

// $sql = "SELECT * FROM outcome WHERE id = ？？";
// $stmt = $dbh->query($sql);
// foreach ($stmt as $row) {
//     echo $row['today'];
//     echo '<br>';
// }


//$datasforwrite = array($taskid, $today, $min, $tag); 
//echo $datasforwrite[3]. 'this is arrray';
//$data = json_encode($datasforwrite);

//13に引っ張ってきた目標時間(分)が入る
 $ttt = 30 * 60;
 $php_test = $ttt;
 $json_test = json_encode( $php_test , JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ja.js"></script>
    <link rel="stylesheet" href='css/reset.css'>
    <link rel="stylesheet" href='css/stop.css' >
    <!-- ファビコン追加 -->
  <link rel="shortcut icon" href='img/goat_32.ico' >

    <title>stop</title>
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
    

    <div id = 'timer'>
        <div id = 'box'>

            <!-- ここに受け取った時間を表示する. -->
            <h1 id = 'display'>30:00<span id = 'goal'></span></h1>  
            <div id= 'center'>
             <button id = 'start'>スタート</button>
            <button id = 'stop'>ストップ</button>
            <!--<form method="post" id="plan_post" action="write1.php">-->
            <!--<input type="hidden" name="taskid" value='<?=$taskid?>'}>-->
            <!--<input type="hidden" name="today" value='<?=$today?>'}>-->
            <!--<input type="hidden" name="min" value='<?=$min?>'}>-->
            <!--<input type="hidden" name="tag" value='<?=$tag?>'}>-->
            <input id = "test" name="test" ></input>
            <input type="submit" id = 'done' value="出力">
           
           
            </div>
          
        </div>
    </div>
    
    
 <footer>
  <p class="footer"> (C) g's academy</p>
</footer>


   
    <script>


   
var start_click = false;

//時間データの代入
var time = js_test =JSON.parse('<?php echo $json_test; ?>');
var thirtymin = 0

var min = 0;
var sec = 0;

function show(){
    console.log(goal)
    var goal = document.getElementById('goal');
    var goal = getElementById("goal");
    goal.innerHTML = "100分";
}

function count_start(){
    if(start_click === false){
        interval_id = setInterval(count_down , 1000);
        start_click = true;
    }
}

function count_down(){
    var display = document.getElementById('display');
    var test = document.getElementById('test');
    console.log(time);
    if (time === 1 ){
        display.innerHTML = '終了！';
        //
    }else{
        time--;
        console.log(time + "time")
        thirtymin++
        console.log(thirtymin + "inputtime")
        $(test).val(thirtymin);
        test.innerHTML = time;
        min = Math.floor(time / 60);
        sen = Math.floor(time % 60);
        display.innerHTML = '' + min +':' + sen ;
        if (min<10){
         display.innerHTML = '0' + min + ':' + sen;
        }
        
        if (sen<10) {
         display.innerHTML = '0' + min + ':' + '0' + sen;
     }
     }
}



function count_stop(){
    clearInterval(interval_id);
    start_click = false;
}



window.onload = function(){
    var start = document.getElementById('start');
start.addEventListener('click' , count_start , false);
var stop = document.getElementById('stop');
stop.addEventListener('click', count_stop , false );
}


let taskid; 
  if (!'<?=$taskid?>') {
    taskid = ("empty")
} else {
    taskid = ('<?=$taskid?>')
}
console.log(taskid)





//出力と同時にcount_stopする
function click(){
count_stop()
var thirtymin = $('#test').val()
var thirtymin = parseInt(thirtymin);




// 2　ここでHTMLからのインプットヴァリューをOBJ方式に


    $.ajax({
            url: "write1.php", // post先のページを入力
            type: "POST",//メソッド
            data: {
                "user": thirtymin, // ここを1800に変える
                "taskid": taskid,    

            },
            success: function (data, textStatus, jqXHR) {
                alert('success data');
                //whatever
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //if fails
                alert('fail');
            }
        
    });

};




// midnight 仕様の click
function midnightclick(){
count_stop()
var thirtymin = $('#test').val()
var thirtymin = parseInt(thirtymin);




// 2　ここでHTMLからのインプットヴァリューをOBJ方式に


    $.ajax({
            url: "write1.php", // post先のページを入力
            type: "POST",//メソッド
            data: {
                "user": thirtymin,
                "taskid": taskid,    

            },
            success: function (data, textStatus, jqXHR) {
                alert('success data');
                //whatever
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //if fails
                alert('fail');
            }
        
    });

};

$("#done").on("click", click)

//24時に発動

var midnight = "20:36:00";
var now = null;
setInterval(function () {
    now = moment().format("H:mm:ss");
    if (now === midnight) {
        count_stop();
        midnightclick()
    }
    $("#time").text(now);
}, 1000);


    </script>
    
</body>
</html>