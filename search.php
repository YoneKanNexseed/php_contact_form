<?php
    require_once('function.php');
    require_once('dbconnect.php');

    $nickname = '';
    if (isset($_GET['nickname'])) {
        $nickname = $_GET['nickname'];
    }

    //SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM survey WHERE nickname = ?');
    $stmt->execute(["%$nickname%"]);
    $results = $stmt->fetchAll(); 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
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