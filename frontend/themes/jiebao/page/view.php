<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-06-21 11:07
 */

/**
 * @var $this yii\web\View
 * @var $model frontend\models\Article
 */

use frontend\models\Article;
use yii\helpers\Url;

$this->title = $model->title . ' - ' . yii::$app->feehi->website_title;

$this->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $model->seo_description], 'description');
$this->registerMetaTag(['name' => 'tags', 'content'=> call_user_func(function()use($model) {
    $tags = '';
    foreach ($model->articleTags as $tag) {
        $tags .= $tag->value . ',';
    }
    return rtrim($tags, ',');
}
)], 'tags');

$css = "
.title{font-size: 24px;text-align:center;margin-bottom:20px;}
.m-desc{border:1px solid #ccc;width:100%;padding:10px;min-height:200px;}
";
$this->registerCSs($css);
?>
<div class="main">
    <div class="content">
        <h1 class="title">
            <?= $model->title ?>
        </h1>
        <div class="m-desc">
            <?= $model->articleContent->content ?>
        </div>
    </div>
</div>