<?php

use app\models\Funcionarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FuncionariosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Funcionários');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            [
                'label' => 'Cargo',
                'attribute' => 'id_cargo',
                'value' => 'cargo.nome'
            ],
            'cep',
            'cidade',
            'logradouro',
            'estado',
            'numero',
            'complemento',           

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Funcionarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Criar Funcionário'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
