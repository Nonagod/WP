<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 29.12.18
 * Time: 10:44
 */

class WSTDBreadcrumbs {

    protected $element;//active element object

    protected $chain = array(); // array - contain elements.
    protected $breadcrumbs = ''; // string - HTML performance of breadcrumbs.

    protected $templates = [ //s - section section_breadcrumbs d - section__wrapper section__wrapper_breadcrumbs
        "container" => "<section class=\"section\"><div class=\"container\"><div class=\"breadcrumbs\">#content#</div></div></section>",
//        "container" => "<section class=''><div class=''><div class='breadcrumbs'>#content#</div></div></section>",
        "link" => "<a class=\"breadcrumbs__item\" href=\"#url#\" title='#title#'>#title#</a><span class=\"breadcrumbs__separator\">/</span>",
        "active_item" => "<a class='breadcrumbs__item' href='#' title='#title#'>#title#</a>"
    ]; //array - breadcrumbs elements (container, link, active_element) templates

    public function __construct() {
        global $post;
        $this->element = $post;

        $this->makeChain();

        if( !empty($this->chain) ) {
//            _p($this->chain);
            foreach ($this->chain as $i) {
                if( is_array($i) ) {
                    $this->applyLink($i);
                }else {
                    $this->applyActiveItem($i);
                }
            }
        }

        if( $this->breadcrumbs ) {
            $this->applyContainer();
            if( count($this->chain) > 1 ) echo $this->breadcrumbs;
        }
    }

    /*Make chain methods*/
    protected function makeChain() {
        if( !is_home() || !is_front_page() ) {

            $this->chain[] = array(
                'ChelseaPub',
                home_url('/')
            );

            global $wstd_gd_cl;

            if( isset($wstd_gd_cl->page_data['fields']['breadcrumbs']) && !empty($wstd_gd_cl->page_data['fields']['breadcrumbs']) && !is_archive() ) {
                foreach( $wstd_gd_cl->page_data['fields']['breadcrumbs'] as $v ) {
                    $arr = array();
                    if( $v['breadcrumb_link'] ) {
                        $this->chain[] = array(
                            $v['breadcrumb_name'],
                            $v['breadcrumb_link']
                        );
                    }else {
                        $this->chain[] = $v['breadcrumb_name'];
                    }
                }
            }else {
                if( is_category() ) {
                    $this->makeChainCategory();
                }

                if( is_page() ) {
                    $this->makeChainPage();
                }

                if( is_single() && !is_attachment()) {
                    $this->makeChainSingle();
                }

                if( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    $this->chain[] = $post_type->labels->name;
                }

                if( is_404() ) {
                    $this->chain[] = '404';
                }

            }

            //is_attachment()
            //is_search()
//            is_day
//            is_month
//            is_year

//            is_tag
//            is_author
//            is_404

//            elseif ( has_post_format() && !is_singular() ) {
//        echo get_post_format_string( get_post_format() );
//
//        get_query_var('paged')

        }
    }

    protected function makeChainCategory() {
        $category = get_category(get_query_var('cat'), false);
        if( $category->parent ) {
            //он заменяет просто начало тега а на свой с классами
            $this->getParentCategories($category->parent,$categories );
//            $categories = array_reverse($categories);
        }
        $categories[] = $category->name;
        $this->chain = array_merge($this->chain, $categories);
    }
    protected function makeChainSingle() {
        $type = get_post_type();

        if( $type != 'post' ) {
            $post_type = get_post_type_object($type);
            $items[] = array(
                $post_type->labels->name,
                (is_array($post_type->rewrite)) ? '/' . $post_type->rewrite['slug'] : null
            );
        }else {
            $c = get_the_category()[0];
            $this->getParentCategories($c,$items );
        }
//        $items = array_reverse($items);
        $items[] = get_the_title();
        $this->chain = array_merge($this->chain, $items);
    }
    protected function makeChainPage() {
        $pages = array();
        $front = get_option('page_on_front');

        if( $this->element->ID == $front ) return;

        $pages[] = get_the_title( $this->element->ID );
        if( $this->element->post_parent && $this->element->post_parent != $front ) {
            $parent_id = $this->element->post_parent;
            while ($parent_id) {
                $page = get_page($parent_id);
                if( $this->element->post_parent && $this->element->post_parent != $front ) {
                    $pages[] = array(
                        get_the_title($page->ID),
                        get_permalink($page->ID)
                    );
                }
                $parent_id = $page->post_parent;
            }
            $pages = array_reverse($pages);
        }
        $this->chain = array_merge($this->chain, $pages);
    }

    protected function getParentCategories( $id, &$arr) {
        $names = explode('|', get_category_parents($id, false, '|', false));
        $urls = explode('|', get_category_parents($id, false, '|', true));
//        $names = array_reverse($names);
        foreach( $names as $k => $v ) {
            if( $v ) {
                $arr[] = array(
                    $v,
                    '/' . $urls[$k]
                );
            }
        }
    }
    /*Make chain methods*/
    /*Templates methods*/

    /**
     * @param $replace (title, url)
     */
    protected function applyLink( $replace ) {
        if( is_array($replace) && !empty($replace) && count($replace) > 1 ) {
            $this->breadcrumbs .= str_replace(
                array( '#title#', '#url#' ),
                $replace,
                $this->templates['link']
            );
        }
    }
    protected function applyActiveItem( $title ) {
        if( $title ) {
            $this->breadcrumbs .= str_replace('#title#', $title, $this->templates['active_item']);
        }
    }
    protected function applyContainer() {
        $this->breadcrumbs = str_replace('#content#', $this->breadcrumbs, $this->templates['container']);
    }

    /*Templates methods*/
}