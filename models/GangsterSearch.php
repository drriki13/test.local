<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gangster;

/**
 * GangsterSearch represents the model behind the search form of `app\models\Gangster`.
 */
class GangsterSearch extends Gangster
{

    public $gunName;
    public $gunType;
    public $gunStatus;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'last_name', 'nickname', 'city', 'cr eated_at', 'updated_at'], 'safe'],
            [['gunName', 'gunType'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'nickname' => 'Прозвище',
            'city' => 'Город',
            'status' => 'Статус',
            'gunName' => 'Название',
            'gunType' => 'Тип',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Gangster::find()->joinWith('gun');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'gangster.status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'gangster.name', $this->name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'city', $this->city]);

        $query->andFilterWhere(['=', 'gun.name', $this->gunName])
            ->andFilterWhere(['=', 'gun.type', $this->gunType]);

        return $dataProvider;
    }
}
