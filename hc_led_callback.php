<?php
defined('EMLOG_ROOT') || exit('access denied!');

function callback_init() {
    $plugin_storage = Storage::getInstance('hc_led');
    $plugin_storage->setValue('message', '欢迎使用由寒川开发的LED跑马灯插件。');
}

function callback_rm() {
    $plugin_storage = Storage::getInstance('hc_led');
	$plugin_storage->deleteAllName('YES');
}

function callback_up() {
    // do something
}
