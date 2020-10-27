<?php

// indexに入力したデータを受診
// /1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$book_name=$_POST['book_name'];
$book_URL=$_POST['book_URL'];
$comment=$_POST['book_comment'];
$code=$_POST['code'];
echo $code;
echo $book_name;

//2. DB接続します
require_once('funcs.php');
$pdo=db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
                        gs_bm_table 
                      SET 
                        書籍名=:name, 
                        書籍URL=:URL, 
                        書籍コメント=:comment,
                        登録日時=sysdate()
                      WHERE
                        code=:code;
");

$stmt->bindValue(':code', h($code), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', h($book_name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', h($book_URL), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', h($comment), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


// -- 実行分


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("記録ができません".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: select.php');
}

?>
