<?php
/**
 * Created by PhpStorm.
 * User: jemi
 * Date: 2018/10/7
 * Time: 14:06
 */
\frontend\themes\jiebao\AppAsset::register($this);
?>
<div class="header">
    <div class="headertop_desc">
        <div class="call">
            <p><span>需要帮助?</span> 热线 <span class="number">1-22-3456789</span></span></p>
        </div>
        <div class="account_desc">

        </div>
        <div class="clear"></div>
    </div>
    <div class="header_top">
        <div class="logo">
            <a href="/"><img src="images/logo.png" alt=""/></a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom">
        <div class="menu">
            <ul>
                <li class="active"><a href="/">首页</a></li>
                <li><a href="about.html">关于我们</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="search_box">
            <form>
                <input type="text" value="Search" onfocus="this.value = '';"
                       onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
