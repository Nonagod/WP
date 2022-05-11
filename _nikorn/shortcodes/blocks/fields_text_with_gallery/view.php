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

if( $fields['block_ftwg_title'] && $fields['block_ftwg_text'] && $fields['block_ftwg_gallery'] ):?>
    <section class="section">
        <div class="section__wrapper award">
            <div class="text-box award__text-box">
                <h3 class="title award__title"><?=$fields['block_ftwg_title']?></h3>
                <p class="award__text"><?=$fields['block_ftwg_text']?></p>
            </div>
            <?if( is_array($fields['block_ftwg_gallery']) ):?>
                <div class="award__gallery">
                    <?foreach( $fields['block_ftwg_gallery'] as $img ):?>
                        <a data-fancybox="gallery" href="<?=$img['url']?>" title="<?=$img['title']?>" class="award__gallery-link">
                            <div class="award__img-box" style="background-image: url(<?=$img['url']?>)"></div>
                        </a>
                    <?endforeach;?>
                </div>
            <?endif;?>
        </div>
    </section>
<?endif;?>