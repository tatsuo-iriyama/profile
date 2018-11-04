<div>
    <?php foreach ($results as $result): ?>
        <h3>
            ・
            <a href="<?= $result->url ?>" style="color: black" onMouseOut="this.style.color='black'" onMouseOver="this.style.color='red'">
                <?= $result->title ?>
            </a>
        </h3>
    <?php endforeach; ?>
</div>
<div>
    <a href="/" style="color: black;">戻る</a>
</div>