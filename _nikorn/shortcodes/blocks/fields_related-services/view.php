<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */

if( $data ):?>
    <section class="section">
        <div class="section__wrapper" style="background-image: url('<?=THEME_URL?>img/section/bg.png');">
            <h1 class="title title_color-light">Оказывает услуги</h1>
            <div class="sub-services">

                <?foreach( $data as $s ):?>
                    <div class="sub-services__item">
                        <a href="<?=$s['link']?>" title="<?=$s['name']?>" class="sub-services__link">
                            <div class="img-box sub-services__icon-box">
                                <img src="<?=$s['thumbnail']['src']?>" alt="<?=$s['name']?>" title="<?=$s['name']?>" class="img-responsive">
                            </div>
                            <h4 class="sub-services__title"><?=$s['name']?></h4>
                        </a>
                    </div>
                <?endforeach;?>

            </div>
        </div>
    </section>
<?endif;?>