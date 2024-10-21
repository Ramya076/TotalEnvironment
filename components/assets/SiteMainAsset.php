<?php

namespace app\components\assets;

use yii\web\AssetBundle;

class SiteMainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web/site';
    public $css = [
        'css/bootstrap.min.css',
        'css/owl.theme.default.min.css',
        'css/owl.carousel.min.css',
        'css/layerslider.css',
        'css/magnific-popup.css',
        'css/animate.css',
        'css/boxicons.min.css',
        'css/flaticon.css',
        'css/comic-sans.css',
        'css/meanmenu.css',
        'css/style.css',
        'css/responsive.css',
        'plugins/bootstrap-sweetalert/sweet-alert.css',
        'developer/custom.css',
    ];
    public $js = [
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.meanmenu.js',
        'js/wow.min.js',
        'js/owl.carousel.js',
        'js/carousel-thumbs.js',
        'js/jquery.magnific-popup.min.js',
        'js/parallax.min.js',
        'js/jquery.mixitup.min.js',
        'js/greensock.js',
        'js/layerslider.transitions.js',
        'js/layerslider.kreaturamedia.jquery.js',
        'js/custom.js',
        'plugins/bootstrap-sweetalert/sweet-alert.min.js',
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
