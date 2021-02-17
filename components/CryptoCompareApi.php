<?php


namespace app\components;

use app\models\CryptoForm;
use Yii;

use yii\httpclient\Client;

class CryptoCompareApi
{
    /** @var string */
    private $url;
    /** @var string */
    private $altcoin;
    /** @var string */
    private $currencies;

    public function __construct(CryptoForm $cryptoForm)
    {
        $this->url = Yii::$app->params['cryptoCompareApi']['url'];
        $this->altcoin = $cryptoForm->altcoin;
        if ($cryptoForm->currencies)
            $this->currencies = implode(",", $cryptoForm->currencies);
    }

    public function getData()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($this->url)
            ->setData(['fsym' => $this->altcoin, 'tsyms' => $this->currencies])
            ->send();
        if ($response->isOk) {
            $data = $response->data;
        }

        return $data ?? [];
    }
}