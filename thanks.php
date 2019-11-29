<?php
// function関数のファイルの呼び出し
require_once('function.php');
require_once('dbconnect.php'); // 追加


if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('Location: index.php');
};

// 入力内容を取得
 $nickname = $_POST['nickname'];
 $email = $_POST['email'];
 $content = $_POST['content'];

 $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, contact) VALUES (?, ?, ?)');
$stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
<!-- 表示 -->
    <h1>お問い合わせありがとうございました！</h1>
    <!-- function関数のファイル関数の呼び出し -->
    <p><?php echo h($nickname) ?></p>
    <p><?php echo h($email) ?></p>
    <p><?php echo h($content) ?></p>
</body>
</html>