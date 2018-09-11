<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <div>
            <?php // TODO: TOPページへの遷移リンク作成 ?>
            <?php // TODO: ログインフォームでは左に持ってくる。(トップページでは、センターに表示) ?>
            <h2>〜Profile〜</h2>
        </div>
        <div>
            <?php // TODO: ログインフォーム作成 ?>
            <?php // TODO: ログインフォームへ遷移させる。ログインフォームでは表示させない。 ?>
            <h2>ログイン</h2>
        </div>
    </header>

    <?php // TODO: 引数指定無しの場合、どんな挙動をするのか調査 ?>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <footer>
        <div>
            <?php // TODO: 問い合わせフォーム作成 ?>
            <h2>footer</h2>
        </div>
    </footer>
</body>
</html>
