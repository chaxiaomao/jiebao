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

$css = ".container-fluid {
          padding: 20px;
          }
        .box {
          margin-bottom: 20px;
          float: left;
          width: 234px;
          }
          .box img {
          max-width: 100%
        }";
$this->registerCss($css);

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
                <h3><?= $type ?></h3>
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
                    'allModels' => Article::find()->limit(1)->limit(40)->with('category')->orderBy("sort asc")->all(),
                ])]) ?>
        </div>
    </div>
</div>

<?php
$js = "";
$this->registerJs($js);
?>
<script>
    $(function(){
        $('#carousel1').carousel({
            el : {
                imgsContainer	: '.carousel', // 图片容器
                prevBtn 		: '.carousel-prev', // 上翻按钮
                nextBtn 		: '.carousel-next', // 下翻按钮
                indexContainer	: '.carousel-index', // 下标容器
            },conf : {
                auto			: true, //是否自动播放 true/false 默认:true
                needIndexNum	: true, //是否需要下标数字 true/false 默认:true
                animateTiming	: 1000, //动画时长(毫秒) 默认:1000
                autoTiming		: 3000, //自动播放间隔时间(毫秒) 默认:3000
                direction 		: 'right', //自动播放方向 left/right 默认:right
            }
        });

        var $container = $('#masonry');
        $container.imagesLoaded(function() {
            $container.masonry({
                itemSelector: '.box',
                gutter: 20,
                isAnimated: true,
            });
        });

    });
</script>
