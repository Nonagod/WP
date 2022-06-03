<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
?>

<?if( $data['posts'] ):?>
    <section class="section">
        <div class="section__wrapper">
            <h2 class="title"><?=$attr['title']?></h2>
            <blockquote class="blockquote"><?=$attr['blockquote']?></blockquote>
<!--            <div class="categories">-->
<!--                <a href="#" class="link categories__link categories__link_active">Все</a>-->
<!--                <a href="#" class="link categories__link">Текстовые</a>-->
<!--                <a href="#" class="link categories__link">Фотографии</a>-->
<!--                <a href="#" class="link categories__link">Видеоотзыв</a>-->
<!--            </div>-->
            <div class="slider-reviews">
                <div class="slider-reviews__carousel owl-carousel">

                    <?foreach( $data['posts'] as $k => $v ):
                        $v['category_color_class'] = '';
                        $v['category_name'] = '';
                        echo do_shortcode('[load_block block="element_reviews-card_v2"]' . base64_encode(serialize($v)) . '[/load_block]');?>
                    <?endforeach;?>

                </div>
            </div>
        </div>
    </section>
<?endif;?>


<?if( $attr['form'] == 'Y' ):?>
    <section id="review" class="section">
        <div class="section__wrapper">
            <h2 class="title">Оставьте свой отзыв</h2>
            <div class="form-box">
                <form action="#" method="post" onsubmit="sendMail_2( this ); return false;" class="form-box__form">
                    <input type="hidden" name="backmail" value="1">
                    <input type="hidden" name="page_el_title" value="<?=$wstd_gd_cl->page_data['post_title']?>">
                    <input type="text" class="input-field form-box__field" placeholder="Ваше имя" name="name" value="" required/>
                    <input type="email" class="input-field form-box__field" placeholder="Ваша почта" name="email" value="" required/>
                    <textarea placeholder="Сообщение" name="text" id="message" rows="3" class="input-field input-field_textarea form-box__field"></textarea>
                    <div class="form-box__row">
                        <div class="form-box__checkbox-cont">
                            <input id="checkboxReviewVisible" name="check" class="form-box__checkbox" type="checkbox" checked required>
                            <label for="checkboxReviewVisible" class="text form-box__checkbox-label">
                                <p class="text form-box__sub-text">Согласие на обработку<br>персональных данных</p>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="button form-box__btn">Отправить</button>
                </form>
            </div>
        </div>
    </section>
<?endif;?>
