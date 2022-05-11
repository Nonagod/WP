<?php

// Регистрируем колонку 'ID' и 'Миниатюра'. Обязательно.
add_filter( 'manage_menu_posts_columns', function ( $columns ) {
    $my_columns = [
        'category'    => 'Категория меню'
    ];

    return array_slice( $columns, 1, 1 ) + $my_columns + $columns;
} );
$terms = array();
// Выводим контент для каждой из зарегистрированных нами колонок. Обязательно.
add_action( 'manage_menu_posts_custom_column', function ( $column_name ) {

    if ( $column_name === 'category' ) {
        $post_id = get_the_ID();
        $categories = get_the_terms( $post_id, 'menu_tax', true );
        if (is_array($categories)) {

            foreach($categories as $key => $category) {
                $result = array();

                foreach( array_reverse(get_ancestors( $category->term_id, 'menu_tax' )) as $term_id ) {
                    if( !isset($terms[$term_id]) ) {
                        $term = get_terms( array( 'include' => [$term_id] ) );
                        $terms[$term_id] = array('slug' => $term[0]->slug, 'name' => $term[0]->name);
                    }
                    $is_active = ( $_GET['menu_tax'] === $terms[$term_id]['slug'] );
                    $result[] = '<a class="' . ( $is_active ? 'active' : '' ) . '" href="/wp-admin/edit.php?post_type=menu&menu_tax='.( $is_active ? '' : $terms[$term_id]['slug']).'">' . $terms[$term_id]['name'] . '</a>';
                }

                $is_active = ( $_GET['menu_tax'] === $category->slug );
                $result[] = '<a class="' . ( $is_active ? 'active' : '' ) . '" href="/wp-admin/edit.php?post_type=menu&menu_tax='.( $is_active ? '' : $category->slug).'">' . $category->name . '</a>';

                $categories[$key] = implode(' » ',$result );
            }
            echo implode(' | ',$categories );
        }
    }


} );

// Добавляем стили для зарегистрированных колонок. Необязательно.
add_action( 'admin_print_footer_scripts-edit.php', function () {
    ?>
    <style>
        .column-category {
            width: 300px;
        }
        .column-category a {
            border-bottom: 1px solid;
            transition: opacity ease-in-out 100ms;
        }
        .column-category a:hover {
            opacity: 0.5;
        }
        .column-category a.active:before {
            content: 'x';
            color: red;
            padding-right: 5px;
            cursor: pointer;
        }
    </style>
    <?php
} );

// ----------------------------

// фильтр - добавим выпадающий список
//do_action( 'restrict_manage_posts', $this->screen->post_type ); // $which == top
add_action( 'restrict_manage_posts', 'add_specializations_table_filters');
function add_specializations_table_filters( $post_type ){
    if( $post_type === 'specializations' ) {
        wp_dropdown_categories( array(
            'show_option_all'    => 'Все направления',
            'show_option_none'   => '',
            'option_none_value'  => -1,
            'orderby'            => 'ID',
            'order'              => 'ASC',
            'show_last_update'   => 0,
            'show_count'         => 0,
            'hide_empty'         => 1,
            'child_of'           => 0,
            'exclude'            => '',
            'echo'               => 1,
            'selected'           => @ $_GET['specializations_branch'] ?: 0,
            'hierarchical'       => 0,
            'name'               => 'specializations_branch',
            'id'                 => 'branches_filter',
            'class'              => 'custom_filter',
            'depth'              => 0,
            'tab_index'          => 0,
            'taxonomy'           => 'branches',
            'hide_if_empty'      => false,
            'value_field'        => 'term_id',
            'required'           => false,
        ));
        wp_dropdown_categories( array(
            'show_option_all'    => 'Все отделения',
            'show_option_none'   => '',
            'option_none_value'  => -1,
            'orderby'            => 'ID',
            'order'              => 'ASC',
            'show_last_update'   => 0,
            'show_count'         => 0,
            'hide_empty'         => 1,
            'child_of'           => 0,
            'exclude'            => '',
            'echo'               => 1,
            'selected'           => @ $_GET['specializations_department'] ?: 0,
            'hierarchical'       => 0,
            'name'               => 'specializations_department',
            'id'                 => 'departments_filter',
            'class'              => 'custom_filter',
            'depth'              => 0,
            'tab_index'          => 0,
            'taxonomy'           => 'departments',
            'hide_if_empty'      => false,
            'value_field'        => 'term_id',
            'required'           => false,
        ));
    }
}

// Фильтрация: обработка запроса
add_action( 'pre_get_posts', 'add_specializations_table_filters_handler' );
function add_specializations_table_filters_handler( $query ){

    $cs = function_exists('get_current_screen') ? get_current_screen() : null;

    if( ! is_admin() || empty($cs->post_type) || $cs->post_type != 'specializations' || $cs->id != 'edit-specializations' )
        return;

    $tax_query = array();

    if( @ $_GET['specializations_branch'] ){
        $tax_query[] = array( 'taxonomy'=>'branches', 'field' => 'id', 'terms'=>array(@ $_GET['specializations_branch']) );
    }
    if( @ $_GET['specializations_department'] ){
        $tax_query[] = array( 'taxonomy'=>'departments', 'field' => 'id', 'terms'=>array(@ $_GET['specializations_department']) );
    }

    if( $tax_query ) {
        $tax_query['relation'] = 'AND';
        $query->set( 'tax_query', $tax_query );
    }

    //if( empty($_GET['orderby']) && @ $_GET['sel_season'] != -1 ){
    //  $query->set( 'orderby', 'menu_order date' );
    //}
}
