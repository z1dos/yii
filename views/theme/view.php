<?php
//
//use yii\helpers\Html;
//use yii\widgets\DetailView;
//
///** @var yii\web\View $this */
///** @var app\models\Theme $model */
//
//$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Themes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
//?>
<!--<div class="theme-view">-->
<!---->
<!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><? //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><? //= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><? //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'name',
//            'text:ntext',
//            'status',
//            'date',
//            'id_user',
//        ],
//    ]) ?>
<!---->
<!--</div>-->


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Theme $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="theme-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            ['attribute' => 'date', 'format' => ['date', 'd-MM-Y H:i:s']],
            'text:ntext'
        ],
    ])
    ?>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'user.name',
            'text.ntext',
            ['attribute' => 'date', 'format' => ['date', 'd-MM-Y H:i:s']]
        ],
    ]) ;?>

    <div class="answer-form">

        <?php $form = \yii\widgets\ActiveForm::begin(['action' => '/answer/create']);
        $answer = new \app\models\Answer();
        ?>

        <?= $form->field($answer, 'text')->textarea(['rows' => 6]) ?>

        <?= $form->field($answer, 'id_theme')->hiddenInput(['value' => $model->id])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php \yii\widgets\ActiveForm::end(); ?>

    </div>

</div>

