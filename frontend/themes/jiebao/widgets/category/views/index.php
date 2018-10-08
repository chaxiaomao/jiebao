<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 16:24
 */
?>
<ul>
    <h3>产品分类</h3>
    <!--        <li><a href="#">Mobile Phones</a></li>-->
    <!--        <li><a href="#">Desktop</a></li>-->
    <!--        <li><a href="#">Laptop</a></li>-->
    <!--        <li><a href="#">Accessories</a></li>-->
    <!--        <li><a href="#">Software</a></li>-->
    <!--        <li><a href="#">Sports &amp; Fitness</a></li>-->
    <!--        <li><a href="#">Footwear</a></li>-->
    <!--        <li><a href="#">Jewellery</a></li>-->
    <!--        <li><a href="#">Clothing</a></li>-->
    <!--        <li><a href="#">Home Decor &amp; Kitchen</a></li>-->
    <!--        <li><a href="#">Beauty &amp; Healthcare</a></li>-->
    <!--        <li><a href="#">Toys, Kids &amp; Babies</a></li>-->
    <?php foreach ($data as $item): ?>
        <li><a href="<?= $item['name'] ?>"><?= $item['name'] ?></a></li>
    <?php endforeach; ?>
</ul>
