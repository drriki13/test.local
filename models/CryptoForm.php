<?php


namespace app\models;


use app\components\CryptoCompareApi;
use yii\base\Model;
use yii\helpers\ArrayHelper;

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

    /**
     * @return array
     */
    public function getAltcoinData(): array
    {
        $success = true;
        if ($this->loadSuccess()) {
            $data = (new CryptoCompareApi($this))->getData();
        } else {
            $firstErrorAsArray = $this->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = ArrayHelper::getValue($firstErrorAsArray, $firstKey);
            $success = false;
        }

        return [
            'success' => $success,
            'error' => $error ?? '',
            'data' => $data ?? []
        ];
    }

    /**
     * @return array|mixed
     */
    protected function loadSuccess()
    {
        $r = \Yii::$app->request;
        if (
            ($r->isGet && $this->load($r->get())) ||
            ($r->isPost && $this->load($r->post()))
        ) {
            return (new CryptoCompareApi($this))->getData();
        }
    }

}