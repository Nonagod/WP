<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 *  _______________
 * Shortcode content
 * @var $content
 *  _______________
 * Shortcode class
 * @var $this WPBakeryShortCode_Wstd_Container
 */

/**
 * ATTS
 *
 * @var $menu_items
 * @var $menu
 * @var $settings
 */

?>
    <section class="section">
        <h2 class="title title_black"><?=pll__( 'меню' );?> <span class='js-Menu-title-span'></span></h2>
        <div class="menu js-appendMenuItems">
            <div class="menu__popup menu__popup_disable">
                <div class="menu__popup-wrap">
                    <h4 class="title menu__popup-title"></h4>
                </div>
                <div class="menu__popup-close"></div>
            </div>

            <?if( $menu ):
                $first = key($menu);?>
                <div class="menu__list">
                    <?foreach( $menu as $item ):?>
                        <div class="menu__list-link">
                            <a class="title title_small menu__link menu__link_title<?=( $item['selected'] ) ? ' menu__link_active' : '';?>" href=""><?=$item['name']?></a>
                            <?if( $item['childs'] ):?>
                                <ul class="menu__sublist<?=( $item['selected'] ) ? '' : ' menu__sublist_disable'?>">
                                    <?foreach( $item['childs'] as $k => $child ):?>
                                        <li class="menu__list-elem">
                                            <a class="menu__link menu__link_sub<?=( $child['selected'] ) ? ' menu__link_active_color' : ''?>" href="#ms_<?=$k?>"><?=$child['name']?></a>
                                        </li>
                                    <?endforeach;?>
                                </ul>
                            <?endif;?>

                        </div>
                    <?endforeach;?>
                </div>
            <?endif;?>


            <?
                if( isset($_REQUEST['menu_section']) ) {
                    for( $i = 0; $i < ob_get_level()-1; $i++ ) {
                        ob_end_clean();
                    }
                    ob_clean();
                }
            ?>
            <?if( $menu_items ):?>
                <div class="menu__box" data-menubox="#ms_<?=$settings['active_section_id']?>">
                    <div class="menu__col">
                        <?
                        $i = 1;
                        $second_col_already = false;
                        $c = ceil($settings['section_element_count']/2);
                        foreach( $menu_items as $section ): ?>

                            <?if( $section['name'] ):?>
                                <div class="menu__elem-row menu__elem-row_margin">
                                    <?if( $section['image'] ):?><div class="menu__item menu__item_flag"><img class="menu__item-photo" src="<?=$section['image']?>"></div><?endif;?>
                                    <div class="title menu__item menu__item_country"><?=$section['name']?></div>
                                </div>
                            <?endif;?>

                            <?foreach( $section['elements'] as $v ):?>
                                <div class="menu__elem">
                                    <?$cl_title = '';
                                    if( $v['fields']['menu_images'] ): $cl_title = ' jsPopupMenu';?><img class="menu__photo" src="<?=$v['fields']['menu_images']['url']?>"><?endif;?>
                                    <div class="menu__elem-row">
                                        <p class="menu__elem-col1 menu__item menu__item_title<?=$cl_title?>"><?=( $v['fields']['menu_images'] ) ? '<i class="far fa-image"></i>&nbsp;&nbsp;&nbsp;' : '';?><?=$v['name']?></p>
                                        <?if( $v['fields']['menu_price'] ):?><p class="menu__elem-col2 menu__item menu__item_price"><?=$v['fields']['menu_price']?><span> &#8381; </span></p><?endif;?>
                                    </div>
                                    <?if( $v['fields']['menu_description'] ):?>
                                        <div class="menu__elem-row">
                                            <p class="menu__elem-col1 menu__item menu__item_ingredients"><?=$v['fields']['menu_description']?></p>
                                            <p class="menu__elem-col2"></p>
                                        </div>
                                    <?endif;?>
                                </div>
                                <?
                                if( !$second_col_already && $settings['active_section']['fields']['pm_columns_two'] && $c <= $i ) {
                                    $second_col_already = true;
                                    echo "</div><div class=\"menu__col\">";
                                }
                                $i++;
                            endforeach;
    //                        $i++;
    //                        if( !$second_col_already && $settings['active_section']['fields']['pm_columns_two'] && count($menu_items)/2 <= $i ) {
    //                            $second_col_already = true;
    //                            echo "</div><div class=\"menu__col\">";
    //                        }
                        endforeach;?>
                    </div>
                </div>
            <?endif?>
            <?
                if( isset($_REQUEST['menu_section']) ) {
                    ob_end_flush(); die();
                }
            ?>

        </div>
    </section>

