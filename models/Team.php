<?php

namespace app\models;

use app\models\interfaces\IHaveName;
use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 *
 * @property Player[] $players
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @param string $name
     * @param int|null $id
     * @return Team
     * @throws \Exception
     */
    public static function сhangeTeam(string $name, int $id = null): Team
    {
        if ($id){
            /** @var Team $team */
            $team = Team::find()->where(['id' => $id])->one();
            $team->name = $name;
        }else{
            $team = new Team();
            $team->name = $name;
        }
        if (!$team->save())
            throw new \Exception("Ошибка при сохранении!");

        return $team;
    }

    /**
     * @param string $name
     * @return int
     */
    public static function getCountTeam(string $name): int
    {
        return Team::find()->where(['name' => $name])->count();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[players]].
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::class, ['team_id' => 'id']);
    }
}
