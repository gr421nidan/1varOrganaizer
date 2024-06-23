<?php

use app\models\Meet;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои встречи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назначить встречу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'contact_id',
            'date',
            'description:ntext',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Meet $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
