<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "passport".
 *
 * @property int $id
 * @property int|null $number
 * @property int|null $user_id
 * @property int|null $code
 * @property string|null $address
 * @property string|null $city
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 */
class Passport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'user_id', 'code'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['address', 'city'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'user_id' => 'User ID',
            'code' => 'Code',
            'address' => 'Address',
            'city' => 'City',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
