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
<?if( is_array($data['posts']) && !empty($data['posts'])):?>

    <section class="section" id="services">
        <div class="section__wrapper">
            <h3 class="title">Другие наши услуги</h3>
            <div class="services">
                <?foreach( $data['posts'] as $p ):?>
                    <a href="<?=$p['link']?>" title="<?=$p['name']?>" class="card services__card services__card_sub">
                        <div class="img-box card__img-box services__img-box">
                            <img src="<?=$p['fields']['s_preview_image']['url']?>" alt="<?=$p['name']?>" title="<?=$p['name']?>" class="img-responsive">
                        </div>
                        <div class="text-box card__text-box services__text-box">
                            <h4 class="card__title"><?=$p['name']?></h4>
                        </div>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    </section>

<?endif;?>