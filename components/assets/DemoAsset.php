<?php

namespace app\components\assets;

use yii\web\AssetBundle;

class DemoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web/demo';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
