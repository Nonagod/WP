<?php

/*====================================================================================================================*/
/*===================================================================================================NEW for Site V2.0*/
/*====================================================================================================================*/

/*CONSTANT*/
define( 'THEME_URL', get_template_directory_uri() . '/' );
define( 'THEME_DIR', get_template_directory() . '/' );
/*CONSTANT*/

/*include files*/
require_once  THEME_DIR . 'for_functions/WSTDBreadcrumbs.php';
require_once  THEME_DIR . 'for_functions/WSTDGetData.php';
require_once  THEME_DIR . 'for_functions/WSTDMenu.php';
/*include files*/

/*get data sort functions*/
function servicesTreeSort( $elements ) {
    $output = false;

    if( is_array($elements) && !empty($elements) ) {
        foreach( $elements as $k => $el ) {
            if( empty($el['fields']['parent_relation']) ) { $output['main'][$k] = $el; }
            else{$output[$el['fields']['parent_relation']->ID][$k] = $el;}
        }
    }

    return $output;
}
function servicesTreeSortWTax( $elements ) {
    $output = false;

    if( is_array($elements) && !empty($elements) ) {
        foreach( $elements as $k => $el ) {

            if( empty($el['fields']['parent_relation']) && $el['tax'][0]['term_id'] != 14 ) {
//                $output['main'][$el['tax'][0]['term_id']]['name'] = $el['tax'][0]['name'];
                $output['main'][$el['tax'][0]['term_id']][$k] = $el;
            }

            if(!empty($el['fields']['parent_relation'])){
                $output[$el['fields']['parent_relation']->ID][$k] = $el;
            }

        }
    }

    return $output;
}
function clinicsForServicesList( $arr ) {
    $output = false;

    if( is_array($arr) && !empty($arr) ) {
        foreach( $arr as $k => $el ) {
            if( isset($el['fields']['relation_service_to_clinicks']) && !empty($el['fields']['relation_service_to_clinicks']) ) {
                foreach( $el['fields']['relation_service_to_clinicks'] as $s ) {
                    $output[$s->ID][$k] = array(
                        'name' => $el['name'],
                        'link' => $el['link']
                    );
                }
            }
        }
    }

    return $output;
}
function clinicsForMapSort( $arr ) {
    $output = false;

    if( is_array($arr) && !empty($arr) ) {
        foreach( $arr as $k => $el ) {
            if( isset($el['tax'][0]) ) {
                $output[$el['tax'][0]['term_id']]['name'] = $el['tax'][0]['name'];
                $output[$el['tax'][0]['term_id']]['icon'] = $el['tax'][0]['fields']['ct_icon']['url'];
                $output[$el['tax'][0]['term_id']]['items'][$k]['name'] = $el['name'];
                $output[$el['tax'][0]['term_id']]['items'][$k]['link'] = $el['link'];
                $output[$el['tax'][0]['term_id']]['items'][$k]['fields'] = $el['fields'];
            }
        }
    }

    return $output;
}
/*get data sort functions*/

/*LOAD BLOCKS FUNCTIONALITY*/
remove_shortcode('load_block');
add_shortcode('load_block', 'loadBlock');
function loadBlock( $attr, $content, $tag) {
    global $wstd_gd_cl;
    $output = false;

    $data_path = THEME_DIR . 'shortcodes/blocks/' . $attr['block'] . '/data.php';
    $view_path = THEME_DIR . 'shortcodes/blocks/' . $attr['block'] . '/view.php';

    ob_start();

    if( file_exists($data_path) )
        include $data_path;

    if( file_exists($view_path) )
        include $view_path;

    $output = ob_get_clean();

    return $output;
}

function true_add_mce_button() {
    // user can't edit post or pages?
    if( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }

    // TinyMCE is enable in a user settings?
    if( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'addButtonsDataFileLink' );
        add_filter( 'mce_buttons', 'registerButton' );
    }
}
add_action('admin_head', 'true_add_mce_button');
function addButtonsDataFileLink( $plugin_array ) {
    $plugin_array['wstd_btn'] = THEME_URL .'/shortcodes/tinymce_wstd_btn.js'; // wstd_btn - is id
    return $plugin_array;
}
function registerButton( $buttons ) {
    array_push( $buttons, 'wstd_btn' ); // wstd_btn - is id
    return $buttons;
}
/*LOAD BLOCKS FUNCTIONALITY*/

function _p($d) {
    if( is_user_logged_in() ) {
        ?><pre style="max-width: 100%;padding: 20px;white-space: break-spaces;"><?print_r($d);?></pre><?
    }
}

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

add_theme_support( 'post-thumbnails' );

add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

