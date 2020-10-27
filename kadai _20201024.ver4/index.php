<?php
// ログインされているかどうかをチェックする
session_start();
require_once('funcs.php');
loginCheck();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマークデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ブックマークデータ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>bookのブックマーク</legend>
     <label>名前：<input type="text" name="book_name"></label><br>
     <label>URL：<input type="text" name="book_URL"></label><br>
     <label><textArea name="book_comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<!-- 一覧を表示 -->
<a href="select.php">ブックマーク一覧へ</a>
<!-- 一覧を表示 -->

</body>
</html>
