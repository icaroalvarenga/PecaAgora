<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mercadoLivre".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $access_token
 * @property string $client_id
 * @property string $client_secret
 */
class MercadoLivre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mercadoLivre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
           
        ];
    }

    public function returnURL()
    {
        return 'https://localhost/PecaAgora/basic/web/index.php';
    }
}
