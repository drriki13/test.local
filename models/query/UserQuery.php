<?php

namespace app\models\query;

use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    public function successful()
    {
        return $this->andWhere([
            '>','salary', '250000',
        ]);
    }

    public function adult()
    {
        return $this->andWhere([
            '>','age', '35',
        ]);
    }
}