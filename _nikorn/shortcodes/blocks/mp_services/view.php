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

<?if( is_array($data['posts']['main']) && !empty($data['posts']['main']) ):?>
    <section class="section">
        <div class="section__wrapper">
            <?if($attr['title']):?><h1 class="title"><?=$attr['title']?></h1><?endif;?>
            <?if( $content ):?><?=$content?><?endif;?>
            <div class="services">
                <div class="services__carousel owl-carousel">

                    <?$i = 0;
                    foreach( $data['posts']['main'] as $k => $v ):
                        $i++;
                        if( $i == 1 ) echo '<div class="services__carousel-item">';?>

                            <div class="card services__card<?=( $v['tax'][0]['term_id'] === 4 ) ? ' services__card_mp-children' : '' ;?>">

                                <?if( $v['fields']['s_preview_image'] ):?>
                                    <div class="img-box card__img-box services__img-box">
                                        <img src="<?=$v['fields']['s_preview_image']['url']?>" alt="<?=$v['name']?>" title="<?=$v['name']?>" class="img-responsive">
                                    </div>
                                <?endif;?>

                                <div class="text-box card__text-box services__text-box">

                                    <a href="<?=$v['link']?>" title="<?=$v['name']?>" class="services__service-link">

                                        <?if( $v['thumbnail'] ):?>
                                            <div class="img-box services__icon-box">
                                                <img src="<?=$v['thumbnail']['src']?>" alt="<?=$v['name']?>" class="img-responsive">
                                            </div>
                                        <?endif;?>

                                        <h4 class="card__title"><?=$v['name']?></h4>
                                    </a>

                                    <?if( isset($data['posts'][$k]) ):
                                        $j = 0;
                                        foreach( $data['posts'][$k] as $sk => $sv ):
                                            $j++;
                                            if( $j > 4 ) break;?>
                                            <a href="<?=$sv['link']?>" title="<?=$sv['name']?>" class="services__sub-link"><?=$sv['name']?></a>
                                        <?endforeach;
                                    endif;?>
                                </div>
                            </div>

                        <?if( $i == 2 ) { echo '</div>'; $i = 0; }
                    endforeach;
                    if( $i == 1 ) { echo '</div>'; $i = 0; }?>

                </div>
            </div>
        </div>
    </section>
<?endif;?>