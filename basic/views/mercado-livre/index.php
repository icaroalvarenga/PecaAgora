<?php

use app\models\MercadoLivre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MercadoLivreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Mercado Livre');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="mercado-livre-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>        Buscar produto do Mercado Livre pelo seu ID   </p>
    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>



</div>
