<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Enderecos]].
 *
 * @see Enderecos
 */
class EnderecosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Enderecos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Enderecos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
