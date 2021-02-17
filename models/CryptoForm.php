<?php


namespace app\models;


use yii\base\Model;

class CryptoForm extends Model
{
    /** @var string */
    public $altcoin;
    /** @var array */
    public $currencies;

    public function rules()
    {
        return [
            ['altcoin', 'string'],
            ['currencies', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'altcoin' => 'AltCoin',
          'currencies' => 'Валюты',
        ];
    }

    public static function getAltcoinList():array
    {
        return[
            'BTC' => 'BTC',
            'ETH' => 'ETH',
            'LTC' => 'LTC',
        ];
    }

    public static function getCurrenciesList():array
    {
        return[
            'RUB' => 'RUB',
            'USD' => 'USD',
            'EUR' => 'EUR',
        ];
    }
}