<?php

namespace app\assets;

use yii\web\AssetBundle;

class UserSearchPageAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/UserSearchPage.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        TestAsset::class,
    ];
}
