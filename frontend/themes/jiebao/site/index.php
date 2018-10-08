<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 15:19
 */

use common\models\Options;
use frontend\widgets\ArticleListView;
use frontend\widgets\ProductListView;
use frontend\widgets\ScrollPicView;
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
                <p><a href="#">查看全部</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
        <?= ProductListView::widget([
            'dataProvider' => $dataProvider,
        ]) ?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="see">
                <p><a href="#">查看全部</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.html"><img src="images/new-pic1.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">$849.99</span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="preview.html">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.html"><img src="images/new-pic2.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">$599.99</span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="preview.html">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.html"><img src="images/new-pic4.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">$799.99</span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="preview.html">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="preview.html"><img src="images/new-pic3.jpg" alt="" /></a>
                <h2>Lorem Ipsum is simply </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">$899.99</span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="preview.html">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>