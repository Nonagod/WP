<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 29.12.18
 * Time: 14:15
 */
error_reporting(E_ERROR);


/**
 * Requests examples.
 * START

$cl = new WSTDGetData();

$cl->getTermsData - https://wp-kama.ru/function/get_terms
$cl->getElementData - https://wp-kama.ru/function/wp_query
$cl->getElementsData

 * END
 *
 * Helper
 * 1- передача доп параметров из скрипта
 *   - serialize($v) в контенте
 *   - base64_encode(serialize($v)) || htmlspecialchars(serialize($v)) атрибутом
 *
 * Problems
 * 1- Одинаковые блоки (нап - фильтр в виде списка разделов) должны иметь разные data, но одно view. Сейчас этого нет.
 *
 * ToDo
 * 1 - Добавить логику вывода no_photo если отсутствует thumbnail
 * 2 - Вынести получение options выше, реструктурировать код , чтобы не дублировать отдельные его части
 * 3 - Сократить количество параметров в вызове функций
 * 4 - Добавить возможность получения всех полей элемента без их перечисления
 * 5 - Возможность запашивать опции отдельно (объеденить и унифицировать методы)
 *
 * n - Вынести получение additionals полей в обертку shortcode'ов
 *
 * Class WSTDGetData
 */

class WSTDGetData {

    public $page_data = false;

    public function __construct( ) {
        $el = (array) get_queried_object();
        $id = ( isset($el['term_id']) ) ? $el['taxonomy'] . '_' .$el['term_id'] : $el['ID'] ;

//        if( !isset($el['term_id']) ) {
//            $el['tax'] = $this->getFieldsData( $id, 'all' );
//        }

        $el['fields'] = $this->getFieldsData( $id, 'all' );
        $el['thumbnail'] = $this->getPostThumbnail( $id );

        $this->page_data = $el;

//        $this->page_data = $this->getElementData( $id, 'all' )['posts'][$id];
    }

    public function getOptions( $options ) {
        $return = false;

        if( $options )
            $return = $this->getSiteOptions( $options );

        return $return;
    }

    public function getTermsData( $args, $fields = false, $options = false, $sort_handler = false ) {
        $return = false;

        $terms = get_terms($args);
        $taxonomy = $args['taxonomy'];
        $return['terms'] = $this->parseTermObjects( $terms , $taxonomy, $fields );

        if( $options )
            $return['opt'] = $this->getSiteOptions( $options );

        if( is_string( $sort_handler ) && function_exists($sort_handler) ) {
            $return['terms'] = $sort_handler( $return['terms'] );
        }

        return $return;

    }

    public function getElementsData( $args, $fields = false, $options = false, $tax = false, $sort_handler = false ) {
        $return = false;

        $query = new WP_Query( $args );;
        $return['posts'] = $this->parseElementObjects( $query->posts, $fields, $tax );

        if( $options )
            $return['opt'] = $this->getSiteOptions( $options );


        if( is_string( $sort_handler ) && function_exists($sort_handler) ) {
            $return['posts'] = $sort_handler( $return['posts'] );
        }

        return $return;
    }

    public function getElementData( $pid, $fields = false, $options = false, $tax = false ) {
        $return = false;

        $posts[] = get_post( $pid );
        $return['posts'] = $this->parseElementObjects( $posts, $fields, $tax );

        if( $options )
            $return['opt'] = $this->getSiteOptions( $options );


        return $return;
    }


    public function parseElementObjects( $posts, $fields, $tax ) {
        $return = false;

        if( is_array($posts) && !empty($posts) ) {
            foreach( $posts as $post ) {
                $return[$post->ID]['id'] = $post->ID;
                $return[$post->ID]['code'] = $post->post_name;
                $return[$post->ID]['name'] = $post->post_title;
                $return[$post->ID]['content'] = $post->post_content;
                $return[$post->ID]['link'] = get_permalink($post->ID);
                $return[$post->ID]['preview'] = $post->post_excerpt;
                $return[$post->ID]['modify'] = $post->post_modified;
                $return[$post->ID]['term_id'] = $post->term_id;

                $return[$post->ID]['thumbnail'] = $this->getPostThumbnail($post->ID);

                if( $fields )
                    $return[$post->ID]['fields'] = $this->getFieldsData( $post->ID, $fields );

                if( $tax )
                    $return[$post->ID]['tax'] = $this->getTermsForElement( $post->ID, $tax );


            }
        }

        return $return;
    }

