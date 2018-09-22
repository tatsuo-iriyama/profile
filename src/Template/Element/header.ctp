<?php if ($authenticateUser): ?>
    <?php // ログインしていれば表示する ?>
    <div>
        <h2>
            <a href="/profile">guts engineer</a>
        </h2>
    </div>
    <div>
        <a href="users/logout">ログアウト</a>
    </div>
<?php else: ?>
    <?php // ログインしていなければ表示する ?>
    <div>
        新規登録は<a href="index">こちら</a>
    </div>
<?php endif; ?>