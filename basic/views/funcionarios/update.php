<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Funcionarios $model */

$this->title = Yii::t('app', 'Atualizar Funcionario: {name}', [
    'name' => $model->nome,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="funcionarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
