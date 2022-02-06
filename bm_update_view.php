<?php
//GET送信されたidを取得(URLの後ろについてるデータ)
require_once('funcs.php');
$pdo = db_conn();

$id = $_GET['id'];
//echo "id: ". $id;

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table where ユニーク=:id');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = '';

if ($status == false) {
  sql_error($stmt);
}else{
  $result = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Bookmark Form</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stylesheet.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>


<!-- Main[Start] -->
<!--<div class="wrapper">
  <form method="post" id="contact-form" class="contact-horizontal" action="insert.php">
    <div class="jumbotron">
    <fieldset>
      <h1>Bookmark</h1>
      <label><input type="text" placeholder="Bookname" name="bookname"></label><br>
      <label><input type="text" placeholder="Bookpage URL" name="bookURL"></label><br>
      <label><textArea placeholder="Comment" name="kanso" rows="4" cols="40"></textArea></label><br>
      <botton class="btn btn-primary send-button" id="submit" type="submit" type="submit" value="send">

      </fieldset>
    </div>
  </form>
</div>-->

<header>Bookmark Form</header>

<form id="form" class="topBefore" method="post" action="bm_update.php">
    
  <input id="bookname" type="text" value="<?= $result['書籍名']?>" name="bookname">
  <input id="bookURL" type="text" value="<?= $result['書籍URL']?>" name="bookURL">
  <textarea id="comments" type="text"  name="kanso"><?= $result['書籍コメント']?></textarea>
  <input type="hidden" name="id" value="<?= $result['ユニーク']?>">
  <input id="submit" type="submit" value="GO!">
  
</form>

<div class="footerflex">
  <div class="footerlink"><a href="./bm_list_view.php">Previous Bookmark list</a></div>
  <div class="footerlink"><a href="./login.php">Log-In</a></div>
  <div class="footerlink"><a href="./logout.php">Log-Out</a></div>
</div>

<!-- Main[End] -->


</body>
</html>