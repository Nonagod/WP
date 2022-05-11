<?php

add_action( 'vc_before_init', function () {
    require_once __DIR__ . '/main_info/index.php'; // подключается общий скрипт
    require_once __DIR__ . '/menu_page/index.php';
});