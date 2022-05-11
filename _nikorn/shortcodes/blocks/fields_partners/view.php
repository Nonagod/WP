<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
if( $wstd_gd_cl->page_data['fields']['nok_participant-loop'] ):?>

    <section class="section">
        <div class="section__wrapper">
            <h3 class="title">УЧАСТНИКИ</h3>
            <div class="partners partners_jc-center">

                <?foreach( $wstd_gd_cl->page_data['fields']['nok_participant-loop'] as $img ):?>
                    <div class="img-box partners__item">
                        <img src="<?=$img['nok_participant-img']['url']?>" alt="<?=$img['nok_participant-name']?>" title="<?=$img['nok_participant-name']?>" class="img-responsive">
                    </div>
                <?endforeach;?>

            </div>
        </div>
    </section>

<?endif;?>