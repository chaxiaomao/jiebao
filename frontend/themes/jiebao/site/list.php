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

$css = ".container-fluid {
          padding: 20px;
          }
        .box {
          margin-bottom: 20px;
          float: left;
          width: 220px;
          }
          .box img {
          max-width: 100%
        }";
$this->registerCss($css);

?>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div id="masonry" class="container-fluid">
                    <?= CategoryListView::widget([
                        'dataProvider' => $dataProvider,
                    ]) ?>
                </div>
            </div>
            <div class="rightsidebar span_3_of_1">
                <?= \frontend\themes\jiebao\widgets\category\CategoryMenu::widget([]) ?>
            </div>
        </div>
    </div>
</div>
