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
        <div class="section__wrapper" style="background-image: url(<?=$attr['background-image']?>);">
            <h3 class="title<?=$attr['title-classes']?>"><?=$attr['title']?></h3>
            <div class="slider-tech">
                <div class="slider-tech__carousel owl-carousel">

                    <?foreach( $data['posts'] as $p ):
                        $p['category_color_class'] = '';
                        $p['category_name'] = 'Технология';
                        echo do_shortcode('[load_block block="element_events-card" card_class=" card_third slider-tech__item" ]' . base64_encode(serialize($p)) . '[/load_block]');?>

                    <?endforeach;?>

                </div>
            </div>
        </div>
    </section>
<?endif;?>