<?php

// indexに入力したデータを受診
$u_name=$_POST['u_name'];
$u_id=$_POST['u_id'];
$u_pw=$_POST['u_pw'];
$kanri_flg=$_POST['kanri_flg'];
$life_flg=$_POST['life_flg'];

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

//2. DB接続します
require_once('funcs.php');
$pdo=db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO 
                        gs_user_table
                          (id, u_name, u_id, u_pw, kanri_flg, life_flg)
                        VALUES
                          ( NULL,:u_name,:u_id,:u_pw,:kanri_flg,:life_flg)
                      ");
// $stmt->bindValue(':id', h($id), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_name', h($u_name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_id', h($u_id), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_pw', h($u_pw), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', h($life_flg), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)

// -- 実行分
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("記録ができません".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: select_id.php');
}
?>
