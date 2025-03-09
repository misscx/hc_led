<?php
/*
Plugin Name: 跑马灯公告
Version: 1.0.0
Plugin URL: https://www.emlog.net
Description: 跑马灯公告插件。
Author: 寒川
Author URL: https://www.emlog.net
*/

defined('EMLOG_ROOT') || exit('access denied!');

function message(){
    $plugin_storage = Storage::getInstance('hc_led');
	$message =   $plugin_storage->getValue('message');
echo <<<html
<div class="horizontal-marquee">
    <div class="horizontal-content">
    {$message}
    </div>
</div>
html;
}

addAction('index_loglist_top','message');

function css(){
echo <<<css
<style>
.horizontal-marquee {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    background: #000;
    padding: 12px 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}
.horizontal-content {
    display: inline-block;
    animation: horizontalScroll 15s linear infinite;
    padding-left: 100%;
    color: #00ff41;
    text-shadow: 0 0 10px #00ff41, 0 0 20px #00ff41, 0 0 30px #00ff41;
}
@keyframes horizontalScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}

@keyframes verticalScroll {
    0%, 10% { transform: translateY(0); }
    90%, 100% { transform: translateY(-80%); }
}

.horizontal-marquee:hover .horizontal-content,
.vertical-marquee:hover .vertical-content {
    animation-play-state: paused;
    cursor: pointer;
}
</style>
css;

}
addAction('index_head','css');