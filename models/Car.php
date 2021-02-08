<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int|null $people_id
 * @property string|null $brand
 * @property string|null $model
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property People $owner
 */
class Car extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['brand', 'model'], 'string', 'max' => 255],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::className(), 'targetAttribute' => ['people_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people_id' => 'People ID',
            'brand' => 'Brand',
            'model' => 'Model',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }
}
