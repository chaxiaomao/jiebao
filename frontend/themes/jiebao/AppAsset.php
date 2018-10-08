<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 15:05
 */
namespace frontend\themes\jiebao;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $css = [
        'css/easy-responsive-tabs.css',
        'css/global.css',
        'css/slider.css',
        'css/style.css',
        'css/feehi.css',

    ];
    public $js = [
        'js/easing.js',
        'js/easyResponsiveTabs.js',
        'js/jquery.accordion.js',
        'js/jquery.easing.js',
        'js/jquery-1.7.2.min.js',
        'js/move-top.js',
        'js/script.js',
        'js/slides.min.jquery.js',
        'js/startstop-slider.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];

    public function init() {
        $this->sourcePath = '@app/themes/' . JB_THEME_1 . '/assets';
        parent::init();
    }
}