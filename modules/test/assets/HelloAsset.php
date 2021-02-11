<?php

namespace app\modules\test\assets;

use yii\web\AssetBundle;


class HelloAsset extends AssetBundle
{
    /** @inheritdoc */
    public $sourcePath = '@app/modules/test/assets/resources';

    public $css = [
        'css/hello.css',
    ];
    public $js = [
        'js/hello.js',
    ];
}
