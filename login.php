<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
  <link rel="stylesheet" href='css/reset.css'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <!-- ファビコン追加 -->
  <link rel="shortcut icon" href='img/goat_32.ico' >
  
  <style></style>
</head>
<body>
<div id="wrapper">
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
   <li ><a href="signup.php">Signup</a></li>
  </ul>
 </div>
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="login_act.php">
  <div class="fieldset">
   <fieldset>
    <legend>Login</legend><br><br>
     <label><input type="text" name="lid" placeholder="Login Id"></label><br><br><br>
     <label><input type="text" name="lpw" placeholder="password"></label><br><br>
     <br>
     <input type="submit" value="submit">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<footer>
  <p class="footer"> (C) g's academy</p>
</footer>

</div>
</body>
</html>
