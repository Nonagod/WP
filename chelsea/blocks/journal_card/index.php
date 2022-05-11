<?php
/**
 * @var $block_index_path
 * @var $block_folder
 * @var array $options
 *  object post
 *  object thumbnail
 */
?>

<div class="hit-slider__slide swiper-slide card card_journal">
    <?if( $options['thumbnail'] ):?><div class="card__image"><img class="lazy swiper-lazy" data-src="<?=$options['thumbnail']->guid?>" src="<?=THEME_URL?>/assets/images/pattern.png"/></div><?endif;?>
    <div class="card__box">
        <h4 class="card__title"><?=$options['post']->post_title?></h4>
        <?if($options['post']->post_excerpt):?><p class="card__text"><?=$options['post']->post_excerpt?></p><?endif;?>
        <a href="<?=get_permalink($options['post']->ID);?>" class="button button_grey button_mini card__button"><?pll_e('read');?></a>
    </div>
</div>
