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
     * Get query for [[team]].
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::class, ['id' => 'team_id']);
    }
}
