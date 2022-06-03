<?php
if( function_exists('acf_add_options_page') ) {
    add_action( 'init', 'initOptionsPages' );
    function initOptionsPages() {
        if( function_exists( 'acf_add_options_page' ) ) {

            // root page
            $parent = acf_add_options_page(array(
                'page_title'    => 'Настройки темы',
                'menu_title'    => 'Настройки темы',
                'menu_slug'     => 'theme-settings',
                'capability'    => 'edit_posts',
                'redirect'  => false,
            ));

            // contact page
            langMultiAction(function( $lang ) use ($parent){
                acf_add_options_sub_page(array(
                    'page_title'    => "Контакты ($lang)",
                    'menu_title'    => "Контакты ($lang)",
                    'menu_slug'     => 'ts_contacts-' . $lang,
                    'parent_slug'   => $parent['menu_slug'],
                    'capability'    => 'edit_posts',
                    'post_id' => 'ts_contacts-' . $lang,
                    'redirect'  => false,
                ));

                acf_add_options_sub_page(array(
                    'page_title'    => "Информационные окна ($lang)",
                    'menu_title'    => "Информационные окна ($lang)",
                    'menu_slug'     => 'ts_info_modal-' . $lang,
                    'parent_slug'   => $parent['menu_slug'],
                    'capability'    => 'edit_posts',
                    'post_id' => 'ts_info_modal-' . $lang,
                    'redirect'  => false,
                ));

            }, null);


            // site forms settings
            acf_add_options_sub_page(array(
                'page_title'    => 'Настройки форм',
                'menu_title'    => 'Настройки форм',
                'menu_slug'     => 'theme-settings-forms',
                'parent_slug'   => $parent['menu_slug'],
                'capability'    => 'edit_posts',
                'post_id' => 'theme-settings-forms',
                'redirect'  => false,
            ));

        }
    }
}
if( function_exists('get_fields') ) {
    $GLOBALS['theme_options'] = array(
        'general' => get_fields( 'options' ),
        'form_options' => get_fields( 'theme-settings-forms' ),
        'contacts' => get_fields( 'ts_contacts-' . CURRENT_LANG ),
        'info_modals' => get_fields( 'ts_info_modal-' . CURRENT_LANG )
    );
}


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

function bidirectional_acf_update_value( $value, $post_id, $field  ) {

    // vars
    $field_name = $field['name'];
    $field_key = $field['key'];
    $global_name = 'is_updating_' . $field_name;


    // bail early if this filter was triggered from the update_field() function called within the loop below
    // - this prevents an inifinte loop
    if( !empty($GLOBALS[ $global_name ]) ) return $value;


    // set global variable to avoid inifite loop
    // - could also remove_filter() then add_filter() again, but this is simpler
    $GLOBALS[ $global_name ] = 1;


    // loop over selected posts and add this $post_id
    if( is_array($value) ) {

        foreach( $value as $post_id2 ) {

            // load existing related posts
            $value2 = get_field($field_name, $post_id2, false);


            // allow for selected posts to not contain a value
            if( empty($value2) ) {
                $value2 = array();
            }


            // bail early if the current $post_id is already found in selected post's $value2
            if( in_array($post_id, $value2) ) continue;


            // append the current $post_id to the selected post's 'related_posts' value
            $value2[] = $post_id;


            // update the selected post's value (use field's key for performance)
            update_field($field_key, $value2, $post_id2);

        }

    }


    // find posts which have been removed
    $old_value = get_field($field_name, $post_id, false);

    if( is_array($old_value) ) {

        foreach( $old_value as $post_id2 ) {

            // bail early if this value has not been removed
            if( is_array($value) && in_array($post_id2, $value) ) continue;


            // load existing related posts
            $value2 = get_field($field_name, $post_id2, false);


            // bail early if no value
            if( empty($value2) ) continue;


            // find the position of $post_id within $value2 so we can remove it
            $pos = array_search($post_id, $value2);


            // remove
            unset( $value2[ $pos] );


            // update the un-selected post's value (use field's key for performance)
            update_field($field_key, $value2, $post_id2);

        }

    }


    // reset global varibale to allow this filter to function as per normal
    $GLOBALS[ $global_name ] = 0;


    // return
    return $value;

}
add_filter('acf/update_value/name=relation_subsidiary_doctor', 'bidirectional_acf_update_value', 10, 3);
add_filter('acf/update_value/name=relation_subsidiary_service', 'bidirectional_acf_update_value', 10, 3);

add_filter('acf/update_value/name=specializations', 'checkRelation', 10, 3);
add_filter('acf/update_value/name=doctors', 'checkRelation', 10, 3);
