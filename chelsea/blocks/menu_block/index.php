<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 *      null|string section_id
 */
global $wp_query;
global $WSTDGetData;

$UNITS = array( 'gram' => 'г', 'milliliter' => 'мл' );
$main_taxs = $inner_taxs = $posts = $active_main_section_id = $active_main_section_data = null;

$req = array(
    "wstd_ajax" => filter_input(INPUT_POST, 'wstd_ajax', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    "tax_name" => filter_input(INPUT_POST, 'taxonomy', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    "tax_filter" => filter_input(INPUT_POST, 'filter', FILTER_SANITIZE_FULL_SPECIAL_CHARS)
);

$main_taxs = $WSTDGetData->getTermsData( [
    'taxonomy'              => 'menu_tax',
    'hide_empty'            => true,
    'parent'                => ( $options['section_id'] ) ? $options['section_id'] : 0,
    'orderby'               => 'meta_value_num',
    'order'                 => 'ASC',
    'meta_query'            => [[ 'key' => 'index', 'type' => 'NUMERIC' ]]
], true )['terms'];

$active_main_section_id = ( $req['tax_name'] === "menu_tax" && $req['tax_filter'] ) ? $req['tax_filter'] : $main_taxs[key($main_taxs)]['id'] ;
$active_main_section_id = ( $active_main_section_id ) ? $active_main_section_id : $options['section_id'];
$active_main_section_data = $main_taxs[$active_main_section_id];

$menu_sections = $WSTDGetData->getTermsData( [
    'taxonomy'              => 'menu_tax',
    'hide_empty'            => true,
    'child_of'                => $active_main_section_id,
    'orderby'               => 'meta_value_num',
    'order'                 => 'ASC',
    'meta_query'            => [[ 'key' => 'index', 'type' => 'NUMERIC' ]]
], true, null, 'sortingHierarchy'  )['terms'];

$menu_items = $WSTDGetData->getElementsData( [
    'post_type' => 'menu',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'menu_tax',
            'field'    => 'id',
            'terms'    => $active_main_section_id
        )
    ),
    'meta_query' => array(
        'position_index' => array(
            'key'     => 'index',
            'compare' => 'EXISTS',
        ),
    ),
    'orderby' => 'position_index',
    'order'   => 'ASC',
], true, null, 'menu_tax', 'sortingByParentTax' )['posts'];


//_p($active_main_section_id);
//_p($active_main_section_data);
//_p($main_taxs);
//_p($menu_sections);
//_p($menu_items);


/*_p($posts);*/?>

