<?php

/** @var yii\web\View $this */

$this->title = 'Мой органайзер';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Ваш органайзер!</h1>

        <p class="lead">Посмотрите своё расписание встреч.</p>
        <?php if(Yii::$app->user->isGuest):?>
        <p>
            <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['site/login'])?>">Мои встречи</a>
        </p>
        <?php else: ?>
            <p>
                <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['meet/index'])?>">Мои встречи</a>
            </p>
        <?php endif; ?>
    </div>

</div>
