<?php


namespace app\assets;


use yii\web\AssetBundle;

class DieAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/die.css',
    ];
    public $js = [
    ];
}