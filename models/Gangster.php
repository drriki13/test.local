<?php

namespace app\models;

use app\models\interfaces\IHaveName;
use phpDocumentor\Reflection\Types\This;
use Yii;

/**
 * This is the model class for table "gangster".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $nickname
 * @property string|null $city
 * @property int|null $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Gun $gun
 */
class Gangster extends \yii\db\ActiveRecord implements IHaveName
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gangster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'last_name', 'nickname', 'city'], 'string', 'max' => 255],
            [['nickname'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'nickname' => 'Прозвище',
            'city' => 'Город',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getFullName():string
    {
        return trim($this->name . ' ' . $this->last_name);
    }

    public static function getStatusList():array
    {
        return [
          '1' => 'Жив',
          '0' => 'Мертв',
        ];
    }

    public static function getStatus(int $status):string
    {
        $statusLabel = Gangster::getStatusList();
        return $statusLabel[$status];
    }

    /**
     * Gets query for [[Gun]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGun()
    {
        return $this->hasOne(Gun::class, ['gangster_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