<?startAjaxContent('menu-position_popup');
    if( $req['wstd_ajax'] === 'menu-position_popup'):
        $position_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $position = $WSTDGetData->getElementData($position_id, true);
        if(isset($position['posts']) && isset($position['posts'][$position_id])):
            $position = $position['posts'][$position_id];?>
            <div class="menu-popup">
				<button class="menu-popup__close" type="button" onclick="this.closest(`[data-modal]`).classList.remove(`show`); body.style.overflow = `visible`;"> &times;</button>
                <div class="menu-popup__image-wrapper">
					<img class="menu-popup__image" src="<?=$position['fields']['image']['url']?>">
				</div>
				<div class="menu-popup__text-wrapper">
					<h3 class="menu-popup__title"><?=$position['name']?></h3>
					<div class="menu-popup__unit">
                        <?foreach( $position['fields']['prices'] as $index => $offer ):?>
                            <?if( $index !== 0 ) echo '&nbsp;/&nbsp;';?>
                            <?=$offer['price']?> ₽<?if( $offer['portion'] ):?> <span>(<?=$offer['portion']?> <?=$UNITS[$position['fields']['units']];?>)</span><?endif;?>
                        <?endforeach;?>
                    </div>
				</div>
				<?if( $position['fields']['short_description'] ):?>
                    <p class="menu-popup__description menu-popup__paragraf-text"><?=$position['fields']['short_description']?></p>
                <?endif;?>
				<?if( $position['fields']['detailed']['description'] ):?>
                    <p class="menu-popup__description menu-popup__paragraf-text"><?=$position['fields']['detailed']['description']?></p>
                <?endif;?>
				<?if( $position['fields']['detailed']['ingredients'] ):?>
                    <div class="menu-popup__composition">
                        <h4 class="menu-popup__paragraf-title"><?pll_e('title_menu-popup_structure');?></h4>
                        <p class="menu-popup__paragraf-text"><?=$position['fields']['detailed']['ingredients']?></p>
                    </div>
                <?endif;?>
                <?if( $position['fields']['detailed']['nutritional_value'] ):?>
                    <div class="menu-popup__nutritional">
                        <h4 class="menu-popup__paragraf-title"><?pll_e('title_menu-popup_nutritional');?></h4>
                        <p class="menu-popup__paragraf-text"><?=$position['fields']['detailed']['nutritional_value']?></p>
                    </div>
                <?endif;?>
			</div>
            <style>
                .menu-popup {
                    box-sizing: border-box;
                    background-color: #fff;
					display: grid;
					grid-template-columns: 1fr;
					grid-gap: 24px;
					position: relative;
					padding: 24px  24px;
					max-width: 620px;
                }
				@media screen and (max-width: 992px){
					.menu-popup {
						display: grid;
						padding: 24px  16px;
					}
				}
				.menu-popup__close {
					position: absolute;
					right: 0;
					top: 0;
					width: 26px;
					height: 26px;
					cursor: pointer;
					font-size: 26px;
					text-align: center;
					display: flex;
					justify-content: center;
					align-items: center;
					
				}
				.menu-popup__close:hover {
					color: #EF233C;
				}
				.menu-popup__image-wrapper {
					display: flex;
					justify-content: center;
					
				}
				.menu-popup__image {
					
					width: 100%;
					object-fit: cover;
					object-position: center center;
					align-self: center;
					
				}
				.menu-popup__text-wrapper {
					display: flex;
					flex-direction: column;
					
				}
				.menu-popup__title {
					text-align: left;
					font-family: "Merriweather", serif;
					font-size: 2rem;
					line-height: 2.5rem;
					border-bottom: 2px solid #EF233C;
					
				}
				.menu-popup__unit {
					font-family: "Oswald", sans-serif;
					font-weight: 500;
					font-size: 1.8rem;
					line-height: 2.5rem;
					text-align: right;
				}

                .menu-popup__unit span {
                    font-size: 1.5rem;
                    font-style: italic;
                    line-height: 2.2rem;
                    color: rgba(1, 15, 20, 0.5);
                }
				
				.menu-popup__nutritional {
					text-align: left;
					
				}
				.menu-popup__composition {
					text-align: left;
				}
				.menu-popup__colorific {				
				}
				.menu-popup__sku {
					text-align: left;
					
				}
				.menu-popup__paragraf-title {
					text-align: left;
					font-family: "Merriweather", serif;
					font-size: 1rem;
					line-height: 1.5rem;
					margin-bottom: 0.5rem;
				}
				.menu-popup__paragraf-text {
					text-align: left;
					font-family: IBM Plex Sans;
					font-size: 1.1rem;
					line-height: 1.2rem;
				}
            </style>
        <?endif;
    endif;
endAjaxContent('menu-position_popup');?>



