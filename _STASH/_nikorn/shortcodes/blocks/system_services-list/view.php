<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */

if( is_array($data['posts']['main']) && !empty($data['posts']['main']) ):?>

    <?if( !$attr['nikorenok'] ):?>
        <section class="section">
            <div class="section__wrapper">

                <? if( $attr['is_main'] ): ?>
                    <h2 class="title">Наши услуги</h2>
                <? else: ?>
                    <h1 class="title">Наши услуги</h1>
                <? endif; ?>

                <blockquote class="blockquote">
                    Более 30 лет мы дарим красоту и здоровье, оказывая полный спектр медицинских и косметологических услуг!
                </blockquote>
                <div class="services">

                    <?if( isset($data['posts']['main']['3']) && is_array($data['posts']['main']['3']) ):
                        foreach( $data['posts']['main']['3'] as $k => $p ):?>

                            <div class="card services__card services__card_no-photo">
                                <div class="text-box card__text-box services__text-box">
                                    <a href="<?=$p['link']?>" title="<?=$p['name']?>" class="services__service-link">
                                        <div class="img-box services__icon-box">
                                            <img src="<?=$p['thumbnail']['src']?>" alt="<?=$p['name']?>" title="<?=$p['name']?>" class="img-responsive">
                                        </div>
                                        <h4 class="card__title"><?=$p['name']?></h4>
                                    </a>
                                    <?if( is_array($data['posts'][$k]) && !empty($data['posts'][$k]) ):
                                        $i = 0;
                                        foreach( $data['posts'][$k] as $sp ):?>
                                            <a href="<?=$sp['link']?>" title="<?=$sp['name']?>" class="services__sub-link"><?=$sp['name']?></a>
                                            <?$i++;
                                            if( $i == 3 ) {
                                                break;
                                            }
                                        endforeach;
                                    endif;?>

                                </div>

                                <?if(isset($data['clinics'][$k])):?>
                                    <div class="services__adress-dd">
                                        <span class="link services__adress-link"><i class="far fa-map"></i> Адреса</span>
                                        <div class="services__adress-dd-cont">
                                            <?foreach( $data['clinics'][$k] as $ck => $c):?>
                                                <a href="<?=$c['link']?>" title="<?=$c['name']?>" class="link services__clinic-link"><?=$c['name']?></a>
                                            <?endforeach;?>
                                        </div>
                                    </div>
                                <?endif;?>

                            </div>

                        <?endforeach;
                    endif;?>

                </div>
            </div>
        </section>
    <?endif;?>

    <section class="section">
        <div class="section__wrapper">
            <?if( !$attr['nikorenok'] ):?><h2 class="title">ДЕТСКАЯ СТОМАТОЛОГИЯ НИКОРЕНОК</h2><?endif;?>
            <div class="services<?if( $attr['nikorenok'] ):?> services_jc-center<?endif;?>">

                <?if( isset($data['posts']['main']['4']) && is_array($data['posts']['main']['4']) ):
                    foreach( $data['posts']['main']['4'] as $k => $p ):?>

                        <div class="card services__card services__card_no-photo services__card_nkrnk">
                            <div class="text-box card__text-box services__text-box">
                                <a href="<?=$p['link']?>" title="<?=$p['name']?>" class="services__service-link">
                                    <div class="img-box services__icon-box">
                                        <img src="<?=$p['thumbnail']['src']?>" alt="<?=$p['name']?>" title="<?=$p['name']?>" class="img-responsive">
                                    </div>
                                    <h4 class="card__title"><?=$p['name']?></h4>
                                </a>
                                <?if( is_array($data['posts'][$k]) && !empty($data['posts'][$k]) ):
                                    $i = 0;
                                    foreach( $data['posts'][$k] as $sp ):?>
                                        <a href="<?=$sp['link']?>" title="<?=$sp['name']?>" class="services__sub-link"><?=$sp['name']?></a>
                                        <?$i++;
                                        if( $i == 3 ) {
                                            break;
                                        }
                                    endforeach;
                                endif;?>

                            </div>

                            <?if(isset($data['clinics'][$k])):?>
                                <div class="services__adress-dd">
                                    <a href="" class="link services__adress-link"><i class="far fa-map"></i> Адреса</a>
                                    <div class="services__adress-dd-cont">
                                        <?foreach( $data['clinics'][$k] as $ck => $c):?>
                                            <a href="<?=$c['link']?>" title="<?=$c['name']?>" class="link services__clinic-link"><?=$c['name']?></a>
                                        <?endforeach;?>
                                    </div>
                                </div>
                            <?endif;?>

                        </div>

                    <?endforeach;
                endif;?>

            </div>
        </div>
    </section>

<?endif;?>