<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 20:04
 */

use frontend\widgets\ProductListView;
use yii\data\ArrayDataProvider;

$this->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $model->seo_description], 'description');
$this->registerMetaTag(['name' => 'tags', 'content' => call_user_func(function () use ($model) {
    $tags = '';
    foreach ($model->articleTags as $tag) {
        $tags .= $tag->value . ',';
    }
    return rtrim($tags, ',');
}
)], 'tags');

$this->title = $model->title;

$css = "
.images_1_of_4{min-height: 190px;}
";
$this->registerCSS($css);

?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="back-links">
                <p><a href="/">首页</a> >>>> <a href="#"><?= $model->category ? $model->category->name : yii::t('app', 'uncategoried'); ?></a> >>>> <a href="#"><?= $model->title ?></a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="product-details">
                    <div class="grid images_3_of_2">
                        <div id="container">
                            <div id="products_example">
                                <div id="products">
                                    <div class="slides_container">
                                        <a href="javascript:;"><img style="width: 366px;"
                                                                    src="<?= $model->getThumbUrlBySize() ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2><?= $model->title ?></h2>
                        <p><?= $model->summary ?></p>
                        <div class="price">
                            <p>价格: <span><?= $model->sub_title ?></span></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product_desc">
                    <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>产品详情</li>
                            <div class="clear"></div>
                        </ul>
                        <div class="resp-tabs-container">
                            <div class="product-desc">
                                <p>
                                    <?= $model->articleContent->content ?>
                                </p>
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content_bottom">
                    <div class="heading">
                        <h3>相关产品</h3>
                    </div>
                    <div class="see">
                        <p><a href="/<?= $model->category->name ?>">查看全部</a></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <?= ProductListView::widget([
                        'dataProvider' => new ArrayDataProvider([
                            'allModels' => $recommends,
                            'pagination' => [
                                'pageSize' => 4
                            ]
                        ]),
                    ]) ?>
                </div>
            </div>
            <div class="rightsidebar span_3_of_1">
                <?= \frontend\themes\jiebao\widgets\category\CategoryMenu::widget([]) ?>
            </div>
        </div>
    </div>
</div>

<?php

$js = "$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: '/static/img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});";
$this->registerJs($js);
?>