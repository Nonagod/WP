<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 */
global $WSTDGetData;

$UNITS = array( 'gram' => 'г.', 'milliliter' => 'мл.' );

$menu_items = $WSTDGetData->getElementsData( [
  'post_type' => 'menu',
  'posts_per_page' => 12,
  'meta_query' => array(
    'position_index' => array(
      'key'     => 'index',
      'compare' => 'EXISTS',
    ),
    'is_hit' => array(
      'key'     => 'is_hit',
      'value'   => 1,
      'compare' => '=',
    ),
  ),
  'orderby' => 'position_index',
  'order'   => 'ASC',
], true )['posts'];


if( $menu_items ):?>

  <section class="section section_l">
    <div class="container">
      <div class="hit-slider js-hit-slider">
        <div class="title-block">
          <div class="title-block__title"><span><?pll_e('title_menu-hits');?></span><a class="title-block__link" href="<?=prepareLinkPll('/menu/');?>"><?=pll_e('link_all-menu');?></a></div>
          <div class="navs title-block__actions hit-slider__navs">
            <button class="navs__item navs__item_prev" type="button"><svg viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.939341 12.6807C0.353554 12.0949 0.353554 11.1451 0.939341 10.5593L10.4853 1.01339C11.0711 0.427607 12.0208 0.427607 12.6066 1.01339C13.1924 1.59918 13.1924 2.54893 12.6066 3.13471L4.12132 11.62L12.6066 20.1053C13.1924 20.6911 13.1924 21.6408 12.6066 22.2266C12.0208 22.8124 11.0711 22.8124 10.4853 22.2266L0.939341 12.6807ZM26 13.12L2 13.12V10.12L26 10.12V13.12Z"></path></svg></button>
            <button class="navs__item navs__item_next" type="button"><svg viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.0607 10.5593C25.6464 11.1451 25.6464 12.0949 25.0607 12.6807L15.5147 22.2266C14.9289 22.8124 13.9792 22.8124 13.3934 22.2266C12.8076 21.6408 12.8076 20.6911 13.3934 20.1053L21.8787 11.62L13.3934 3.13471C12.8076 2.54893 12.8076 1.59918 13.3934 1.01339C13.9792 0.427607 14.9289 0.427607 15.5147 1.01339L25.0607 10.5593ZM0 10.12L24 10.12V13.12L0 13.12L0 10.12Z"></path></svg></button>
          </div>
        </div>
        <div class="hit-slider__slider swiper-container">
          <div class="swiper-wrapper">
            <?foreach($menu_items as $item):
                $units = $UNITS[$item['fields']['units']]; ?>
              <a class="hit-slider__slide swiper-slide card card_hit not-link" data-position="<?=$item['id']?>" href="javascript:void(0)">
                <div class="card__image">
                  <img class="swiper-lazy" data-src="<?=$item['fields']['image']['url']?>" src="<?=THEME_URL?>/assets/images/pattern.png"/>
                </div>
                <div class="card__box">

                  <div>
                    <span class="card__price"><?=implode('/', array_column($item['fields']['prices'], 'price'))?> ₽</span>
                    <?if( $portions = implode('/', array_column($item['fields']['prices'], 'portion')) ):?><span class="card__weight"><?=$portions?> <?=$units?></span><?endif;?>
                  </div>

                  <p class="card__text"><?=$item['name']?></p>
                </div>
              </a>
            <?endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?endif;?>