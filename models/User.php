<?php

namespace app\models;

use app\models\interfaces\IHaveName;
use app\models\query\UserQuery;
use app\models\validators\PhoneValidator;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $last_name
 * @property int|null $age
 * @property string $email
 * @property string|null $password
 * @property int|null $salary
 * @property string $phone
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Passport $passport
 */
class User extends \yii\db\ActiveRecord implements IHaveName
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'salary'], 'integer'],
            [['name'], 'required'],
            [['email'], 'required'],
            [['password'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'last_name', 'email', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
            ['phone', PhoneValidator::class],
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
            'age' => 'Возраст',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'salary' => 'Зарплата',
            'phone' => 'Телефон',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Passports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPassport()
    {
        return $this->hasOne(Passport::class, ['user_id' => 'id']);
    }

    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /** @return string */
    public function getName()
    {
        return $this->name;
    }
}
