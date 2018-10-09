<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 15:19
 */

use common\models\Article;
use common\models\Options;
use frontend\widgets\ArticleListView;
use frontend\widgets\ProductListView;
use frontend\widgets\ScrollPicView;
use yii\data\ArrayDataProvider;

$this->title = yii::$app->feehi->website_title;
?>
<div class="header_slide">
    <div class="header_bottom_left">
        <div class="categories">
        <?= \frontend\themes\jiebao\widgets\category\CategoryMenu::widget([]) ?>
        </div>
    </div>
    <div class="header_bottom_right">
        <div class="slider">
            <div id="slider">
                <?= ScrollPicView::widget([
                    'banners' => Options::getBannersByType('index'),
                ]) ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3><?=$type?></h3>
            </div>
            <div class="see">
                <p><a href="/newest">查看全部</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
        <?= ProductListView::widget([
            'dataProvider' => $dataProvider,
        ]) ?>
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>随机展示</h3>
            </div>
            <div class="see">
                <p><a href="/newest">查看全部</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?= ProductListView::widget([
                'dataProvider' => new ArrayDataProvider([
                    'allModels' => Article::find()->limit(1)->limit(4)->with('category')->orderBy("sort asc")->all(),
                ])]) ?>
        </div>
    </div>
</div>