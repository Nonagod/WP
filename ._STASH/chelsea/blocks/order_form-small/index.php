<?php
/**
 * @var string $block_index_path
 * @var string $block_folder
 * @var array $options
 *      block
 */
$form = $GLOBALS['theme_options']['form_options'];
$form['availability']['disabled_booking_dates'] = $form['availability']['disabled_booking_dates'] ? array_column($form['availability']['disabled_booking_dates'], 'date') : false;
?>

    <script src="https://www.google.com/recaptcha/api.js?render=6LdUdTgbAAAAAIB8DQ0uV4gjctPmWAlHhsoHTPVs"></script>
    <script>
        blocked_form_dates = <?=json_encode($form['availability']['disabled_booking_dates'])?>;
    </script>

    <form class="form form_order js-form-order">

        <?if( !checkElementByAvailability($form) ):?>
            <div class="form-block form__form-block">
                <div class="form-block__bg"></div>
                <?if( $form['availability']['blocked_text'] ):?><div class="form-block__content"><?=$form['availability']['blocked_text']?></div><?endif;?>
            </div>
        <?endif;?>

        <?if( !$options['block'] ):?><button class="form__close" type="button" data-modal-close="data-modal-close"><i class="icon"><img src="<?=THEME_URL?>/assets/images/icons/close.svg"></i></button><?endif;?>
        <h3 class="form__title"><?pll_e('form_title');?></h3>
        <span class="form__line" style="background-image: url('<?=THEME_URL?>/assets/images/line/line-form.png')"></span>
        <div class="form__section form__section_main">

            <div class="form__col form__col_one" style="display: none;">
                <div class="form__day" data-form="day-container"><span class="form__day-weekday" data-form="weekday">Вторник</span><span class="form__day-month" data-form="month">Ноябрь</span>
                    <input class="form__day-input flatpickr-input" type="text" value="" data-form="day-input" readonly="readonly">
                    <input class="form__day-input-hidden" type="hidden" value="Ноябрь:Вторник:17" data-form="day-input-hidden"><span class="form__day-span" data-form="day-span">17</span><i class="icon form__day-arrow"><img src="<?=THEME_URL?>/assets/images/icons/triangle-down.svg"></i>
                </div>
            </div>

            <span class="form__line-form-one" style="background-image: url('<?=THEME_URL?>/assets/images/line/line-form-one.png'); display:none;"></span>
            <div class="form__col form__col_two" style="display: none;">

                <div class="marks-block form__time" data-form="time-container"><span class="marks-block__title"><?pll_e('form_label_time');?></span>
                    <div class="marks-block__marks">
                        <input class="marks-block__mark marks-block__mark_dark flatpickr-input" type="text" value="" data-form="time-input" readonly="readonly">
                        <input class="form__time-input-hidden marks-block__mark marks-block__mark_dark" type="hidden" value="14:29" data-form="time-input-hidden"><span class="marks-block__mark marks-block__mark_dark" data-form="time-hours-span">14</span><span class="marks-block__mark marks-block__mark_dark" data-form="time-minutes-span">29</span>
                    </div>
                </div>

                <div class="marks-block form__person" data-form="guest-container"><span class="marks-block__title"><?pll_e('form_label_guest-numbers');?></span>
                    <div class="marks-block__marks">
                        <input class="marks-block__mark marks-block__mark_dark" type="number" value="1" data-form="guest-input" data-min="1" data-max="100">
                    </div>
                </div>

            </div>
            <span class="form__line-form-two" style="background-image: url('<?=THEME_URL?>/assets/images/line/line-form-two.png'); display:none;"></span>
            <div class="form__col form__col_three">

                <div class="marks-block form__name error" data-form="name-container">
                    <span class="marks-block__title"><?pll_e('form_label_call-you');?></span>
                    <div class="marks-block__marks">
                        <input class="marks-block__mark" type="text" placeholder="<?pll_e('form_label_your-name');?>" data-form="name-input">
                    </div>
                </div>

                <div class="marks-block form__phone error" data-form="phone-container"><span class="marks-block__title"><?pll_e('form_label_phone');?></span>
                    <div class="marks-block__marks"><span class="marks-block__mark marks-block__mark_transparent">+7</span>
                        <input class="marks-block__mark" type="tel" placeholder="999" data-form="phone-input-p1">
                        <input class="marks-block__mark" type="tel" placeholder="999" data-form="phone-input-p2">
                        <input class="marks-block__mark" type="tel" placeholder="99" data-form="phone-input-p3">
                        <input class="marks-block__mark" type="tel" placeholder="99" data-form="phone-input-p4">
                    </div>
                </div>

            </div>

            <span class="form__line-form-one" style="background-image: url('<?=THEME_URL?>/assets/images/line/line-form-one.png')"></span>

            <div class="form__col form__col_three">
                <span class="marks-block__title"><?pll_e('form_label_comment');?></span>
                <div class="marks-block__marks">
                    <textarea class="marks-block__mark" name="comment" rows="5"></textarea>
                </div>
            </div>

        </div>
        <ul class="form__section form__section_error is-error" data-form="error-container">
            <li><?pll_e('form_text_required-field-empty');?></li>
        </ul>
        <span class="form__line-circles" style="background-image: url('<?=THEME_URL?>/assets/images/line/line-circles.svg')"></span>
        <div class="form__section form__section_actions">
            <button class="button button_accent"><?pll_e('Забронировать');?></button>
            <p class="form__politic"><?pll_e('form_text_policy');?></p>
        </div>
    </form>