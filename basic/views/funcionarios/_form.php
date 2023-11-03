<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cargos;

/** @var yii\web\View $this */
/** @var app\models\Funcionarios $model */
/** @var yii\widgets\ActiveForm $form */


//Registrando o JS que para pegar cep e gerar endereco
$this->registerJsFile(Yii::$app->request->baseUrl.'/cep.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="funcionarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    <!-- pega os cargos e gera um dropdown substituindo os ids pelo nome do cargo -->
    <?= $form->field($model, 'id_cargo')->dropDownList(ArrayHelper::map(Cargos::find()->orderBy('nome')->asArray()->all(), 'id', 'nome'),['prompt'=>'Selecione um cargo'])->label('Cargo') ?>

    <?= $form->field($model, 'cep')->textInput(['maxlength' => true,  'onblur' => 'pesquisacep();']) ?>

    <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
