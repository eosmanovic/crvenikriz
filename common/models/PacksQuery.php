<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Packs]].
 *
 * @see Packs
 */
class PacksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Packs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Packs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
