<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// データベース接続関数
function db_conn(){
    try {
            //ID MAMP ='root'
            //Password:MAMP='root',XAMPP=''
            $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
            return $pdo;
        } catch (PDOException $e) {
            exit('DBConnectError:'.$e->getMessage());
        }
}

// リダイレクト処理関数
function redirect($file_name){
    header("Location:".$file_name);
    exit();
}

// ログイン認証関数
function loginCheck(){
    if(
        // ブラウザ内にセッションIDが付与されておりかつ、一致する→select.php
        !isset($_SESSION['chk_ssid'])
        ||
        $_SESSION['chk_ssid']!=session_id()
        ){
          // ログインエラーメッセージ
          echo "Login Error";
          echo '<a href="login.php">→ログイン画面</a>';
          exit();
        }else{
          // セッションIDを再生成（ハッキング対策）
          session_regenerate_id(true);
          $_SESSION['chk_ssid']=session_id();
        }
}
