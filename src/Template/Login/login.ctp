<div>
    <?= $this->Form->create(null, [
        'type' => 'post',
        'url' => [
            'action' => 'login'
        ]
    ]) ?>

    <div>
        <h1>ログイン画面</h1>
    </div>

    <div>
        <?= $this->Flash->render() ?>
    </div>

    <div>
        <div>
            <p>メールアドレス</p>
        </div>
        <div>
            <?= $this->Form->input('email', [
                'type' => 'text',
                'label' => false,
                'placeholder' => 'メールアドレス',
            ]) ?>
        </div>
    </div>

    <div>
        <div>
            <p>パスワード</p>
        </div>
        <div>
            <?= $this->Form->input('password', [
                'type' => 'password',
                'label' => false,
                'placeholder' => 'メールアドレス'
            ]) ?>
        </div>
    </div>

    <div>
        <div>
            <?= $this->Form->submit('ログイン', [
                'class' => ''
            ]) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
