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

<section class="section">
    <div class="section__wrapper slider-main">

        <div class="slider-main__carousel-cont">
            <div class="slider-main__carousel owl-carousel">
                <?if( !empty($wstd_gd_cl->page_data['fields']['mp_slider']) && is_array($wstd_gd_cl->page_data['fields']['mp_slider']) ):
                    foreach( $wstd_gd_cl->page_data['fields']['mp_slider'] as $v ):?>

                        <a <?=( $v['alt'] ) ? 'href="' . $v['alt'] . '"' : "" ;?> class="slider-main__item">
                            <img src="<?=$v['url']?>" alt="<?=$v['title']?>" title="<?=$v['title']?>" class="img-responsive">
                        </a>

                    <?endforeach;
                endif;?>
            </div>

            <?=do_shortcode('[load_block block ="social_links" class=" slider-main__social-links"]');?>
        </div>

        <div class="slider-main__sub-carousel owl-carousel">

            <?if( is_array($data['posts']) && !empty($data['posts']) ):
                foreach( $data['posts'] as $p ):?>

                    <div class="card slider-main__sub-item">
                        <div class="img-box card__img-box">
                            <img src="<?=$p['thumbnail']['src']?>" alt="<?=$p['name']?>" title="<?=$p['name']?>" class="img-responsive">
<!--                            <div class="card__tag">-->
<!--                                <b>30%</b> Скидка-->
<!--                            </div>-->
                        </div>
                        <div class="text-box card__text-box">
                            <div class="card__row">
                                <span class="card__type"><?=$p['tax'][0]['name']?></span>
                                <span class="card__date"><?=date_i18n('d F Y', strtotime($p['modify']));?></span>
                            </div>
                            <h4 class="card__title"><?=$p['name']?></h4>
                            <?if($p['preview']):?>
                                <p class="card__text">
                                    <?=$p['preview']?>
                                </p>
                            <?endif;?>

                            <a href="<?=$p['link']?>" title="<?=$p['name']?>" class="link card__link">Читать</a>
                        </div>
                    </div>

                <?endforeach;
            endif;?>

        </div>
    </div>

</section>