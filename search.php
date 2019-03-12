<?php

/*
1. 大まかなにどんな流れでやるか言語化する
    - 検索ワードを送る
    - 検索ワードを受け取る
    - DBで検索する
        - DB接続
        - SQL
            - 検索ワードで絞る
        - DB切断
    - 画面に表示する

    - セキュリティ対策
    - プリペアードステートメント
        - SQLインジェクションを防ぐ
            - 入力欄からSQLを実行する

    3; DELETE FROM survey WHERE code = 2
*/

//検索ワードを送る

//検索ワードを受け取る
// var_dump($_GET['code']);

//DBからデータを取得する
// １．データベースに接続する
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

// ２．SQL文を実行する
$sql = 'SELECT * FROM survey WHERE nickname = ?'; //ニックネームが一致する場合
// $data = [$_GET['nickname']]; //配列を変数に代入
$data[] = $_GET['nickname']; //配列に変数を追加
$stmt = $dbh->prepare($sql);
$stmt->execute($data);
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
    <form action="" method="get">
        <p>検索したいnicknameを入力してください。</p>
        <input type="text" name="nickname">
        <input type="submit" value="検索">
    </form>
    <!-- //画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p style="color: blue;"><?php echo $result['code'] . '<br>'; ?></p>
        <p><?php echo $result['nickname'] . '<br>'; ?></p>
        <p><?php echo $result['email'] . '<br>'; ?></p>
        <p><?php echo $result['content'] . '<br>'; ?></p>
    <?php endforeach; ?>
</body>
</html>