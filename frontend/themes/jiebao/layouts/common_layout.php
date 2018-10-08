<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

backend\assets\AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php !isset($this->metaTags['keywords']) && $this->registerMetaTag(['name' => 'keywords', 'content' => yii::$app->feehi->seo_keywords], 'keywords');?>
    <?php !isset($this->metaTags['description']) && $this->registerMetaTag(['name' => 'description', 'content' => yii::$app->feehi->seo_description], 'description');?>
    <meta charset="<?= yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">

    <?=
    $this->render(
        'header.php', []
    )
    ?>

    <?=
    $this->render(
        'content.php', ['content' => $content,]
    )
    ?>

</div>

<?=
$this->render(
    'footer.php', []
)
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
