<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 *    int reviews_section_id
 */
global $WSTDGetData;

$reviews_query_params = [
  'post_type' => 'reviews',
  'posts_per_page' => -1,
  'meta_query' => array(
    'position_index' => array(
      'key'     => 'index',
      'compare' => 'EXISTS',
    ),
  ),
  'orderby' => 'position_index',
  'order'   => 'ASC',
];

if( $options['reviews_section_id'] > 0 ) {
  $reviews_query_params['tax_query'] = array(
    array(
      'taxonomy' => 'reviews_tax',
      'field'    => 'id',
      'terms'    => $options['reviews_section_id']
    )
  );
}

$reviews = $WSTDGetData->getElementsData( $reviews_query_params )['posts'];

if($reviews):?>
  <section class="section section_l">
    <div class="container">
      <div class="line line_top line_bottom">
        <div class="reviews js-review-slider">
          <div class="reviews__quote"><svg viewBox="0 0 40 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0.620117V15.6201H10C10 21.1701 5.55 25.6201 0 25.6201V30.6201C8.25 30.6201 15 23.8701 15 15.6201V0.620117H0ZM25 0.620117V15.6201H35C35 21.1701 30.55 25.6201 25 25.6201V30.6201C33.25 30.6201 40 23.8701 40 15.6201V0.620117H25Z"></path></svg></div>
          <div class="reviews__pagination"></div>
          <div class="reviews__slider swiper-container">
            <div class="swiper-wrapper">
              <?foreach( $reviews as $review ):?>
                <div class="swiper-slide reviews__item">
                  <div class="reviews__item-inner">
                    <h5 class="reviews__name"><?=$review['name']?></h5>
                    <p class="reviews__text"><?=$review['content']?></p>
                    <?if($review['thumbnail']):?><img class="reviews__icon" src="<?=$review['thumbnail']['src']?>"/><?endif;?>
                  </div>
                </div>
              <?endforeach;?>
            </div>
            <div class="navs reviews__navs">
              <button class="navs__item navs__item_prev" type="button"><svg viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.939341 12.6807C0.353554 12.0949 0.353554 11.1451 0.939341 10.5593L10.4853 1.01339C11.0711 0.427607 12.0208 0.427607 12.6066 1.01339C13.1924 1.59918 13.1924 2.54893 12.6066 3.13471L4.12132 11.62L12.6066 20.1053C13.1924 20.6911 13.1924 21.6408 12.6066 22.2266C12.0208 22.8124 11.0711 22.8124 10.4853 22.2266L0.939341 12.6807ZM26 13.12L2 13.12V10.12L26 10.12V13.12Z"></path></svg></button>
              <button class="navs__item navs__item_next" type="button"><svg viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.0607 10.5593C25.6464 11.1451 25.6464 12.0949 25.0607 12.6807L15.5147 22.2266C14.9289 22.8124 13.9792 22.8124 13.3934 22.2266C12.8076 21.6408 12.8076 20.6911 13.3934 20.1053L21.8787 11.62L13.3934 3.13471C12.8076 2.54893 12.8076 1.59918 13.3934 1.01339C13.9792 0.427607 14.9289 0.427607 15.5147 1.01339L25.0607 10.5593ZM0 10.12L24 10.12V13.12L0 13.12L0 10.12Z"></path></svg></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?endif;?>
