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
  <title>ユーザー新規登録</title>
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
<form method="post" action="insert_id.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー情報入力</legend>
      <label>名前：<input type="text" name="u_name" value="<?=$result['u_name']?>"></label><br>
      <label>ID：<input type="text" name="u_id" value="<?=$result['u_id']?>"></label><br>
      <label>PASSWORD：<input type="text" name="u_pw" value="<?=$result['u_pw']?>"></label><br>
      <label>管理フラグ：<input type="text" name="kanri_flg" value="<?=$result['kanri_flg']?>"></label><br>
      <label>在籍フラグ：<input type="text" name="life_flg" value="<?=$result['life_flg']?>"></label><br>
     <!-- <label>名前：<input type="text" name="book_name"></label><br>
     <label>URL：<input type="text" name="book_URL"></label><br>
     <label><textArea name="book_comment" rows="4" cols="40"></textArea></label><br> -->
     <input type="submit" value="作成">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<!-- 一覧を表示 -->
<a href="select_id.php">ユーザー一覧へ</a>
<!-- 一覧を表示 -->

</body>
</html>
