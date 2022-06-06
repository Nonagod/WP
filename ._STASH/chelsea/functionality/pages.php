<?php
/*Pages tree*/
function getPagesTree( $parent_page_id, $depth_lvl = 1 ) {
    $parent_page_id = (int) $parent_page_id;
    $depth_lvl = (int) $depth_lvl;

    $pages_array = getPages( array($parent_page_id), $depth_lvl );
    $pages_array = ( is_array($pages_array) && !empty($pages_array) ) ? $pages_array[key($pages_array)] : array();
    return $pages_array;
}
function getPages( Array $parents_ids, $lvl_max, $last_lvl = 0 ) {
    $pages_array = array();

    $query_result = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'page',
        'post_parent__in' => $parents_ids
    ));

    if( empty($query_result->posts) ) return array();

    $query_result = array_map(
        function( $post ) { return (array) $post; },
        $query_result->posts
    );

    $next_lvl_parents_ids = array_column($query_result, 'ID');

    $children = null;
    if($lvl_max !== $last_lvl && !empty($next_lvl_parents_ids) ) {
        $children = getPages( $next_lvl_parents_ids, $lvl_max, ++$last_lvl);
    }

    foreach( $query_result as $page ) {
        if( isset($children[$page['ID']]) ) $page['children'] = $children[$page['ID']];
        $pages_array[$page['post_parent']][$page['ID']] = $page;
    }

    return $pages_array;
}