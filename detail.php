
<?php
// get id from registeration page
$taskid = $_GET["taskid"];


//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM plan_table WHERE taskid=:taskid");
$stmt->bindValue(":taskid", $taskid, PDO::PARAM_INT);
$status = $stmt->execute();


$view="";

if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  sql_error($stmt);
  
}else{
  $row = $stmt -> fetch();
  
    $json = json_encode($row);
    
  

}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データupdate</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./style.css">
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
<form method="post" action="update.php">
  <div class="jumbotron" >
  <fieldset>
    
    <label>Task: <input id="task" type="text" name="task"></label><br>
    <label>created at: <input id="indate" type="text" name="indate"></label><br>
    <label>end date: <input id="end_date" type="text" name="end_date"></label><br>
    <label>Tag: <select id="tag" name="tag"></label><br>
                       <option value="python">Python</option>
                       <option value="php">Php</option>
                       <option value="React">React</option>
                       <option value="Javascript">Javascript</option> 
               </select>
    <label>leave some commment here: <br> <textArea id="comment" name="comment" rows="4" cols="40"></textArea></label><br>
    <label>予想所要時間: <input id="how_long" type="int" name="how_long"></label><br>
    <input type="hidden" name="taskid" id="taskid">
    <input type="submit" value="submit">
  </fieldset>

  </div>
</form>
<!-- Main[End] -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  const data = JSON.parse('<?=$json?>')
  console.log(data)
  $('#task').val(data.task)
  $('#indate').val(data.indate)
  $('#end_date').val(data.end_date)
  $('#tag').val(data.tag)
  $('#comment').val(data.comment)
  $('#how_long').val(data.how_long)
  $('#taskid').val(data.taskid)
  $('img').attr("src",`https://robohash.org/${data.taskid}?200*200`);
  
</script>

</body>
</html>
