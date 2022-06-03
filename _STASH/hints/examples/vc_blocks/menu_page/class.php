<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

//if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
//    class WPBakeryShortCode_Your_Gallery extends WPBakeryShortCodesContainer {
//    }
//}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Menu_Page extends WPBakeryShortCode {

        protected $lang;

        protected function content($atts, $content = null) {

            $this->lang = ( pll_current_language() === 'ru') ? false : '_'.pll_current_language();

            $output = '';
            $template = __DIR__ . '/front.php';

            if( file_exists($template) ) {

                $atts_def = vc_map_get_attributes($this->shortcode, $atts);
                $atts = shortcode_atts( $atts_def, $atts );
                extract($atts);

                $lvl = 2;
                $menu = $this->getTaxsTree( 'pub_menu_cat', $lvl);

                $key = key($menu);
                $menu[$key]['selected'] = true;
                if( $menu[$key]['childs'] ) {
                    $tmp = key($menu[$key]['childs']);
                    $menu[$key]['childs'][$tmp]['selected'] = true;
                    $key = $tmp;
                }
                if( $_REQUEST['menu_section'] ) {
                    $key = $_REQUEST['menu_section'];
                }

                $settings['active_section_id'] = $key;
                $settings['active_section'] = $this->getTaxonomy($key);

                $menu_items = $this->getElements( 'pub_menu_cat', $key);

                $settings['section_element_count'] = $menu_items[1];
                $menu_items = $menu_items[0];

                ob_start();
                include $template;
                $output .= ob_get_contents();
                ob_end_clean();

            }else {
                $output = '<p>Template file don\'t exists! (<b>' . $template . '</b>)</p>';
            }
//            $output .= '<pre>'. var_export(get_defined_vars(), true) . ' </pre>';
            return $output;
        }


        private function getTaxsTree( $taxname, $lvl = 0, $parent = false  ) {
            $tree = array();

            $terms = $this->getTaxs( $taxname, ($parent) ? $parent : 0  );

            foreach( $terms as $term ) {
//                _p(get_field('sort_index', 'pub_menu_cat_' . $term->term_id));
//                _p($tree);

                $tree[$term->term_id]['name'] = $term->name;
                $tree[$term->term_id]['slug'] = $term->slug;

                if( $this->lang ) {
                    $lang_arr = array();

                    if( $f = get_field( 'name'.$this->lang, 'pub_menu_cat_' . $term->term_id) )
                        $lang_arr['name'] = $f;

                    $tree[$term->term_id] = array_merge($tree[$term->term_id], $lang_arr);
                }

                if( $lvl > 1 ) {
                    $tree[$term->term_id]['childs'] = $this->getTaxsTree( $taxname, $lvl -1, $term->term_id );
                }
            }

            return $tree;
        }

        private function getTaxs( $taxname, $parent=false ) {
            return get_terms( array(
                'taxonomy'    => $taxname,
                'parent'      => ( $parent ) ? $parent : 0,
                'hierarchical' => true,
                'hide_empty' => true,
                'orderby' => 'meta_value_num',
                'meta_key' => 'sort_index',
                'order' => 'desc',
                'lang' => ''
            ) );
        }

        private function getElements( $tax_name, $tax_id ) {
            $elements = array();
            $query = new WP_Query( array(
                'tax_query' => array(
                    array(
                        'taxonomy' => $tax_name,
                        'field'    => 'id',
                        'terms'    => $tax_id,
                        'operator' => 'IN',
                        'lang' => ''
                    )
                ),
                'posts_per_page' => -1
            ) );
            $els_count = count($query->posts);

            foreach( $query->posts  as $p) {
                $e = array();

                $parent = wp_get_post_terms( $p->ID, 'pub_menu_cat', array('meta_query'=>array(array('key' => 'pm_list_title', 'value' => 1, 'compare' => '=')) ) );

                $e['name'] = $p->post_title;
                if( function_exists('get_fields') ) {
                    $e['fields'] = get_fields($p->ID);
                }

                if( $this->lang ) {
                    if( $f = get_field( 'name'.$this->lang, $p->ID) )
                        $e['name'] = $f;

                    if( isset($e['fields']['menu_description'.$this->lang]) )
                        $e['fields']['menu_description'] = $e['fields']['menu_description'.$this->lang];
                }

                $parent = $parent[0];
                if( $parent ) {
                    $fields = get_fields( 'pub_menu_cat_' . $parent->term_id );
                    $elements[$parent->term_id]['name'] = $parent->name;
                    $elements[$parent->term_id]['image'] = $fields['pm_title_image']['url'];
                    $elements[$parent->term_id]['elements'][$p->ID] = $e;

                    if( $this->lang ) {
                        $elements[$parent->term_id]['name'] = $fields['name_en'];
                    }
                }else {
                    $elements['none']['elements'][$p->ID] = $e;
                }

            }

            return array($elements, $els_count);
        }

        private function getTaxonomy( $id ) {
            $output = array();
            $tmp = get_term( $id, 'pub_menu_cat' );
            if( $tmp ) {
                $output['name'] = $tmp->name;
            }
            if( function_exists('get_fields')) {
                $output['fields'] = get_fields( 'pub_menu_cat_' . $id );
            }
            return $output;
        }

    }
}
