<?php
/*
  DBのデータを画面に表示する場合は
  1. DBからデータを取得する
  2. 取得したデータを変数に代入
  3. 2の内容を画面に表示する
*/

// １．データベースに接続する
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

// ２．SQL文を実行する
$sql = 'SELECT * FROM survey';
$stmt = $dbh->prepare($sql);
$stmt->execute();
//DBから取得した内容を変数に代入 結果は連想配列になってる
$results = $stmt->fetchAll(); 


// echo '<pre>';
// var_dump($results); //変数の中身を確認するための書き方
// echo '<pre>';

// ３．データベースを切断する
$dbh = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- //画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p style="color: blue;"><?php echo $result['code'] . '<br>'; ?></p>
        <p><?php echo $result['nickname'] . '<br>'; ?></p>
        <p><?php echo $result['email'] . '<br>'; ?></p>
        <p><?php echo $result['content'] . '<br>'; ?></p>
    <?php endforeach; ?>
</body>
</html>