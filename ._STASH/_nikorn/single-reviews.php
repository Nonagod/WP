<?php get_header();?>
<section class="section">
    <div class="section__wrapper">
        <?if( !empty($data['fields']['r_video-link']) ):?>
            <div class="review">
                <iframe class="review__video" src="<?=$wstd_gd_cl->page_data['fields']['r_video-link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        <?else:?>
            <div class="review">
                <?if( !empty($wstd_gd_cl->page_data['thumbnail']['src']) ):?><img src="<?=$wstd_gd_cl->page_data['thumbnail']['src']?>" alt="<?=$wstd_gd_cl->page_data['post_title']?>" title="<?=$wstd_gd_cl->page_data['post_title']?>" class="review__img"><?endif;?>
                <div class="review__date"><?=date_i18n('d F Y', strtotime($wstd_gd_cl->page_data['post_modified']))?></div>
                <h2 class="review__title title"><?=$wstd_gd_cl->page_data['post_title']?></h2>
                <p class="review__text"><?=$wstd_gd_cl->page_data['post_content']?></p>
            </div>
        <?endif;?>
    </div>
</section>
    <!-- OLD
            <h1 class="title">Отзывы</h1>
            <div class="slider-review">
                <div class="slider-review__carousel owl-carousel">

                    <div class="slider-review__item">
                        <div class="slider-review__date"></div>
                        <div class="slider-review__name"></div>
                        <div class="slider-review__text"></div>
                    </div>

                </div>
            </div>
    -->


    <section class="section">
        <div class="section__wrapper">
            <h2 class="title">Оставьте свой отзыв</h2>
            <div class="form-box">
                <form id="formReview" action="#" method="post" onsubmit="sendMail( this ); return false;" class="form-box__form">
                    <input type="text" class="input-field form-box__field" placeholder="Ваше имя" name="name" value="" required/>
                    <input type="email" class="input-field form-box__field" placeholder="Ваша почта" name="email" value="" required/>
                    <textarea placeholder="Сообщение" name="text" id="message" rows="3" class="input-field input-field_textarea form-box__field"></textarea>
                    <div class="form-box__row">
                        <div class="form-box__checkbox-cont">
                            <input id="checkboxReviewVisible" class="form-box__checkbox" name="check" type="checkbox" checked required>
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

<?php get_footer(); ?>