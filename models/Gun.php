<?php

namespace app\models;

use app\models\interfaces\IHaveName;
use Yii;

/**
 * This is the model class for table "gun".
 *
 * @property int $id
 * @property int|null $gangster_id
 * @property string|null $name
 * @property string|null $type
 * @property int|null $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Gangster $gangster
 */
class Gun extends \yii\db\ActiveRecord implements IHaveName
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gangster_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'type'], 'string', 'max' => 255],
            [['gangster_id'], 'unique'],
            [['gangster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gangster::class, 'targetAttribute' => ['gangster_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gangster_id' => 'Gangster ID',
            'name' => 'Название',
            'type' => 'Тип',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getWeaponList()
    {
       return Gun::find()->select(['name'])->indexBy('name')->column();
    }

    public static function getTypeList()
    {
        return Gun::find()->select(['type'])->indexBy('type')->column();
    }

    /**
     * Gets query for [[Gangster]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGangster()
    {
        return $this->hasOne(Gangster::class, ['id' => 'gangster_id']);
    }

    /** @return string */
    public function getName()
    {
        return $this->name;
    }
}
