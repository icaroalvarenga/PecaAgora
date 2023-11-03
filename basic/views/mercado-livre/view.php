<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MercadoLivre $model */

$this->title = $model['id'];
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercado Livres'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mercado-livre-view">
    <p>Buscar outro produto.</p>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<hr class="hr my-5" />

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container">
        <div class="row m-5">
            <?php if(!empty($model['erro'])): ?>
                <div class="col m-5">
                    <h3><?= $model['erro'] ?></h3>
                </div>
            <?php else: ?>
            <div class="col">
                <?= Html::img($model['thumbnail'], [
                'alt'=>'Peça Agora',
                'width' => '150px',
                'height' => '150px'
                
                ]) ?>
            </div>
            <div class="col-9">
                <?= DetailView::widget([
                'model' => $model,
                'attributes' => [                   
                    'id',
                    [
                        'label' => 'Título',
                        'attribute' => 'id_cargo',
                        'value' =>  $model['title']
                    ],
                    [
                        'label' => 'Categoria',
                        'attribute' => 'id_cargo',
                        'value' =>  $model['category_id']
                    ],
                    [
                        'label' => 'Preço',
                        'attribute' => 'id_cargo',
                        'value' => Yii::$app->formatter->asCurrency($model["price"], "R$")                      
                    ],
                    [
                        'label' => 'Quantidade Disponível',
                        'attribute' => 'Quantidade Disponível',
                        'value' =>  $model['available_quantity']
                    ],
                    [
                        'label' => 'Permalink',
                        'attribute' => 'id_cargo',
                        'value' =>  Html::a($model['permalink'], $model['permalink'],['target'=>'_blank']),
                        'format'=>'raw',
                    ],
                ],
                ]) ?>
            </div>
            <?php endif; ?>

        </div>
    </div>
    

</div>
