<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-06-19 14:46
 */

namespace frontend\widgets;

use yii\helpers\StringHelper;
use yii\helpers\Url;

class ProductListView extends \yii\base\Widget
{

    public $dataProvider;

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

    // public $template = "<div id=\"masonry\" class=\"container-fluid\">{lis}</div>";
    //
    // public $liTemplate = "<div class='grid_1_of_4 images_1_of_4 box'>
    //                         <a href='{article_url}'><img src='{img_url}' alt='' /></a>
    //                         <h2>{title}</h2>
    //                         <div class='price-details'>
    //                             <div class='price-number'>
    //                                 <p><span class='rupees'>{sub_title}</span></p>
    //                             </div>
    //                             <div class='add-cart'>
    //                                 <h4><a href='{article_url}'>查看</a></h4>
    //                             </div>
    //                             <div class='clear'></div>
    //                         </div>
    //                     </div>";

    public $template = "{lis}";

    public $liTemplate = "<div class='grid_1_of_4 images_1_of_4'>
                            <a href='{article_url}'><img src='{img_url}' alt='' /></a>
                            <h2>{title}</h2>
                            <div class='price-details'>
                                <div class='price-number'>
                                    <p><span class='rupees'>{sub_title}</span></p>
                                </div>
                                <div class='add-cart'>
                                    
                                </div>
                                <div class='clear'></div>
                            </div>
                        </div>";


    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        $lis = '';
        $models = $this->dataProvider->getModels();
        foreach ($models as $item) {
            /** @var $item \frontend\models\Article */
            $imgUrl = $item->getThumbUrlBySize($this->thumbWidth, $this->thumbHeight);
            $sub_title = $item->sub_title;
            $articleUrl = Url::to(['site/product', 'id' => $item->id]);
            $title = StringHelper::truncate($item->title, $this->titleLength);
            $lis .= str_replace(
                ['{article_url}', '{sub_title}', '{img_url}', '{title}'],
                [
                    $articleUrl,
                    $sub_title,
                    $imgUrl,
                    $title
                ], $this->liTemplate);
        }
        return str_replace('{lis}', $lis, $this->template);
    }

}