<div>
    <?= $this->Form->create($user, [
        'type' => 'post',
        'url' => [
            'action' => 'save',
            'controller' => 'users'
        ],
        'context' => [
            'validate' => 'register'
        ],
        'class' => ''
    ]) ?>

    <h2>確認画面</h2>

    <div>
        <div>
            <p>名前：<?= $user->name ?></p>
        </div>

        <div>
            <p>パスワード：*******</p>
        </div>

        <div>
            <p>電話番号：<?= $user->tell ?></p>
        </div>

        <div>
            <p>メールアドレス：<?= $user->email ?></p>
        </div>

        <div>
            <p>郵便番号：<?= $user->postal_code ?></p>
        </div>

        <div>
            <p>住所：<?= $user->address ?></p>
        </div>

        <div>
            <?= $this->Form->submit() ?>
        </div>
        <div>
            <?= $this->Html->Link('入力内容を変更する', [
                'controller' => 'Users',
                'action' => 'index'
            ]) ?>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>