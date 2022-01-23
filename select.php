<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kazushi62_gs_kk;charset=utf8;host=mysql57.kazushi62.sakura.ne.jp','kazushi62','Kazushi562');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= "Date:";
    $view .= $result['登録日時'].'<br> bookname: '.$result['書籍名'];
    $view .= "<br>";
    $view .= "Comments: ";
    $view .= $result['書籍コメント'];
    $view .= "</p>";
    $view .= "<p>";
    $view .= "<a href='";
    $view .= $result['書籍URL'];
    $view .= "'>";
    $view .= "Book Link";
    $view .= "</a>"; 
    $view .= "</p>";
  }

  
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bookmark</title>
<link rel="stylesheet" href="css/stylesheet2.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="">
      <div class="text-center">
      <a class="navbar-brand" href="index.php">Bookmark registration</a>
      </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h1 class="text-center">Previsou Bookmark list</h1>

<div class="data-position text-center">
    <div><?= $view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
