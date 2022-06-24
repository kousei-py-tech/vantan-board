<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>トップ</title>
</head>
<body>
<header>
    <div>
        <a href="/vantan-board/index.php">TOP</a>
        <a href="/vantan-board/regster.php">新規作成</a>
        <a href="/vantan-board/login.php">ログイン</a>
        <a href="/vantan-board/logout.php">ログアウト</a>
    </div>
    <h1>トップ</h1>
</header>
<div>
    <?php echo "{$_SESSION['name']}さんようこそ"; ?>
</div>
<div>
    <h2>掲示板一覧</h2>
    <ul>
    <?php
    foreach ($boards as $board) {
        echo "<li><a href=\"/vantan-board/board.php?id={$board['id']}\" >{$board['title']}</a></li>";
    }
    ?>
    </ul>
</div>
</body>
</html>
