<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
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

<form id="form" class="topBefore" method="post" action="insert.php">
    
  <input id="bookname" type="text" placeholder="Bookname" name="bookname">
  <input id="bookURL" type="text" placeholder="URL" name="bookURL">
  <textarea id="comments" type="text" placeholder="Comments" name="kanso"></textarea>
  <input id="submit" type="submit" value="GO!">
  
</form>

<div class="footerlink"><a href="./select.php">Previsou Bookmark list</a></div>


<!-- Main[End] -->


</body>
</html>
