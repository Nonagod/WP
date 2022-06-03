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
        <div class="section__wrapper">
            <?if( $attr['hide-title'] != "Y" ):?><h3 class="title"><?=$attr['title']?></h3><?endif;?>
            <div id="doctors_output" class="employees">

                <?if( $_POST['ajax'] == 'DocFilter' ) {ob_clean();} ?>

                <?foreach($data['posts'] as $d):
                    if( isset($_POST['str']) && !empty($_POST['str']) ) {if( !mb_stristr( $d['name'], $_POST['str']) ) continue;}?>
                    <div class="card employees__item">
                        <a href="<?=$d['link']?>" class="img-box card__img-box employees__img-box">
                            <img src="<?=$d['thumbnail']['src']?>" alt="<?=$d['name']?>" title="<?=$d['name']?>" class="img-responsive">
                        </a>
                        <div class="text-box card__text-box">
                            <a href="<?=$d['link']?>" class="link card__title employees__title"><?=$d['name']?></a>
                            <p class="card__text employees__text"><?=$d['fields']['type']?></p>
                            <button data-name="<?=$d['name']?>" class="button employees__btn jsBtnOrder" data-info="<?=$d['name']?>">Записаться</button>
<!--                            <p class="employees__adress">-->
<!--                                ВЕДЁТ ПРИЁМ:<br>-->
<!--                                ЗЕЛЕНОГРАД, КОРПУС 1825-->
<!--                            </p>-->
                            <?if(isset($d['fields']['relation_doctor_to_clinicks']) && !empty($d['fields']['relation_doctor_to_clinicks'])):?>
                                <div class="services__adress-dd">
                                    <span class="link services__adress-link"><i class="far fa-map"></i> Адреса</span>
                                    <div class="services__adress-dd-cont">
                                        <?foreach( $d['fields']['relation_doctor_to_clinicks'] as $ck => $c):?>
                                            <a href="<?=get_permalink($c->ID)?>" title="<?=$c->post_title?>" class="link services__clinic-link"><?=$c->post_title?></a>
                                        <?endforeach;?>
                                    </div>
                                </div>
                            <?endif;?>

                            <?if(isset($d['fields']['relation_stocks_to_doctor']) && !empty($d['fields']['relation_stocks_to_doctor'])):?>
                                <div class="employees__item--special-item js-special-offer">
                                    <svg class="employees__item--special-item-svg" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="24" cy="24" r="24" fill="#5CA836"></circle><path d="M32 24V34H16V24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M34 19H14V24H34V19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M24 34V19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M24 19H19.5C18.837 19 18.2011 18.7366 17.7322 18.2678C17.2634 17.7989 17 17.163 17 16.5C17 15.837 17.2634 15.2011 17.7322 14.7322C18.2011 14.2634 18.837 14 19.5 14C23 14 24 19 24 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M24 19H28.5C29.163 19 29.7989 18.7366 30.2678 18.2678C30.7366 17.7989 31 17.163 31 16.5C31 15.837 30.7366 15.2011 30.2678 14.7322C29.7989 14.2634 29.163 14 28.5 14C25 14 24 19 24 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="employees__item--special-item-links">
                                        <?foreach( $d['fields']['relation_stocks_to_doctor'] as $ck => $c):
                                            $title = get_field('short_title', $c->ID, false);
                                            $title = $title ? $title : $c->post_title;
                                            $discount = get_field('discount_value', $c->ID, false); ?>
                                            <a class="employees__item--special-item-link" href="<?=get_permalink($c->ID)?>" title="<?=$title?>">
                                                <?if( $discount ):?><span class="employees__item--special-item-link-accent">Скидка <?=$discount?></span><?endif;?>
                                                <p class="employees__item--special-item-link-text"><?=$title?></p>
                                                <svg class="employees__item--special-item-link-arrow" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.293238 10.2933C-0.0977616 10.6842 -0.0977616 11.3162 0.293238 11.7072C0.684238 12.0982 1.31624 12.0982 1.70724 11.7072L6.70724 6.70725C7.09824 6.31625 7.09824 5.68425 6.70724 5.29325L1.70724 0.29325C1.31624 -0.09775 0.684238 -0.09775 0.293238 0.29325C-0.0977616 0.68425 -0.0977616 1.31625 0.293238 1.70725L4.58624 6.00025L0.293238 10.2933Z" fill="#9B9B9B"/>
                                                </svg>
                                            </a>
                                        <?endforeach;?>

                                    </div>

                                </div>
                            <?endif;?>

                        </div>
                    </div>
                <?endforeach;?>

                <?if( $_POST['ajax'] == 'DocFilter' ) {ob_end_flush(); die();} ?>

            </div>
        </div>
    </section>

<?endif;?>