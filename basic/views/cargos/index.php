<?php

use app\models\Cargos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CargosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Cargos');
?>
<div class="cargos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            [
                'class' => ActionColumn::className(), 'template' => '{update} {delete}',
                'urlCreator' => function ($action, Cargos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Criar Cargo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
