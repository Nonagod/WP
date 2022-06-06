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
    <div class="section__wrapper about"<?=($attr['background']) ? ' style="background-image: url(' . $attr['background'] . ')"' : "" ;?>>
        <div class="text-box about__text-box">
            <h3 class="title"><?=$attr['title']?></h3>
            <p class="about__accent-text"><?=$attr['accent_text']?></p>
            <?=$content?>
        </div>
    </div>
</section>