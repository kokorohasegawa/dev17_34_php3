<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー情報変更画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="select_id.php">ユーザー一覧へ戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<!-- 検索エリア[start] -->
<!-- <div>
  <form method="post" action="select.php">
    <div class="jumbotron">
      <fieldset>
        <label>検索する内容：<input type="text" name="search_value"></label><br>
        <input type="submit" value="送信">
      </fieldset>
    </div>
  </form>
</div> -->

<!-- 検索エリア[end] -->



<!-- Main[End] -->



<?php
// ログインされているかどうかをチェックする
session_start();
require_once('funcs.php');
loginCheck();

// GETで値を受信
$id=$_GET['id'];
// echo $code;


// 検索フォームに入力したデータを受診
// $search_value=$_POST['search_value'];
// $search_value='%'.$search_value.'%';
// print($search_value);

//1. DB接続します

require_once("funcs.php");
$pdo = db_conn();



//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=".$id);
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  // fecthでデータを抽出
  $result=$stmt->fetch();
    $view .="<p>◆ユーザー情報詳細◆</p><br>";
    // $view.='<a href="detail.php?code='.$result['code'].'">';
    // $view.='<p>'.$result['code'].'</p>';
    $view .='<p>'.$result['id'].$result['u_name'].'<br>'.' '.$result['u_id'].'<br>'.' '.$result['u_pw'].'<br>'.'kanri_flg:'.$result['kanri_flg'].'<br>'.'life_flg:'.$result['life_flg'];
    $view .='</p>';

}
?>

<div>
    <div class="container jumbotron"><?= $view ?></div>
    <p>[kanri_flg]0:一般 1:管理者権限</p>
    <p>[life_flg ]0:在籍 1:退職</p>

</div>

<!-- 編集画面 -->
<form method="post" action="update_id.php">
  <div class="jumbotron">
   <fieldset>
    <legend>◆編集画面◆</legend>
     <label>名前：<input type="text" name="u_name" value="<?=$result['u_name']?>"></label><br>
     <label>ID：<input type="text" name="u_id" value="<?=$result['u_id']?>"></label><br>
     <label>PASSWORD：<input type="text" name="u_pw" value="<?=$result['u_pw']?>"></label><br>
     <label>管理フラグ：<input type="text" name="kanri_flg" value="<?=$result['kanri_flg']?>"></label><br>
     <label>在籍フラグ：<input type="text" name="life_flg" value="<?=$result['life_flg']?>"></label><br>
     <!-- <label><textArea name="book_comment" rows="4" cols="40"></textArea></label><br> -->
     <input type="hidden" name='id' value="<?=$result['id']?>">
     <input type="submit" value="確定">
    </fieldset>
  </div>
</form>

<!-- <div>
<a href="index.php">入力画面へ</a>
</div> -->

</body>
</html>
