<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
$gallery = ( $attr['another-field'] ) ? $wstd_gd_cl->page_data['fields'][$attr['another-field']] : $wstd_gd_cl->page_data['fields']['gall'];

if( is_array($gallery) && !empty($gallery) ):?>
    <section class="section">
        <div class="section__wrapper">
            <h3 class="title"><?=$attr['title']?></h3>
            <div class="certificates">
                <div class="certificates__carousel owl-carousel">
                    <?foreach( $gallery as $img ):?><?//$img['sizes']['medium']?>
                        <a data-fancybox="gallery-certificates" href="<?=$img['url']?>" title="<?=$img['title']?>" class="certificates__item img-box">
                            <img src="<?=$img['url']?>" alt="<?=$img['title']?>" title="<?=$img['title']?>" class="img-responsive">
                        </a>
                    <?endforeach;?>

                </div>
            </div>
        </div>
    </section>
<?endif;?>