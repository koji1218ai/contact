<?php
// エスケープ ファイルの読み込み require(獲得)
require_once('function.php');

// 確認のため
// echo "<pre>";
// var_dump($_SERVER);
// exit;

// echo "<pre>";
// var_dump($_SERVER["HTTP_UPGRADE_INSECURE_REQUESTS"]);
// exit;
// POST送信ではなかったらindex.phpにリダイレクトする
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('Location: index.php');
};



// 入力内容の取得 変数名を自分でつけて、スーパーグローバル変数を利用して中身を取得
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$content = $_POST['content'];
// POST POST送信されたデータが連想配列形式で保存されている
// GET  GET送信されたデータが連想配列形式で保存されている

// name属性
// 入力内容のチェック 空かどうか
if ($nickname == '') {
    $nickname_result = 'ニックネームを入力してください。';
} else {
    $nickname_result = 'ようこそ、' . $nickname .'様';
}

if ($email == '') {
    $email_result = 'メールアドレスが入力されていません。';
} else {
    $email_result = 'メールアドレス：' . $email;
}

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
<!-- 画面に表示 -->
    <!-- (02)hを呼び出してエスケープ。入力欄に＜とか＝を認識しないようにする。-->
    <p><?php echo h($nickname_result); ?></p>
    <p><?php echo h($email_result); ?></p>
    <p><?php echo h($content_result); ?></p>

    <form action="thanks.php" method="POST">
      <input type="hidden" name="nickname" value ="<?=h($nickname)?>">
      <input type="hidden" name="email" value ="<?=h($email)?>">
      <input type="hidden" name="content" value ="<?=h($content)?>">
      
      <!-- onclick="history.back()" javascriptのイベントと関数みたいな物 組み込み関数-->
      <button type="button" onclick="history.back()">戻る</button>
      <?php if($nickname !== '' &&  $email !== '' &&  $content !== '') : ?>
        <input type="submit" value="OK">
      <?php endif ; ?>
    </form>
    
    <!-- input type="hidden"は画面に表示されない -->
    <!-- onclick="history.back()"  のイベント-->
    <!-- action="thanks.php"飛ぶ先の指定 -->
</body>
</html>