<?= $this->Html->css('root.css'); ?>

<div class="container" style="height: 700px">
    <div class="top-page-block">
        <h1 class="top-page-block_title">ガッツ系エンジニア</h1>
        <p class="top-page-block_sub-title">
            やればできる。<br>
            異色の経歴からエンジニアになるまでを紹介。
        </p>
    </div>

    <?php // TODO: 遷移しようとした時、ログイン判定処理を追加する ?>
    <?php // ログインしていなければ、ログインフォームに遷移させる。 ?>
    <div class="profile-link-block">
        <?php // TODO: プロフィールへのリンクを貼る ?>
        <a href="/profile/profile" class="profile-link-block_btn">
            profileを見る
        </a>
    </div>
</div>

<?php // TODO: 遷移しようとした時、ログイン判定処理を追加する ?>
<?php // ログインしていなければ、ログインフォームに遷移させる。 ?>
<div class="orther-list-block">
    <div class="orther-list-block_detail" data-element-id="first-contents-block">
        <?php // TODO: Qiitaのマイページへの遷移リンク作成 ?>
        <p class="qiita-block" data-element-id="qiita">Qiitaやってます。</p>
        <div class="articles-block">
            <?php // TODO: 最新記事をいくつか表示 ?>
        </div>
    </div>

    <div class="orther-list-block_detail" data-element-id="second-contents-block">
        <?php // TODO: WordPressで運用予定のブログへの遷移リンク作成 ?>
        <p class="blog-block" data-element-id="blog">ブログやってます。</p>
        <div class="articles-block">
            <?php // TODO: 最新記事をいくつか表示 ?>
        </div>
    </div>

    <div class="orther-list-block_detail" data-element-id="third-contents-block">
        <?php // TODO: インターン先コーポレートサイトへのリンク作成 ?>
        <p class="internship-block" data-element-id="internship">インターンしてます。</p>
        <div class="internship-introduction">
            <?php // TODO: コーポレート、サービス、メディアの紹介 ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php // TODO: other listに対する動的処理追加 ?>
</script>
