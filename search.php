<?php
// データベース(DB)に接続 require_onceファイル読み込む関数
require_once('dbconnect.php');


// 検索ボタンを押したら、
// ユーザーが入力した内容と一致するデータを
// 画面に表示する

// ①ユーザーが入力した内容を取得
// 取得した内容は$nicknameに代入
// 変数$nicknameを画面に表示して取得できているか確認

// $nickname = 'ユーザが入力した内容';
// issetとは[]ないが存在しているか確認
// もしユーザーが検索した場合、$_GET内が存在していたら、この処理を表示する。
$nickname = '';
if(isset($_GET['nickname'])){
$nickname = $_GET['nickname'];// 下のhtmlがGETだからGETになる！下のhtmlがnicknameだから[nickname]になる！
var_dump($nickname);
}



// ②ユーザーが入力した内容でDB(MySQL)を検索(接続する)
// prepare = 準備する Array = 配列
$stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname = ?');//SQL構文=WHERE(条件を絞る),FROM,SELECT id = 2をnicknameに変える
// execute = 実行する
$stmt->execute([$nickname]);
// 実行した結果を変数$resultsに代入
$results = $stmt->fetchAll();
// 中身を確認
// echo'<pre>';
// var_dump($results);
// exit;



// ③検索結果を画面に表示する(MySQLを実行する)



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
<!-- action="" 空っぽ＝＞search.phpの省略 -->
    <form action="" method="GET">
        <p>検索したいnicknameを入力してください。</p>
        <input type="text" name="nickname">
        <input type="submit" value="検索">


    </form>
    <!-- 画面に表示する -->
    <!-- foreachは配列の数の分だけくり返す -->
<?php foreach($results as $result) : ?>
<p><?php echo $result['nickname']?></p>
<!-- idとはphpMyAdminから来たもの -->
<p><?php echo $result['id']?></p>
<p><?php echo $result['email']?></p>
<?php endforeach; ?>
</body>
</html>