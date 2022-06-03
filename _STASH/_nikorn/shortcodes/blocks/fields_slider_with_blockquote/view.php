<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
$fields = $wstd_gd_cl->page_data['fields'];

?>
    <section class="section">
        <div class="section__wrapper">
            <?if( $attr['blockquote_bigger'] ):?><blockquote class="blockquote blockquote_bigger"><?=$attr['blockquote_bigger']?></blockquote><?endif;?>

            <?if( $attr['text'] ):?>
                <div class="desc">
                    <?=($attr['text']);?>
                </div>
            <?endif;?>

            <?if( $fields['block_fswb_gallery'] ):?>
                <div class="slider-clinic">
                    <div class="slider-clinic__carousel owl-carousel">
                        <?foreach( $fields['block_fswb_gallery'] as $image ):?>
                            <div class="img-box slider-clinic__item">
                                <img src="<?=$image['url']?>" alt="<?=$image['title']?>" title="<?=$image['title']?>" class="img-responsive">
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            <?endif;?>

            <?if( $content ):?>
                <div class="desc">
                    <?=$content?>
                </div>
            <?endif;?>

        </div>
    </section>




