<?php

//add_filter('acf/update_value/name=specializations', 'checkRelation', 10, 3);
//add_filter('acf/update_value/name=doctors', 'checkRelation', 10, 3);


/**
 * @param $value
 * @param $post_id
 * @param $field
 * @return array|mixed
 *
 * Связывает посты по свойствам. В содержащем посте должно быть свойство с именем равным типу связываемых постов.
 * Нап. Если связываем посты с типами doctors (то тут должно быть свойство specializations) & specializations (а тут doctors)
 */
function checkRelation( $value, $post_id, $field ) {
    if( !empty($GLOBALS[ 'is_updating_' . $field['name'] ]) ) return $value;

    $containing_post = get_post($post_id, ARRAY_A);
    $binding_property_name = $containing_post['post_type'];
    $old_value = get_field($field['name'], $post_id, false);


    $GLOBALS[ 'is_updating_' . $binding_property_name ] = 1;
    $GLOBALS[ 'is_updating_' . $field['name'] ] = 1;


    if( is_array($value) ) {
        foreach( $value as $post_id ) {
            bindPosts( $post_id, $containing_post['ID'], $binding_property_name);
        }
    }else bindPosts( $value, $containing_post['ID'], $binding_property_name );


    if( is_array($old_value) ) {
        foreach( $old_value as $post_id ) {
            if( in_array($post_id, $value) ) continue;
            unbindPosts($post_id, $containing_post['ID'], $binding_property_name );
        }
    }elseif( $old_value !== $value ) unbindPosts($old_value, $containing_post['ID'], $binding_property_name );


    unset($GLOBALS[ 'is_updating_' . $binding_property_name ], $GLOBALS[ 'is_updating_' . $field['name'] ]);

    return $value;
}
function bindPosts( $target_post_id, $bind_with_post_id, $relation_property_name  ) {
    $field_values = get_field($relation_property_name, $target_post_id, false) ?: array();

    if(in_array( $bind_with_post_id, $field_values )) return;

    $field_values[] = $bind_with_post_id;

    update_field($relation_property_name, $field_values, $target_post_id);
}
function unbindPosts( $target_post_id, $unbind_with_post_id, $relation_property_name  ) {
    $field_values = get_field($relation_property_name, $target_post_id, false) ?: array();

    if( empty($field_values) ) return;

    $pos = array_search($unbind_with_post_id, $field_values);

    unset( $field_values[ $pos] );

    update_field($relation_property_name, $field_values, $target_post_id);
}