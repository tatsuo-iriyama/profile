<div>
    <h2>お問い合わせ履歴</h2>
    <?= $this->Flash->render() ?>
    <div>
        <?php foreach($inquireHistories as $inquireHistory): ?>
            <div style="border-bottom: 1px solid black">
                <p>タイトル：<?= $inquireHistory->title ?></p>
                <p>お問い合わせ内容：<?= $inquireHistory->text ?></p>
                <p>お問い合わせ日時：<?= date('Y-m-d', strtotime($inquireHistory->created_at)) . "&nbsp;" . str_replace('-', ':', date('H-i', strtotime($inquireHistory->created_at))) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div>
        <a href="inquires">戻る</a>
    </div>
</div>