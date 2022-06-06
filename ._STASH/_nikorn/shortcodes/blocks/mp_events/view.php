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
            <div class="slider-offers">
                <div class="slider-offers__carousel owl-carousel">

                    <?foreach( $data['posts'] as $k => $v ):?>
                        <div class="card card_fourth slider-offers__item">
                            <div class="img-box card__img-box">
                                <img src="<?=$v['thumbnail']['src']?>" alt="<?=$v['name']?>" title="<?=$v['name']?>" class="img-responsive">
                                <div class="card__tag <?=$v['tax'][0]['fields']['post_t_class-color']?>">
                                    <?foreach( $v['tax'] as $tk => $tv ):?><?=($tk > 0)? ", " : "";?><?=$tv['name']?><?endforeach;?>
                                </div>
                            </div>
                            <div class="text-box card__text-box">
                                <div class="card__row">
                                    <span class="card__date"><?=( $v['fields']['pa_available_to'] ) ? 'до ' . $v['fields']['pa_available_to'] : date_i18n('d F Y', strtotime($v['modify']));?></span>
                                </div>
                                <h4 class="card__title"><?=$v['name']?></h4>
                                <?=($v['preview'])? '<p class="card__text">'.$v['preview'] . '</p>' : '';?>
                                <a href="<?=$v['link']?>" title="<?=$v['name']?>" class="link card__link">Читать</a>
                            </div>
                        </div>
                    <?endforeach;?>

                </div>
            </div>
        </div>
    </section>
<?endif;?>