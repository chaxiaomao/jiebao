<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 14:06
 */

use yii\helpers\Html;
use yii\helpers\Url;

\frontend\themes\jiebao\AppAsset::register($this);
$css = "
.company{color:#B81D22;font-size:42px;}
";
$this->registerCSS($css);
?>
<div class="header">
    <div class="headertop_desc">
        <div class="call">
            <p><span>需要帮助?</span> 联系 <span class="number"> 13420341661 冯生</span></span></p>
        </div>
        <div class="account_desc">

        </div>
        <div class="clear"></div>
    </div>
    <div class="header_top">
        <div class="logo">
            <a class="company" href="/"><?= Yii::$app->feehi->website_title ?></a>
<!--            <a href="/"><img src="images/logo.png" alt=""/></a>-->
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom">
        <div class="menu">
            <ul>
                <li class="active"><a href="/">首页</a></li>
                <li><a href="/page/about">关于我们</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="search_box">
            <form action="<?= Url::to('/site/search') ?>" method="get">
                <input id="s" type="text" name="q" value="<?= Html::encode(yii::$app->request->get('q')) ?>" required=""
                       placeholder="<?= yii::t('frontend', 'Please input keywords') ?>" name="s" value="" ><input type="submit" value="">

<!--                <input type="text" value="Search" onfocus="this.value = '';"-->
<!--                       onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">-->
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
