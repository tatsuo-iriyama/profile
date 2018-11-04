<div>
    <?= $this->Form->create($inquires, [
        'type' => 'post',
        'url' => [
            'controller' => 'Inquires',
            'action' => 'complete'
        ],
        'context' => [
            'validate' => 'default'
        ]
    ]) ?>

    <h2>お問い合わせ内容確認画面</h2>

    <div>
        <div>
            <p>タイトル：<?= $inquires->title ?></p>
        </div>

        <div>
            <p>お問い合わせ内容：<?= $inquires->text ?></p>
        </div>

        <div>
            <?= $this->Form->submit() ?>
        </div>

        <div>
            <a href="inquires">入力内容を変更する</a>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>