<?
$printSectionPosts = function( $section_id, $is_selfish = false ) use (&$menu_items, &$UNITS) {
    if( $menu_items[$section_id] ):
        if( $is_selfish ): ?><div class="menu__item menu-sub-section"><? endif;

        foreach( $menu_items[$section_id] as $menu_item ):
            if( !$menu_item['fields']['prices'] ) continue;
            $unit = $UNITS[$menu_item['fields']['units']];
            $many_prices = (count($menu_item['fields']['prices']) > 1);
            $cl = (!$menu_item['fields']['no_information']) ? ' menu-popup-btn js-showMenuPositionPopup' : '' ; ?>

            <div class="menu__box menu-position">

                <h5 data-position="<?=$menu_item['id']?>" class="menu-position__name<?=$cl?>" title='<?=$menu_item['name']?>'>
                    <?if( $menu_item['fields']['is_new']):?><span>new</span><?endif;?>
                    <?=$menu_item['name']?>
                </h5>

                <?if( !$many_prices ):?>
                    <?if($menu_item['fields']['prices'][0]['portion']):?><span class="menu-position__unit"><?=$menu_item['fields']['prices'][0]['portion']?> <?=$unit?></span><?endif;?>
                    <span class="menu-position__price"><?=$menu_item['fields']['prices'][0]['price']?> ₽</span>
                <?endif;?>

                <?if($menu_item['fields']['is_set'] && is_array($menu_item['fields']['set'])):?>
                    <div class="menu-position__set">
                        <?foreach( $menu_item['fields']['set'] as $set_item ):
                            $cl = (!get_field('no_information', $set_item)) ? ' menu-popup-btn js-showMenuPositionPopup' : ''?>
                            <span data-position="<?=$set_item?>" class="<?=$cl?>"><?=get_the_title($set_item);?></span>
                        <?endforeach;?>
                    </div>
                <?endif;?>

                <?if( $menu_item['fields']['short_description'] ):?><p class="menu__description"><?=$menu_item['fields']['short_description']?></p><?endif;?>

                <?if( $many_prices ):?>
                    <div class="menu-position__offers">
                        <?foreach( $menu_item['fields']['prices'] as $sku ):?>
                            <div class="menu-position__offer">
                                <span class="menu-position__offer-name">
                                    <?=$sku['hint']?>
                                </span>
                                <span class="menu-position__unit"><?=$sku['portion']?> <?=$unit?></span>
                                <span class="menu-position__price"><?=$sku['price']?> ₽</span>
                            </div>
                        <?endforeach;?>
                    </div>
                <?endif;?>

            </div>
        <?endforeach;

        if( $is_selfish ): ?></div><? endif;
    endif;
};
$printSubSections = function ( $section_id ) use (&$menu_sections, $printSectionPosts) {
    if( isset($menu_sections[$section_id]) && !empty($menu_sections[$section_id]) && is_array($menu_sections[$section_id]) ) {
        foreach($menu_sections[$section_id] as $sub_section):
            ?><h4 class="menu__title menu__title_sub"><?=$sub_section['name']?></h4><?
            $printSectionPosts($sub_section['id']);
        endforeach;
    }
}; ?>

<section class="section section_m">
    <div class="container menu js-menu_block_container">

        <?startAjaxContent('menu-block_section');?>

        <?/*<a class="promo promo_primary not-link" href="#">
            <div class="container">
                <div class="promo__inner"><img class="promo__img" src="assets/images/promo.png"/>
                    <h2 class="promo__title">Электронная карта лояльности «Chelsea GastroPub»</h2>
                    <span class="promo__line"></span>
                    <div class="promo__option">
                        <span>5-15%</span>
                        <span>от суммы чека</span>
                        <span>начисляется на карту</span>
                    </div>
                    <div class="promo__option">
                        <span>до 100%</span>
                        <span>суммы чека</span>
                        <span>можно оплатить бонусами</span>
                    </div>
                    <button class="button button_promo promo__button">Открыть</button>
                </div>
            </div>
        </a>*/?>

        <?if( is_array($main_taxs) && !empty($main_taxs) ):?>
            <div class="tabs tabs_menu tabs_v2">
                <nav class="tabs__nav">
                    <?foreach( $main_taxs as $main_tax ):
                        $active_cl = ( $active_main_section_id == $main_tax['id'] ) ? ' is-active' : '' ;?>
                        <span class="tabs__tab<?=$active_cl?> js-filterItemsByTax" data-term="menu_tax" data-filter="<?=$main_tax['id']?>"><?=$main_tax['name']?></span>
                    <?endforeach;?>
                </nav>
                <?if( $active_main_section_data['fields']['explanation'] ):?><div class="tabs__date-text"><?=$active_main_section_data['fields']['explanation']?></div><?endif;?>
            </div>
        <?endif;?>

        <?if( $menu_sections || $menu_items ):?>
            <div class="menu-positions">

                <?$printSectionPosts($active_main_section_id, true);?>

                <?if( is_array($menu_sections) ):
                    foreach($menu_sections[$active_main_section_id] as $menu_section):?>
                        <div class="menu__item menu-sub-section">
                            <h3 class="menu__title"><?=$menu_section['name']?></h3>
                            <?$printSectionPosts($menu_section['id']);?>
                            <?$printSubSections($menu_section['id']);?>

                            <?if( is_array($menu_section['fields']['menu_banner']) && ($menu_section['fields']['menu_banner']['title'] || $menu_section['fields']['menu_banner']['description']) ):?>
                                <div class="menu__item menu__banner">
                                    <div class="menu__banner-box">
                                        <h3 class="menu__banner-title"><?=$menu_section['fields']['menu_banner']['title']?></h3>
                                        <div class="menu__banner-time">
                                            <span><?=$menu_section['fields']['menu_banner']['sub_title_line_1']?></span>
                                            <span><?=$menu_section['fields']['menu_banner']['sub_title_line_2']?></span>
                                        </div>
                                        <p class="menu__banner-subtitle"><?=$menu_section['fields']['menu_banner']['description']?></p>
                                    </div>
                                    <?if(is_array($menu_section['fields']['menu_banner']['items']) && !empty($menu_section['fields']['menu_banner']['items'])):
                                        foreach( $menu_section['fields']['menu_banner']['items'] as $banner_item ):?>
                                            <div class="menu__box">
                                                <h5 class="menu__name"><?=$banner_item['title']?></h5>
                                                <span class="menu__price"><?=$banner_item['price']?></span>
                                            </div>
                                        <?endforeach;
                                    endif;?>
                                </div>
                            <?endif;?>

                        </div>
                    <?endforeach;
                endif;?>

            </div>
        <?endif;?>

        <?endAjaxContent('menu-block_section');?>

    </div>
