<?php
    // フォームかを判定
    $isForm = (
        $this->name == 'Users'
        || $this->name == 'Login'
    );

 ?>

<div>
    <?php if (!$isForm): ?>
        <div>
            <a href="users"><h2>新規登録</h2></a>
        </div>
        <div>
            <?php // TODO: ログインフォーム作成 ?>
            <h2>ログイン</h2>
        </div>
    <?php endif; ?>
</div>
