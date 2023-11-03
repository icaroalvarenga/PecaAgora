<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cargos $model */

$this->title = Yii::t('app', 'Atualizar Cargo: {name}', [
    'name' => $model->nome,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cargos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="cargos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
