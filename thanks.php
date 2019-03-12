<?php
    //check.phpから送られてきた内容を変数に代入
    $nickname = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $content = htmlspecialchars($_POST['content']);

    //DBに接続
    $dsn = 'mysql:dbname=phpkiso;host=localhost';
    $user = 'root';
    $password='';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    //SQLを実行する
    //SQLインジェクション対策(プリペアドステートメント)
    $sql = 'INSERT INTO survey (nickname, email, content) VALUES (?, ?, ?)';
    $data = [$nickname, $email, $content];//?を置きかえる用の変数($data)を作成
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);//?を$dataに置き換えてSQLを実行

    //DBを切断
    $dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <p><?php echo $nickname; ?></p>
  <p><?php echo $email; ?></p>
  <p><?php echo $content; ?></p>
</body>
</html>