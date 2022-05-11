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
    <div class="section__wrapper nkrnk">
        <div class="text-box nkrnk__text-box">
            <div class="img-box nkrnk__img-box">
                <img src="<?=$attr['img']?>" alt="<?=$attr['sub-title']?>" title="<?=$attr['sub-title']?>" class="img-responsive">
            </div>
            <h1 class="title nkrnk__title"><?=$attr['sub-title']?></h1>
            <h2 class="title title_color-light"><?=$attr['title']?></h2>

            <?if( $data['posts'] ):?>
                <div class="nkrnk__box">
                    <?foreach( $data['posts'] as $p ):?>
                        <a href="<?=$p['link']?>" title="<?=$p['name']?>" class="nkrnk__link"><?=$p['name']?></a>
                    <?endforeach;?>
                </div>
            <?endif;?>

        </div>
    </div>
</section>