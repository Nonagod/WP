<?php

function custom_posts_per_page( $query ) {
    if( !is_admin() ) {

        if( is_archive() || is_category() ) {

            if( $query->query['post_type'] === 'doctors' ) {
                $query->set('orderby', 'post_title');
                $query->set('order', 'asc');
            }

            if( isset($_POST['ajax']) && isset($_POST['filter']) && $_POST['filter'] != '-' ) {

                $query->set('tax_query',
                    array(
                        array(
                            'taxonomy' => $_POST['ajax'],
                            'field' => 'term_id',
                            'terms' => array($_POST['filter']),
                            'operator' => 'IN'
                        )
                    )
                );

            }

            $query->set('posts_per_page',-1);
        }
    }
}
add_action('pre_get_posts','custom_posts_per_page');

//убрать фильтр wp добавляющий p & br
remove_filter( 'the_content', 'wpautop' );

add_filter('use_block_editor_for_post','__return_false');
/*====================================================================================================================*/
/*===================================================================================================NEW for Site V2.0*/
/*====================================================================================================================*/



add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

register_sidebar(array(
    'name'=>'Обратный звонок',
    'before_widget' => '',
    'after_widget' => '',
    'id' => 'telephones',
    'before_title' => '',
    'after_title' => '',
));

