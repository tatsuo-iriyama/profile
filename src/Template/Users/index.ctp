<div>
    <?= $this->Form->create($user, [
        'type' => 'post',
        'url' => [
            'action' => 'index',
            'controller' => 'users'
        ],
        'context' => [
            'validator' => 'register'
        ],
        'class' => ''
    ]) ?>
    <h2>新規会員登録</h2>

    <?= $this->Flash->render() ?>

    <div  style="margin-bottom: 0px">
        <div>
            <p>名前：</p>
            <div style="margin-left: 20px">
                <?= $this->Form->input('name', [
                    'type' => 'text',
                    'label' => false,
                ]) ?>
            </div>
        </div>

        <div>
            <p>パスワード：</p>
            <div style="margin-left: 20px">
                <?= $this->Form->input('password_hash', [
                    'type' => 'password',
                    'label' => false
                ]) ?>
            </div>
        </div>

        <div>
            <p>電話番号：</p>
            <div style="margin-left: 20px">
                <?= $this->Form->input('tell', [
                    'type' => 'text',
                    'label' => false
                ]) ?>
            </div>
        </div>

        <div>
            <p>メールアドレス：</p>
            <div style="margin-left: 20px">
                <?= $this->Form->input('email', [
                    'type' => 'email',
                    'label' => false
                ]) ?>
            </div>
        </div>

        <div>
            <p>郵便番号：</p>
            <div style="margin-left: 20px">
                <?= $this->Form->input('postal_code', [
                    'type' => 'text',
                    'label' => false
                ]) ?>
            </div>
        </div>

        <div>
            <p>住所：</p>
            <div style="margin-left: 20px">
                <?= $this->Form->input('address', [
                    'type' => 'text',
                    'label' => false
                ]) ?>
            </div>
        </div>
        <div style="margin-top: 16px">
            <?= $this->Form->submit(); ?>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>