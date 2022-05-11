<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */

if( $data ):
    if( !empty($data['fields']['r_video-link']) ):?>
        <div class="card slider-reviews__item">
            <a class="owl-video" href="<?=str_replace('embed/', 'watch?v=', $data['fields']['r_video-link'])?>"></a>
        </div>
    <?elseif( !empty($data['thumbnail']['src']) ):?>
        <div class="card slider-reviews__item">
            <div class="img-box card__img-box">
                <img src="<?=$data['thumbnail']['src']?>" alt="<?=$data['name']?>" title="<?=$data['name']?>" class="img-responsive">
            </div>
            <div class="text-box card__text-box slider-reviews__text-box">
                <div class="card__row">
                    <span class="card__date"><?=date_i18n('d F Y', strtotime($data['modify']))?></span>
                </div>
                <h4 class="card__title"><?=$data['name']?></h4>
                <p class="card__text">
                    <?=wp_trim_words($data['content'], 21, '...')?>
                </p>
                <a href="<?=$data['link']?>" title="<?=$data['name']?>" class="link card__link">Читать</a>
            </div>
        </div>
    <?else:?>
        <div class="card slider-reviews__item">
            <div class="text-box card__text-box slider-reviews__text-box">
                <div class="card__row">
                    <span class="card__date"><?=date_i18n('d F Y', strtotime($data['modify']))?></span>
                </div>
                <h4 class="card__title"><?=$data['name']?></h4>
                <p class="card__text">
                    <?=wp_trim_words($data['content'])?>
                </p>
                <a href="<?=$data['link']?>" title="<?=$data['name']?>" class="link card__link">Читать</a>
            </div>
        </div>
    <?endif;?>
<?endif;?>