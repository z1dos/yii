<?php

use app\models\Theme;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Модерация Тем';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'text:ntext',
            ['attribute' => 'status', 'value' => function ($data) {
                return $data->getStatusText();
            }],
            ['attribute' => 'date', 'format' => ['date', 'd-MM-Y H:i:s']],

            [
                'attribute' => 'Адмнистратирование',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->status) {
                        case 1:
                            return Html::a('Одобрить', 'approve/?id=' . $data->id) . " | " .
                                Html::a('Отклонить', 'reject/?id=' . $data->id);
                        case 2:
                            Html::a('Отклонить', 'reject/?id=' . $data->id);
                        case 3:
                            Html::a('Одобрить', 'approve/?id=' . $data->id);
                    }
                }
            ],
            
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>


</div>
