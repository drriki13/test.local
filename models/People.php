<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $last_name
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Car[] $cars
 */
class People extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['people_id' => 'id']);
    }
}
