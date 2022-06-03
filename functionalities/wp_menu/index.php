<?php
add_theme_support('menus');

add_action('init', function(){
    // register_nav_menu('<area_code>', __('[<area_code>] <area_name>'));
});


// ===== FUNCTIONS

/**
 * (rework) Fetching menu items by the menu location code.
 * @param $location - area code
 * @param array $args - arguments for wp_get_nav_menu_items function (https://wp-kama.ru/function/wp_get_nav_menu_items)
 * @return array
 */
function getMenuItemsByLocation( $location, $args = [] ) {
    $depth_lvl = 0;
    $parents_array = array();
    $items = array();

    $locations = get_nav_menu_locations();
    $object = wp_get_nav_menu_object($locations[$location]);
    $menu_items = wp_get_nav_menu_items($object->name, $args);
    $relations_array = array();

    foreach( $menu_items as $item ) {
        $item = (array) $item;

        $relations_array[$item['ID']] = $item['menu_item_parent'];

        if( $item['menu_item_parent'] ) setMenuItemToMenuItemsArray($item, $items, getItemParentsChain($item['menu_item_parent'], $relations_array));
        else setMenuItemToMenuItemsArray($item, $items);
    }

    return $items;
}
function getItemParentsChain( $parent_item_id, $relations_array ) {
    $result = array();
    if( isset($relations_array[$parent_item_id]) ) {
        if( $relations_array[$parent_item_id] == 0 ) { $result[0] =  $parent_item_id; }
        elseif( $relations_array[$parent_item_id] > 0 ) {
            $result = getItemParentsChain($relations_array[$parent_item_id], $relations_array);
            $result[] = $parent_item_id;
        }
    }
    return $result;
}
function setMenuItemToMenuItemsArray( $item, &$menu_items_array, $parents_array = null ) {
    if( is_array($parents_array) ) {
        $parent = &$menu_items_array;
        foreach( $parents_array as $lvl => $parent_id ) {
            if( $lvl === 0 ) $parent = &$parent[$parent_id];
            else $parent = &$parent['children'][$parent_id];
        }
        $parent['children'][$item['ID']] = $item;
    } else $menu_items_array[$item['ID']] = $item;
}
