<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-06-19 00:21
 */

namespace frontend\widgets;

use yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;

class CategoryListView extends \yii\widgets\ListView
{

    /**
     * @var string 布局
     */
    public $layout = "<div class=\"product-details\">{items}<div class=\"clear\"></div></div><div class='content_bottom'><nav aria-label='' class='pagination'>{pager}</nav><div class=\"clear\"></div></div>";

    /**
     * @var int 标题截取长度
     */
    public $titleLength = 10;

    /**
     * @var int summary截取长度
     */
    public $summaryLength = 70;

    /**
     * @var int 缩率图宽
     */
    public $thumbWidth = 220;

    /**
     * @var int 缩略图高
     */
    public $thumbHeight = 150;

    public $itemOptions = [
        // 'tag' => 'article',
        // 'class' => 'excerpt'
    ];

    public $pagerOptions = [
        'firstPageLabel' => '首页',
        'lastPageLabel' => '尾页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'options' => [
            'class' => '',
        ],
    ];

    /**
     * @var string 模板
     */
    // public $template = "<div class='focus'>
    //                                <a target='_blank' href='{article_url}'>
    //                                     <img width='186px' height='112px' class='thumb' src='{img_url}' alt='{title}'></a>
    //                            </div>
    //                            <header>
    //                                <a class='label label-important' href='{category_url}'>{category}<i class='label-arrow'></i></a>
    //                                <h2><a target='_blank' href='{article_url}' title='{title}'>{title}</a></h2>
    //                            </header>
    //                            <p class='auth-span'>
    //                                <span class='muted'><i class='fa fa-clock-o'></i> {pub_date}</span>
    //                                <span class='muted'><i class='fa fa-eye'></i> {scan_count}℃</span>
    //                                <span class='muted'><i class='fa fa-comments-o'></i> <a target='_blank' href='{comment_url}'>{comment_count}评论</a></span>
    //                            </p>
    //                            <span class='note'> {summary}</span>";

    public $template = "<div class='grid_1_of_4 images_1_of_4 col-sm-3'>
                            <a href='{article_url}'><img src='{img_url}' alt='' /></a>
                            <h2>{title}</h2>
                            <div class='price-details'>
                                <div class='price-number'>
                                    <p><span class='rupees'>{sub_title}</span></p>
                                </div>
                                <div class='add-cart'>
                                    <h4><a href='{article_url}'>查看</a></h4>
                                </div>
                                <div class='clear'></div>
                            </div>
                        </div>";


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->pagerOptions = [
            'firstPageLabel' => yii::t('app', 'first'),
            'lastPageLabel' => yii::t('app', 'last'),
            'prevPageLabel' => yii::t('app', 'previous'),
            'nextPageLabel' => yii::t('app', 'next'),
            'options' => [
                'class' => 'pagination',
            ]
        ];
        if( empty($this->itemView) ) {
            $this->itemView = function ($model, $key, $index) {
                /** @var $model \frontend\models\Article */
                $imgUrl = $model->getThumbUrlBySize($this->thumbWidth, $this->thumbHeight);
                $articleUrl = Url::to(['site/product', 'id' => $model->id]);
                $sub_title = $model->sub_title;
                $title = StringHelper::truncate($model->title, $this->titleLength);
                return str_replace([
                    '{img_url}',
                    '{title}',
                    '{sub_title}',
                    '{article_url}'
                ], [
                    $imgUrl,
                    $title,
                    $sub_title,
                    $articleUrl,
                ], $this->template);
            };
        }
    }

    /**
     * @inheritdoc
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();
        $pager = array_merge($pager, $this->pagerOptions);
        return $class::widget($pager);
    }

}
