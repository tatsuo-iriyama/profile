<?php if ($authenticateUser): ?>
    <?php // ログインしていれば表示する ?>
    <div>
        <h2>
            <a href="/profile">guts engineer</a>
        </h2>
    </div>
    <?php if ($this->request->name == 'logout'): ?>
        <div>
            <a href="logout">ログアウト</a>
        </div>
    <?php endif ?>
<?php else: ?>
    <?php // ログインしていなければ表示する ?>
    <div>
        新規登録は<a href="users">こちら</a>
    </div>
<?php endif; ?>