<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MercadoLivreSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mercado-livre-search">

    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar Produto'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
