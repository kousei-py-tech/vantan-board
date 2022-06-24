<?php
session_start();

$message = '';
try {
    $DBSERVER = 'localhost';
    $DBUSER = 'board';
    $DBPASSWD = 'boardpw';
    $DBNAME = 'board';

    $dsn = 'mysql:'
        . 'host=' . $DBSERVER . ';'
        . 'dbname=' . $DBNAME . ';'
        . 'charset=utf8';
    $pdo = new PDO($dsn, $DBUSER, $DBPASSWD, array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (Exception $e) {
    $message = "接続に失敗しました: {$e->getMessage()}";
}

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $sql = 'INSERT INTO `users` (name, email, password, createdAt, updatedAt)';
    $sql .= ' VALUES (:name, :email, :password, NOW(), NOW())';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $result = $stmt->execute();
    if($result) {
        $message = 'ユーザーを作成しました';
    } else {
        $message = '登録に失敗しました';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規作成</title>
</head>
<body> 
<header>
    <a href="vantan-board/index.php">TOP</a>
    <a href="vantan-board/regster.php">新規作成</a>
    <a href="vantan-board/login.php">ログイン</a>
    <a href="vantan-board/logout.php">ログアウト</a>
</header>
<h1>新規作成</h1>
<div>
    <form action="#" method="post">
    	<label>メールアドレス<input type="email" name="email"><label><br/>
        <label>パスワード<input type="password" name="password"><label><br/>
        <label>名前<input type="text" name="name"><label><br/>
        <input type="submit" value="新規登録">
    <form>
</div>
</body>
</html>

