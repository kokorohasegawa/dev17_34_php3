<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
    $code=$_GET['code'];
// var_dump($id);
    require_once('funcs.php');
    $pdo=db_conn();


    //３．データ登録SQL作成
    $stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE code=:code");
    $stmt->bindValue(':code', h($code), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute(); //実行

    //４．データ登録処理後
    if($status==false){
        //*** function化する！*****************
        $error = $stmt->errorInfo();
        exit("SQLError:".$error[2]);
    }else{
        //*** function化する！*****************
        redirect('select.php');
    }

?>

<!-- //2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更 -->



