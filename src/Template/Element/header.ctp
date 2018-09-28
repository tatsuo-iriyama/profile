<?php if ($authenticateUser): ?>
    <div>
        <h2>guts engineer</h2>
    </div>
    <?php if ($this->request->action !== 'logout'): ?>
        <div>
            <a href="logout">ログアウト</a>
        </div>
    <?php endif ?>
<?php else: ?>
    <?php if ($this->name !== 'Users'): ?>
        <div>
            新規登録は<a href="users">こちら</a>
        </div>
    <?php endif; ?>
<?php endif; ?>