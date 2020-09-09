<?php

session_start();
include("funcs.php");
loginCheck();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>main</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />
 
  <link rel="stylesheet" href='css/reset.css'>
  <link rel="stylesheet"  href="css/main.css">
  <!-- ファビコン追加 -->
  <link rel="shortcut icon" href='img/goat_32.ico' >

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

<video id="mainvideo" autoplay loop muted controls poster="img/main.jpg">
  <source src="mp4/main.mp4" type="video/mp4" />
</video>

<footer>
  <!-- <p class="footer"> (C) g's academy</p> -->
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
jQuery(function($){
var movie = document.getElementById("mainvideo");
movie.controls = false;
});

</script>


</body>
</html>