</section>


<style>

    .tabs_v2 {
        display: flex;
        justify-content: flex-start;
		flex-direction: column;
		margin-bottom: 32px;
    }
    .tabs__date-text {
        display: flex;
        align-self: center;
        font-family: "Merriweather", serif;
        font-size: 1rem;
        font-style: italic;
		margin: 12px;
    }
    .menu__title_sub {
        font-size: 1rem;
    }
    .menu-positions {
        column-count: 3;
    }
    .menu-sub-section {
        padding-right: 24px;
        padding-top: 24px;
    }

    .menu-popup-btn {}
    .menu-popup-btn:hover {
        cursor: pointer;
        opacity: 0.5;
    }
    /*position*/
    .menu-position {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 24px;
        font-size: 0.875rem;
        justify-content: flex-end;
		align-items: baseline;
    }
    .menu-position__name {
        margin-right: auto;
        font-family: "Merriweather", serif;
        font-weight: 700;
        font-size: 1rem;
        /*white-space: nowrap;*/
        overflow: hidden;
        max-width: 70%;
        text-overflow: ellipsis;
		flex: 1 0 70%;
    }
    .menu-position__name span, .menu-position__offer-name span {
        text-transform: uppercase;
        color: #FFBB53;
        margin-right: 5px;
    }
    .menu-position__name_offers, .menu-position__offers, .menu-position__set {
        width: 100%;
    }
    .menu-position__unit {
        font-size: 0.875rem;
        font-style: italic;
        line-height: 24px;
        color: rgba(1, 15, 20, 0.5);

    }
    .menu-position__price {
        font-family: "Oswald", sans-serif;
        font-weight: 500;
        font-size: 1.125rem;
        text-align: right;
        margin-left: 10px;

    }

    .menu-position__offers {
        margin-top: 8px;
    }
    .menu-position__offer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .menu-position__set span {}
    .menu-position__set span:not(:last-child)::after { content: ","}
    .menu-position__offer-name {
        margin-right: auto;
    }


    @media screen and (max-width: 992px) {
        .tabs_v2 {
            flex-direction: column-reverse;
            align-items: center;
			margin-bottom: 0;
        }
        .tabs__date-text {
            margin-left: 0;
            margin-bottom: 10px;
        }
        .menu-positions {
            column-count: 2;
        }
        .menu-position__name {
            max-width: 160px;
        }
        .menu-sub-section {
        }
    }

    @media screen and (max-width: 480px) {
        .menu-positions {
            column-count: 1;
            margin: 0;
        }
        .menu-sub-section {
            margin: 0;
			padding-right: 0;
        }
    }
</style>
