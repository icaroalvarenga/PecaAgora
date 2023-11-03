<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Funcionarios $model */

$this->title = Yii::t('app', 'Criar Funcionário');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="funcionarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
