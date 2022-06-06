<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
if( $attr['background'] && $attr['title'] ):?>
    <section class="section">
        <div class="section__wrapper about" style="background-image: url(<?=$attr['background']?>);">
            <div class="text-box about__text-box about__text-box_title">
                <h1 class="title title_color-light"><?=$attr['title']?></h1>
                <?if( $attr['sub_text'] ):?><i class="about__sub-text"><?=$attr['sub_text']?></i><?endif;?>
            </div>
        </div>
    </section>
<?endif;?>