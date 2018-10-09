<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/8
 * Time: 10:06
 */

use common\models\Article;
use frontend\widgets\ArticleListView;
use frontend\widgets\CategoryListView;
use frontend\widgets\ProductListView;
use yii\data\ArrayDataProvider;
use yii\widgets\LinkPager;

$this->title = $title;

$css = "
.grid_1_of_4:first-child{margin-left:1.2%;}
.images_1_of_4{max-height: 180px;min-height: 180px;}
";
$this->registerCSS($css);


?>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">

                    <?= CategoryListView::widget([
                        'dataProvider' => $dataProvider,
                    ]) ?>

            </div>
            <div class="rightsidebar span_3_of_1">
                <?= \frontend\themes\jiebao\widgets\category\CategoryMenu::widget([]) ?>
            </div>
        </div>
    </div>
</div>