    public function parseTermObjects( $terms, $taxonomy, $fields ) {
        $return = false;

        if( is_array($terms) && !empty($terms) ) {
            foreach( $terms as $term ) {
                $return[$term->term_id]['id'] = $term->term_id;
                $return[$term->term_id]['parent'] = $term->parent;
                $return[$term->term_id]['code'] = $term->slug;
                $return[$term->term_id]['name'] = $term->name;
                $return[$term->term_id]['content'] = $term->description;
                $return[$term->term_id]['link'] = get_term_link($term->term_id, $taxonomy);

                $id = $taxonomy .'_' . $term->term_id;
                if( $fields )
                    $return[$term->term_id]['fields'] = $this->getFieldsData( $id, $fields );
            }
        }

        return $return;
    }

    /**
     * Get global site options.
     *
     * @param $opt_names
     * @return bool | array
     */
    protected function getSiteOptions( $opt_names ) {
        $return = false;

        if( is_array($opt_names) && !empty($opt_names) ) {
            if( function_exists('get_field')  )
                foreach( $opt_names as $v )
                    $return[$v] = get_field($v, 'option');

        }

        return $return;
    }

    /**
     * Get post meta data.
     *
     * @param $pid
     * @param $fields
     * @return array|bool|mixed
     */
    protected function getFieldsData( $pid, $fields ) {
        $return = false;

        if( !empty($fields) ) {
            if( is_array($fields) && function_exists('get_field') ) {
                foreach( $fields as $k => $field_name )
                    $return[$field_name] = get_field( $field_name, $pid );
            }elseif( function_exists('get_fields') ) {
                $return = get_fields( $pid );
            }else {
                $return = get_post_meta( $pid );
            }
        }

        return $return;
    }

    /**
     * Get tax data for element. (getElementData & getElementsData)
     *
     * @param $pid
     * @param $tax_name
     * @return bool | array
     */
    protected function getTermsForElement( $pid, $tax_name ) {
        $return = false;
        if( is_array($tax_name) ) {
            foreach($tax_name as $tax) {
                $return[$tax] = $this->getTermsForElementByType($pid, $tax);
            }
        }else $return = $this->getTermsForElementByType($pid, $tax_name);

        return $return;
    }
    protected function getTermsForElementByType( $pid, $tax_name ) {
        $return = false;
        $taxs = get_the_terms( $pid, $tax_name );
        if( $taxs ) {
            foreach( $taxs as $num => $tax ) {
                $return[$num] = (array) $tax;
                $return[$num]['fields'] = $this->getFieldsData($tax_name.'_'.$tax->term_id, 'all');
            }
        }
        return $return;
    }

    /**
     * Get thumbnail for element. (getElementData & getElementsData)
     *
     * @param $pid
     * @return bool | array
     */
    protected function getPostThumbnail( $pid ) {
        $return = false;
        $thumbnail = get_post(get_post_meta($pid, '_thumbnail_id')[0]);

        if( $thumbnail && $thumbnail->post_type === 'attachment' ) {
            $return['name'] = $thumbnail->post_name;
            $return['title'] = $thumbnail->post_title;
            $return['src'] = $thumbnail->guid;
            $return['content'] = $thumbnail->post_content;
            $return['id'] = $thumbnail->ID;
        }

        return $return;
    }

}

function sortingHierarchy($terms) {
    $return = array();
    foreach($terms as $term) {
        $return[$term['parent']][$term['id']] = $term;
    }
    return $return;
}
function sortingByParentTax( $posts ) {
    $result = array();
    foreach( $posts as $post ) {
        $result[$post['tax'][0]['term_id']][$post['id']] = $post;
        $result[$post['tax'][0]['term_id']][$post['id']]['tax'] = $post['tax'][0]['term_id'];
    }
    return $result;
}
global $WSTDGetData;
$WSTDGetData = new WSTDGetData();