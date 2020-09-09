<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>signup</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href='css/reset.css'>
  <link rel="stylesheet" href='css/signup.css'>
  <!-- ファビコン追加 -->
  <link rel="shortcut icon" href='img/goat_32.ico' >
</head>

<body>
<div class="wrapper">
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
<form method="post" action="signin_act.php">

   <fieldset>
    <legend>Sign up</legend>
    <div class="sign">
     <label><input type="text" name="name" placeholder="Name"></label><br><br><br>
     <label><input type="text" name="lid" placeholder="Id"></label><br><br><br>
     <label><input type="text" name="lpw" placeholder="Password"></label><br><br><br>
     <label> <input type="text" name="age" placeholder="Age"></label><br><br><br>
  <!-- 修正ポイント -->   
     <label> <input type="text" name="occupation" placeholder="Occupation"></label><br><br><br>
     <label>
        <select id="class_1" name="class_1">
          <option value="lab">東京Lab</option>
          <option value="dev">東京Dev</option> 
          <option value="dev">福岡Lab</option>
          <option value="dev">福岡Dev</option> 
        </select>
      </label><br><br><br>
    <label> <input type="number" name="class_2" placeholder="期"></label><br><br><br>
    
  <!-- 修正ポイント --> 
     <input type="hidden" name="kanri_flg" value=1 > <!--後で修正-->
     <input type="hidden" name="life_flg" value=1 >
     <input type="submit" value="submit">
     </div>
    </fieldset>
</form>

<footer>
  <p class="footer"> (C) g's academy</p>
</footer>

</div>
</body>
</html>