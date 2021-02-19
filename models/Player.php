<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property int $id
 * @property int $team_id
 * @property string $name
 * @property int $age
 * @property int $rating
 *
 * @property Team $team
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'name', 'age', 'rating'], 'required'],
            [['team_id', 'age', 'rating'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => 'Team ID',
            'name' => 'Name',
            'age' => 'Age',
            'rating' => 'Rating',
        ];
    }

    /**
     * @param string $playerName
     * @param string $teamName
     * @return Player
     * @throws \Exception
     */
    public static function changePlayerTeam(string $playerName, string $teamName): Player
    {
        if (self::getCountPlayer($playerName) > 1)
            throw new \Exception("Игроков с данным именем более одного");
        /** @var Player $player */
        $player = Player::find()->where(['name' => $playerName])->one();
        if (!$player)
            throw new \Exception("В БД нет игрока с таким именем");
        if (Team::getCountTeam($teamName) > 1)
            throw new \Exception("Команд с данным название больше одной");
        /** @var Team $team */
        $team = Team::find()->where(['name' => $teamName])->one();
        if (!$team)
            throw new \Exception("В БД нет команды с таким названием");
        $player->team_id = $team->id;
        if (!$player->save())
            throw new \Exception("Ошибка при сохранении!");

        return $player;
    }

    /**
     * @param string $name
     * @param int|null $id
     * @return Player
     * @throws \Exception
     */
    public static function сhangePlayer(string $name, int $id = null): Player
    {
        if ($id){
            /** @var Player $player */
            $player = Team::find()->where(['id' => $id])->one();
            $player->name = $name;
        }else{
            $player = new Player();
            $player->name = $name;
        }
        if (!$player->save())
            throw new \Exception("Ошибка при сохранении!");

        return $player;
    }

    /**
     * @param string $name
     * @return int
     */
    public static function getCountPlayer(string $name): int
    {
        return Player::find()->where(['name' => $name])->count();
    }

    /**
     * Get query for [[team]].
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::class, ['id' => 'team_id']);
    }
}
