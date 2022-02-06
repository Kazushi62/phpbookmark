<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/stylesheet.css" />
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">Top-page</a></div>
    </div>
  </nav>
</header>
<h2 class="text-center">Login Form</h2>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
<div class="text-center"><input type="text" name="lid" placeholder="User ID"/></div>
<div class="text-center"><input type="password" name="lpw" placeholder="Password"/></div>
<div class="text-center"><input type="submit" value="LOGIN" /></div>
</form>


</body>
</html>