<div>
    <?= $this->Form->create($inquires, [
        'type' => 'post',
        'url' => [
            'controller' => 'Inquires',
            'action' => 'index'
        ],
        'context' => [
            'validate' => 'default'
        ]
    ]) ?>

    <h2>お問い合わせフォーム</h2>

    <?= $this->Flash->render() ?>

    <div>
        <p>タイトル</p>
        <?= $this->Form->input('title', [
            'type' => 'text',
            'label' => false
        ]) ?>
    </div>

    <div>
        <p>お問い合わせ内容</p>
        <?= $this->Form->input('text', [
            'type' => 'textarea',
            'label' => false
        ]) ?>
    </div>

    <div>
        <?= $this->Form->submit() ?>
    </div>

    <?= $this->Form->end() ?>
</div>