<?php

namespace app\components\assets;

use yii\web\AssetBundle;

class AdminMainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web/admin';
    public $css = [
        'css/separate/vendor/select2.min.css',
        'css/lib/font-awesome/font-awesome.min.css',
        'css/separate/vendor/bootstrap-touchspin.min.css',
        'css/lib/font-awesome/font-awesome.min.css',
        'css/lib/bootstrap/bootstrap.min.css',
        'css/main.css',
        'plugins/bootstrap-sweetalert/sweet-alert.css',
        'plugins/summernote/dist/summernote.css',
        'developer/custom.css',
    ];
    public $js = [
        'js/lib/popper/popper.min.js',
        'js/lib/tether/tether.min.js',
        'js/lib/bootstrap/bootstrap.min.js',
        'js/plugins.js',
        'js/lib/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js',
        'plugins/bootstrap-sweetalert/sweet-alert.min.js',
        'plugins/summernote/dist/summernote.min.js',
        'developer/custom.js',
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
