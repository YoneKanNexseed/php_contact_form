<?php
    require_once('function.php');

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    //DBに接続
    $host = "localhost";
    $dbname = "phpkiso";
    $charset = "utf8mb4";
    $user = 'root';
    $password='';
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    try {
        $dbh = new PDO($dsn, $user, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    
    //SQLを実行
    $stmt = $dbh->prepare('INSERT INTO survey (nickname, email, content) VALUES (?, ?, ?)');
    $stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行

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
  <p><?php echo h($nickname); ?></p>
  <p><?php echo h($email); ?></p>
  <p><?php echo h($content); ?></p>
</body>
</html>