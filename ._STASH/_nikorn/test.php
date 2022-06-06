<?php




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
//    $text['home'] = 'Главная'; // ????? ?????? "???????"
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
//    $home_link = home_url('/');
    $link_before = '<span typeof="v:Breadcrumb">';
    $link_after = '</span>';
    $link_attr = ' rel="v:url" property="v:title"';
    $link = $link_before . '<a class="link link_breadcrumb"' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id = $parent_id_2 = ( $wstd_parent ) ? $wstd_parent : $post->post_parent;
    $frontpage_id = get_option('page_on_front');

//    echo '<section class="section section_breadcrumbs"><div class="section__wrapper section__wrapper_breadcrumbs"><div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
//    if ($show_home_link == 1) {
//        echo '<a class="link link_breadcrumb" href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
//        if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
//    }

//    if ( is_category() ) {
//        $this_cat = get_category(get_query_var('cat'), false);
//        if ($this_cat->parent != 0) {
//            $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
//            if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
//            $cats = str_replace('<a', $link_before . '<a class="link link_breadcrumb"' . $link_attr, $cats);
//            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
//            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
//            echo $cats;
//        }
//        if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
//
//    } else
//        if ( is_search() ) {
//        echo $before . sprintf($text['search'], get_search_query()) . $after;
//
//    } elseif ( is_day() ) {
//        echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
//        echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
//        echo $before . get_the_time('d') . $after;
//
//    } elseif ( is_month() ) {
//        echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
//        echo $before . get_the_time('F') . $after;
//
//    } elseif ( is_year() ) {
//        echo $before . get_the_time('Y') . $after;
//
//    } else

//    if ( is_single() && !is_attachment() ) {
//        if ( get_post_type() != 'post' ) {
//            $post_type = get_post_type_object(get_post_type());
//            $slug = $post_type->rewrite;
//            printf($link, $home_link . $slug['slug'] . '/', str_replace('<br>', '', $post_type->labels->singular_name));
//            if ($show_current == 1) echo $delimiter . $before . str_replace('<br>', '', ) . $after;
//        } else {
//            $cat = get_the_category(); $cat = $cat[0];
//            $cats = get_category_parents($cat, TRUE, $delimiter);
//            if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
//            $cats = str_replace('<a', $link_before . '<a class="link link_breadcrumb"' . $link_attr, $cats);
//            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
//            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
//            echo $cats;
//            if ($show_current == 1) echo $before . get_the_title() . $after;
//        }
//
//    } else
        if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
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

    }
    //elseif ( is_page() && !$parent_id ) {
//        if ($show_current == 1) echo $before . get_the_title() . $after;

    //}

//elseif ( is_page() && $parent_id ) {

//        if ($parent_id != $frontpage_id) {

//            $breadcrumbs = array();
//
//            while ($parent_id) {
//                $page = get_page($parent_id);
//                if ($parent_id != $frontpage_id) {
//                    $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
//                }
//                $parent_id = $page->post_parent;
//            }

//            $breadcrumbs = array_reverse($breadcrumbs);
//            for ($i = 0; $i < count($breadcrumbs); $i++) {
//                echo $breadcrumbs[$i];
//                if ($i != count($breadcrumbs)-1) echo $delimiter;
//            }

//        }

//        if ($show_current == 1) {
//            if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
//            echo $before . get_the_title() . $after;
//        }

//}

    elseif ( is_tag() ) {
        echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

    } elseif ( is_author() ) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . sprintf($text['author'], $userdata->display_name) . $after;

    } elseif ( is_404() ) {
        echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
        echo get_post_format_string( get_post_format() );
    }

    if ( get_query_var('paged') ) {
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
        echo 'Главная ' . get_query_var('paged');
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

//    echo '</div><!-- .breadcrumbs --></div> <!--heared__row--></section>';
