<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 */
$contacts = $GLOBALS['theme_options']['contacts'];
?>

<section class="section section_l">
    <div class="container">
        <div class="block-form">

            <div class="block-form__info">
                <div class="title-block block-form__title">
                    <div class="title-block__title"><span><?pll_e('st_of-mp_waiting-you');?></span></div>
                </div>
                <div class="block-form__item block-form__item_marks">
                    <div class="marks-block block-form__mark block-form__mark_days"><span class="marks-block__title"><?pll_e('st_of-mp_schedule');?></span>
                        <div class="marks-block__marks"><span class="marks-block__mark" style="letter-spacing: 0.4em;"><?=$contacts['schedule']?></span></div>
                    </div>
                    <div class="block-form__mark block-form__mark_time">
                        <div class="marks-block"><span class="marks-block__title"><?pll_e('st_of-mp_opening');?></span>
                            <div class="marks-block__marks"><span class="marks-block__mark"><?=$contacts['opens_in']?></span></div>
                        </div>
                        <div class="marks-block"><span class="marks-block__title"><?pll_e('st_of-mp_closing');?></span>
                            <div class="marks-block__marks"><span class="marks-block__mark"><?=$contacts['closses_in']?></span></div>
                        </div>
                    </div>
                    <div class="marks-block block-form__mark block-form__mark_address"><span class="marks-block__title"><?pll_e('st_of-mp_where-look');?></span>
                        <div class="marks-block__marks"><span class="marks-block__mark"><?=$contacts['metro_stations']?></span></div>
                    </div>
                </div>
                <div class="block-form__item">
                    <p><?=$contacts['description']?></p>
                </div>
            </div>

            <div class="block-form__form">
                <?loadBlock('order_form', array('block' => true));?>
            </div>
        </div>
    </div>
</section>
