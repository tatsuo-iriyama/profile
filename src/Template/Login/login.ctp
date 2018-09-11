<div class="container-block">
    <?php // ログインフォーム作成 ?>
    <?= $this->Form->create(null, [
        'type' => 'post',
        'url' => [
            'action' => 'login'
        ]
    ]) ?>

    <div class="container-block_title">
        <h1>ログイン</h1>
    </div>

    <div class="container-block_message">
        <?= $this->Flash->render() ?>
    </div>

    <div class="container-block_form">
        <div class="input-block">
            <div class="input-block_address">
                <p class="address-block">メールアドレス</p>
            </div>
            <div class="input-block_address-form">
                <?= $this->Form->input('email', [
                    'type' => 'text',
                    'label' => false,
                    'placeholder' => 'メールアドレス',
                ]) ?>
            </div>
        </div>

        <div class="input-block">
            <div class="input-block_password">
                <p class="password-block">パスワード</p>
            </div>
            <div class="input-block_password-form">
                <?= $this->Form->input('password', [
                    'type' => 'password',
                    'label' => false,
                    'placeholder' => 'メールアドレス'
                ]) ?>
            </div>
        </div>
    </div>

    <div class="container-block_submit">
        <div class="submit-block">
            <?= $this->Form->submit('ログイン', [
                'class' => ''
            ]) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
