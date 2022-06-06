<?php
/*
Template Name: Шаблон страницы - зелено-синий
Template Post Type: post, page, product // название доп. тивов к кому относиться шаблон

В теме нужно создать файл `page_<theme|template>.<name>.php` со след содержанием.
    - theme - изменяет тему
    - template - структурные изменения в шаблоне
    // только для симантики, необязательно
*/

$GLOBALS['theme']['body_class'] = 'page--cyan page--landing';
get_header(); ?>

<?the_content();?>

<?get_footer(); ?>