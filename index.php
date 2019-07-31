<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <title>お問い合わせ</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <h1>お問い合わせ情報入力</h1>
    <form method="POST" action="check.php">
      <div>
        ニックネーム<br />
        <input type="text" name="nickname" />
      </div>
      <div>
        メールアドレス<br />
        <input type="text" name="email" />
      </div>
      <div>
        お問い合わせ内容<br />
        <textarea name="content"></textarea>
      </div>
      <input type="submit" value="送信" />
    </form>
  </body>
</html>
