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
 * @var $title
 * @var $undertitle_text
 * @var $work_time
 * @var $address
 * @var $metro
 *
 * @var $social_instagram
 * @var $social_vk
 * @var $social_facebook
 * @var $social_telegram
 */

?>

<div class="main-section__info">
    <h1 class="title title_color_white"><?=$title?></h1>
    <p class="main-section__text"><?=$undertitle_text?></p>
    <p class="main-section__text main-section__text_pad-left"><?=$work_time?>
        <svg class="main-section__icon" width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="12" y="3" width="6" height="2" fill="white"></rect><path d="M4 3L10 0V21H4V3Z" fill="white"></path><rect x="16" y="19" width="6" height="2" fill="white"></rect><rect y="19" width="4" height="2" fill="white"></rect><rect x="18" y="5" width="16" height="2" transform="rotate(90 18 5)" fill="white"></rect></svg>
    </p>
    <!--<div class=" title rate-cicle">
      7.1
    </div>
    <div class="rate-cicle-line">
      <p class="title rate-cicle-line__title">4.0</p>
      <ul class="rate-cicle-line__list">
        <li class="rate-cicle-line__elem rate-cicle-line__elem_circle"></li>
        <li class="rate-cicle-line__elem rate-cicle-line__elem_circle"></li>
        <li class="rate-cicle-line__elem rate-cicle-line__elem_circle"></li>
        <li class="rate-cicle-line__elem rate-cicle-line__elem_circle"></li>
        <li class="rate-cicle-line__elem"></li>
      </ul>
    </div> -->
    <p class="main-section__text main-section__text_pad-left main-section__text_icon">
        <?=$address?> <br>
        <span class="main-section__text main-section__text_small"><?=$metro?></span>
        <svg class="main-section__icon" width="16" height="23" viewBox="0 0 16 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8C16 9.7006 15.4694 11.2773 14.5647 12.5735L8 23L1.33635 12.4283C1.26237 12.3172 1.19109 12.2041 1.12261 12.0892L1.06641 12H1.07026C0.389577 10.8233 0 9.45715 0 8ZM8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z" fill="white"></path></svg>
    </p>
    <div class="main-section__text main-section__text_pad-left"><?=pll__('Мы в социальных сетях');?>
        <ul class="social main-section__social">
            <?if( $social_facebook ): ?><li class="social__item"><a class="social__link" href="<?=$social_facebook?>" onclick="yaCounter53115304.reachGoal('49074553'); return true;"><i class="fab fa-facebook"></i></a></li><?endif;?>
            <?if( $social_vk ): ?><li class="social__item"><a class="social__link" href="<?=$social_vk?>" onclick="yaCounter53115304.reachGoal('49074553'); return true;"><i class="fab fa-vk"></i></a></li><?endif;?>
            <?if( $social_instagram ): ?><li class="social__item"><a class="social__link" href="<?=$social_instagram?>" onclick="yaCounter53115304.reachGoal('49074553'); return true;"><i class="fab fa-instagram"></i></a></li><?endif;?>
            <?if( $social_telegram ): ?><li class="social__item"><a class="social__link" href="<?=$social_telegram?>" onclick="yaCounter53115304.reachGoal('49074553'); return true;"><i class="fab fa-telegram"></i></a></li><?endif;?>
        </ul>
    </div>
</div>

