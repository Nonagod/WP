<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 *
 * excel
 * title
 *
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
?>

<?if( $data['posts'] ):?>
    <section id="investments" class="section section_bg" style="background-image: url('<?=THEME_URL?>images/invest_bg.jpg')">
        <div class="wrapper investment">
            <h2 class="title title_white"><?=$attr['title']?></h2>
            <div class="owl-carousel investment__slider slider">

                <?foreach( $data['posts'] as $el ):?>
                    <a href="<?=$el['link']?>" class="investment__item">
                        <h3 class="title title_white investment__name"><?=$el['name']?></h3>
                        <p class="text text_white investment__text">
                            <?=$el['fields']['sub_title']?>
                        </p>
                    </a>
                <?endforeach;?>

            </div>
        </div>
    </section>
<?endif;?>