/*MENU*/
add_theme_support('menus');
function peepsakes_register_my_menus() {
    register_nav_menus
    (
        array( 'header-menu-news' => 'Меню новости', 'header-menu' => 'Меню компании', 'header-menu2' => 'Меню блога', 'header-menu3' => 'Никорёнок', 'footer-menu' => 'Лево - услуги футер' , 'footer-menu2' => 'Право - услуги футер')
    );
}
if (function_exists('register_nav_menus')) {
	add_action( 'init', 'peepsakes_register_my_menus' );
}
/*MENU*/

/*Filters the Read More link text*/
add_filter( 'the_content_more_link', 'peepsakes_my_more_link', 10, 2 );
function peepsakes_my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, "$more_link_text", $more_link_text );
}
/*Filters the Read More link text*/

/*ADMINS JS & CSS*/
function peepsakes_wpthemes_media_upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri() . '/js/upload.js', array('jquery'));
	wp_enqueue_script('my-upload');
}
function peepsakes_wpthemes_media_upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'peepsakes_wpthemes_media_upload_scripts');
add_action('admin_print_styles', 'peepsakes_wpthemes_media_upload_styles');
/*ADMINS JS & CSS*/

/*ACF RELATED FIELDS MIRRORED + OPTION PAGE*/
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
add_filter('acf/update_value/name=relation_service_to_clinicks', 'bidirectional_acf_update_value', 10, 3);
add_filter('acf/update_value/name=relation_doctor_to_clinicks', 'bidirectional_acf_update_value', 10, 3);
add_filter('acf/update_value/name=services_related', 'bidirectional_acf_update_value', 10, 3);
add_filter('acf/update_value/name=relation_stocks_to_doctor', 'bidirectional_acf_update_value', 10, 3);
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}
/*ACF RELATED FIELDS MIRRORED + OPTION PAGE*/



function dimox_breadcrumbs() {

global $wstd_gd_cl;
$wstd_parent = false;
if( is_object($wstd_gd_cl) ) {
    if( isset($wstd_gd_cl->page_data['fields']) && isset($wstd_gd_cl->page_data['fields']['parent_relation']->ID) && !empty($wstd_gd_cl->page_data['fields']['parent_relation']->ID) ) {
//    _p($wstd_gd_cl->page_data);
        if( is_single() && get_post_type() != 'service' ) {
            $wstd_parent =$wstd_gd_cl->page_data['fields']['parent_relation']->ID;
        }
    }
}


	/* === ????? === */
	$text['home'] = 'Главная'; // ????? ?????? "???????"
	$text['category'] = '%s'; // ????? ??? ???????? ???????
	$text['search'] = 'Поиск "%s"'; // ????? ??? ???????? ? ???????????? ??????
	$text['tag'] = '?????? ? ????? "%s"'; // ????? ??? ???????? ????
	$text['author'] = '?????? ?????? %s'; // ????? ??? ???????? ??????
	$text['404'] = 'Ошибка 404'; // ????? ??? ???????? 404

	$show_current = 1; // 1 - ?????????? ???????? ??????? ??????/????????/???????, 0 - ?? ??????????
	$show_on_home = 0; // 1 - ?????????? "??????? ??????" ?? ??????? ????????, 0 - ?? ??????????
	$show_home_link = 1; // 1 - ?????????? ?????? "???????", 0 - ?? ??????????
	$show_title = 1; // 1 - ?????????? ????????? (title) ??? ??????, 0 - ?? ??????????
	$delimiter = ''; // <span class="sep">/</span>
	$before = '<span class="current">'; // ??? ????? ??????? "???????"
	$after = '</span>'; // ??? ????? ??????? "??????"
	/* === ????? ????? === */

	global $post;
	$home_link = home_url('/');
	$link_before = '<span typeof="v:Breadcrumb">';
	$link_after = '</span>';
	$link_attr = ' rel="v:url" property="v:title"';
	$link = $link_before . '<a class="link link_breadcrumb"' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id = $parent_id_2 = ( $wstd_parent ) ? $wstd_parent : $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<div class="breadcrumbs"><a class="link link_breadcrumb" href="' . $home_link . '">' . $text['home'] . '</a></div>';

	}
	else {

		echo '<section class="section section_breadcrumbs"><div class="section__wrapper section__wrapper_breadcrumbs"><div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			echo '<a class="link link_breadcrumb" href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a class="link link_breadcrumb"' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . $slug['slug'] . '/', str_replace('<br>', '', $post_type->labels->singular_name));
				if ($show_current == 1) echo $delimiter . $before . str_replace('<br>', '', get_the_title()) . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a class="link link_breadcrumb"' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $link_before . '<a class="link link_breadcrumb"' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {echo 2;
			echo get_post_format_string( get_post_format() );
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo 'Главная ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div><!-- .breadcrumbs --></div> <!--heared__row--></section>';

	}
} // end dimox_breadcrumbs()


register_sidebar(array(
    'name'=>'Обратный звонок',
    'before_widget' => '',
    'after_widget' => '',
    'id' => 'telephones',
    'before_title' => '',
    'after_title' => '',
));

