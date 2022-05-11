<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 *
 * @var array $data - result of data get
 */
if( $data ):?>
    <section class="section">
        <div class="section__wrapper">
            <?if( $attr['title'] ):?><h3 class="title"><?=$attr['title']?></h3><?endif;?>
            <div class="advantages">

                <?foreach($data as $adv):?>
                    <div class="advantages__item">
                        <div class="advantages__icon img-box">
                            <img src="<?=$adv['url']?>" alt="<?=$adv['title']?>" title="<?=$adv['title']?>" class="img-responsive">
                        </div>
                        <p class="advantages__text">
                            <?=$adv['description']?>
                        </p>
                    </div>
                <?endforeach;?>

            </div>
        </div>
    </section>
<?endif;?>