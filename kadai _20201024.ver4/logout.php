<?php
// 必ずセッションスタートは書く
session_start();

// SESSIONを初期化（空っぽにする）
$_SESSION=array();

// cookieに保存してある"SESSIONID"の保存期間を過去にして破棄
if(isset($_COOKIE[session_name()])){
    // session_name()は、セッションIDを返す関数
    setcookie(session_name(),'',time()-42000,'/');
}


// サーバ側での、セッションIDの破壊
session_destroy();

// 処理後、login.phpにリダイレクト
header("Location:login.php");
exit();

?>