<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
if( is_array($data) && !empty($data) ):?>
    <section class="section">
        <div class="section__wrapper">
            <h1 class="title">Технологии</h1>
            <div class="flexbox">

                <?foreach( $data as $k => $v ):
                    $v['category_color_class'] = $wstd_gd_cl->page_data['fields']['post_t_class-color'];
                    $v['category_name'] = $wstd_gd_cl->page_data['label'];
                    echo do_shortcode('[load_block block="element_events-card" card_class=" card_third" ]' . base64_encode(serialize($v)) . '[/load_block]');?>
                <?endforeach;?>

            </div>
        </div>
    </section>


<?endif;?>
