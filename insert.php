<?php
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname = $_POST['bookname'];
$bookURL = $_POST['bookURL'];
$kanso = $_POST['kanso'];


// 2. DB接続します
//try {
  //Password:MAMP='root',XAMPP=''
//  $pdo = new PDO//('mysql:dbname=kazushi62_gs_kk;
  //charset=utf8;host=mysql57.kazushi62.sakura.ne.jp','kazushi62','Kazushi562');
//  ('mysql:dbname=gs_kk;
//  charset=utf8;host=localhost','root','root');
//} catch (PDOException $e) {
//  exit('DBConnectError:'.$e->getMessage());
//}
require_once('funcs.php');
$pdo = db_conn();



// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table(ユニーク,書籍名,書籍URL,書籍コメント,登録日時)
  VALUES(NULL,:bookname,:bookURL,:kanso,sysdate())"
);

// 4. バインド変数を用意
$stmt->bindValue(':bookname',$bookname,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookURL',$bookURL,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanso',$kanso,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  //$error = $stmt->errorInfo();
  //exit("ErrorMassage:".$error[2]);
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  //header('Location:index.php');
  redirect('index.php');
}
?>
