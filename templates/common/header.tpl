<header>
  <div>
    <a href="/vantan-board/index.php">TOP</a>
    <a href="/vatnan-board/create_board.php">掲示板作成</a>
    {if empty($user)}
      <a href="/vantan-board_object/register.php">新規作成</a>
      <a href="/vantan-board/login.php">ログイン</a>
    {else}
      <a href="/vantan-board/logout.php">ログアウト</a>
    {/if}
  </div>
</header>