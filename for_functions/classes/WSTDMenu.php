<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 29.12.18
 * Time: 14:12
 */

class WSTDMenu {

    protected $wp_query_args;
    protected $menu_items;

    public function __construct( $menu_items, $xfn_arr = array() ) {

        $this->wp_query_args = $xfn_arr;

        if( is_array($menu_items) && !empty($menu_items) ) {
            $this->parseMenuItems( $menu_items );
            $this->printMenu();
        }
    }

    protected function parseMenuItems( array $arr ) {
        $output = array();

        foreach( $arr as $item ) {
            if( $item->menu_item_parent == 0 ) {
                $output[ 'main' ][$item->ID] = $this->filterMenuItemFields($item);
            }else {
                $output[$item->menu_item_parent][$item->ID] = $this->filterMenuItemFields($item);
            }

            if( $item->xfn && isset($this->wp_query_args[$item->xfn]) ) {
                $result = new WP_Query($this->wp_query_args[$item->xfn]);
                if( $result->posts ) {
                    foreach( $result->posts as $p ) {
                        $output[$item->ID][$p->ID] = $this->filterMenuItemFields($p);
                    }
                }
            }
        }

        $this->menu_items = $output;
    }

    protected function filterMenuItemFields( $i ) {
        $item_array = array();

        if( isset($i->title) ) {
            $item_array['title'] = $i->title;
        }else {
            $item_array['title'] = $i->post_title;
        }

        if( isset($i->url) ) {
            $item_array['url'] = $i->url;
            $item_array['classes'] = $i->classes;
        }else {
            $item_array['url'] = get_permalink( $i->ID );
            $item_array['img_src'] = wp_get_attachment_image_src(get_post_thumbnail_id( $i->ID ), 'full')[0];
            $item_array['classes'] = '';
        }

        return $item_array;
    }

    protected function printMenu( $sub = false ) {
        if( is_array($sub) ):
            ?>
            <div class="drop-down-nav"><div class="drop-down-nav__wrapper"><div class="drop-down-nav__cont">

                <?$arr = array_chunk($sub, ceil(count($sub) / 4))?>
                <?foreach($arr as $s):?>
                    <div class="drop-down-nav__col">
                        <?foreach($s as $k => $i):?>
                            <a href="<?=$i['url']?>" class="link drop-down-nav__link">
                                <?if( $i['img_src'] ):?><img src="<?=$i['img_src']?>" alt="<?=$i['title']?>"><?endif;?>
                                <span><?=$i['title']?></span>
                            </a>
                        <?endforeach;?>
                    </div>
                <?endforeach;?>

            </div></div></div>
            <?
        else:?>
            <div class="header__box"><div class="header__cont"><nav class="nav header__nav">
                <?foreach( $this->menu_items['main'] as $k => $i ):
                $sub_c = ( isset($this->menu_items[$k]) );
                    $a_cl = ( (stristr($_SERVER['REQUEST_URI'], $i['url']) && $i['url'] != '/') || ( $i['url'] == '/' && $_SERVER['REQUEST_URI'] == $i['url'] ) ) ? ' nav__link_active' : '';
                    ?>
                    <?if( $sub_c ) echo '<div class="dd-activator">';?>

                    <a href="<?=$i['url']?>" class="link nav__link<?=$a_cl?><?=( !$i['classes'] ) ?: ' ' . implode(' ', $i['classes']) ?>">
                        <?=$i['title']?>
                        <?if( $sub_c ) echo '<i class="fas fa-caret-down"></i>';?>
                    </a>

                    <?if( $sub_c ) $this->printMenu($this->menu_items[$k]);?>

                    <?if( $sub_c ) echo '</div>';?>

                <?endforeach;?>
            </nav></div></div>
        <?endif;
    }

}