<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */

$this->title = 'Главная страница'; ?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->name, '/yii/web/theme/view?id=' . $data->id);
                }],
            'text:ntext',
            ['attribute' => 'Ответы', 'value' => function ($data) {
                return count($data->answers);
            }],

        ],
    ]); ?>


</div>
