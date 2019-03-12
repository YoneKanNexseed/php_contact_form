<?php
    /*
        $_POSTはスーパーグローバル変数
            - スーパーグローバル変数
                - phpでもともと定義されている
                - 自分で定義しなくても使える変数
            - $_POST
                - postで送信された値が連想配列で入ってる
        $_GET
            - getで送信された値が連想配列で入ってる
        
        連想配列のkeyを決めてる場所
            - formの中の入力欄(inputタグとか)のname属性で決まる
        
        phpはHTMLの中に書くこともできる

        サニタイジング
            - htmlspecialchars()
        XSS
            - 入力フォームにスクリプトを入力する攻撃

        1. データの受け渡し
            - postとgetがある
            - formタグを使用してデータを渡せる

        2. セキュリティ対策
            - XSSという攻撃とその対処方法
            - ユーザーの入力がある箇所を特に注意する
    */

    //index.htmlで送った内容を変数に代入
    $nickname = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $content = htmlspecialchars($_POST['content']);

    //入力がある場合とない場合で処理を分ける
    if ($nickname == '') {
        $nickname_result = 'ニックネームが入力されていません。';
    } else {
        $nickname_result = 'ようこそ、' . $nickname .'様';
    }
      // メールアドレス
    if ($email == '') {
        $email_result = 'メールアドレスが入力されていません。';
    } else {
        $email_result = 'メールアドレス：' . $email;
    }

    // お問い合わせ内容
    if ($content == '') {
        $content_result =  'お問い合わせ内容が入力されていません。';
    } else {
        $content_result = 'お問い合わせ内容：' . $content;
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>入力内容確認</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>入力内容確認</h1>
  <p><?php echo $nickname_result; ?></p>
  <p><?php echo $email_result; ?></p>
  <p><?php echo $content_result; ?></p>
  <form method="POST" action="thanks.php">
      <!-- hidden 画面には表示しないが、データを送りたいときなどに使う -->
    <input type="hidden" name="nickname" value="<?php echo $nickname; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="content" value="<?php echo $content; ?>">
    <input type="button" value="戻る" onclick="history.back()">
    <?php if ($nickname != '' && $email != '' && $content != ''): ?>
        <input type="submit" value="OK">
    <?php endif; ?>
  </form>
</body>
</html>