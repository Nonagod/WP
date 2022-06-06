<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
$gallery = $wstd_gd_cl->page_data['fields']['block_ftswd_gallery'];

if( is_array($gallery) && !empty($gallery) ):?>

    <section class="section">
        <div class="section__wrapper">
            <h2 class="title"><?=$attr['title']?></h2>
            <div class="slider-hash">

                <div class="slider-hash__nav">
                    <?$imgs = '';
                    foreach( $gallery as $k=>$img ):?>
                        <a href="#hash-<?=$k?>" class="link slider-hash__link<?=( $k == 0 )? ' slider-hash__link_active' : '' ;?>">
                            <div class="slider-hash__number">0<?=$k+1?></div>
                            <p class="slider-hash__text"><?=$img['description']?></p>
                        </a>
                        <?$imgs .= '<div class="slider-hash__item img-box" data-hash="hash-'. $k .'"><img src="' . $img['url'] . '" alt="'. $img['title'] .'" title="'. $img['title'] .'" class="img-responsive"></div>';
                    endforeach;?>
                </div>

                <div class="slider-hash__carousel owl-carousel">
                    <?=$imgs?>
                </div>

            </div>
        </div>
    </section>


<?endif;?>

