<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "packs".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $body
 * @property string|null $img
 * @property string|null $date
 *
 * @property User $user
 */
class Packs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['body'], 'string'],
            [['first_name', 'last_name', 'date'], 'safe'],
            [['title', 'img', 'date'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'img' => Yii::t('app', 'Img'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return PacksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PacksQuery(get_called_class());
    }
}
